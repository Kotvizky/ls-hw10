<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $commonURL = '/admin/products/';
    private $pathPhoto = 'img/products/';
    private $linkPhoto = '/img/products/';
    private $validateRules =  [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0.01',
            'desc' => 'required|min:5',
        ];


    private function redirect($page = '')
    {
        return redirect("{$this->commonURL}$page");
    }


    public function index()
    {
        $table = Product::with('category')
            ->orderby('id','desc')
            ->paginate(5);

        foreach ($table as $key => $value) {
            $table[$key]['num'] = $key+1;
            if (isset($value->category)) {
                $table[$key]['CategoryName'] = $value->category->name;//'test';// $value->category->name;
            } else {
                $table[$key]['CategoryName'] = 'не найдена';
            }
        }
        $data = [
            'title' => 'Товары',
            'table' => [
                'head'     => ['#','Имя','Кат.','Цена','Фото','Описание','Действие'],
                'fields'    => ['id','name','CategoryName','price',
                        [
                            'img' =>$this->linkPhoto,
                            'fieldName' => 'photo',
                        ],
                    'desc'],
                'rows'       => $table,
            ],
            'button' => [
                'href' => "{$this->commonURL}create",
                'text' => 'Создать',
            ],
            'action' => [
                'edit'      => "{$this->commonURL}edit",
                'destroy'    => "{$this->commonURL}destroy",
            ],
            'pages' => $table->links(),
        ];

        return  view('products.index',$data);
    }

    public function create()
    {

        $category = Category::get();

        $data['form'] = [
            'title'  => "Создаем товар",
            'action' => "{$this->commonURL}store",
            'method' => "post",
            'submit' => 'Создать',
        ];
        $data['fields'] =[
            [
                'type' => 'text',
                'name' => 'name',
                'value' => '',
                'label' => 'Имя'
            ],
            [
                'type' => 'select',
                'name' => 'category_id',
                'text'  => 'name',
                'value' => 'id',
                'label' => 'Категория',
                'selected' =>'2',
                'table' => $category,
            ],
            [
                'type' => 'number',
                'name' => 'price',
                'value' => '',
                'label' => 'Цена'
            ],
            [
                'type' => 'textarea',
                'name' => 'desc',
                'value' => '',
                'label' => 'Описание'
            ],
        ];


        return view('products.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->validateRules);
        $item = new Product();
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->desc = $request->input('desc');
        $item->category_id = $request->input('category_id');
        $item->save();
        return $this->redirect("edit/{$item->id}");
    }

    public function edit($id)
    {
        try{
            $item = Product::findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }

        $data['form'] = [
            'title'  => "Редактируем товар \"{$item['name']}\"",
            'attributes' => [
                'action' => "{$this->commonURL}update/$item->id",
                'method' => "post",
                'enctype' => 'multipart/form-data',
            ],
            'file'  => ['text'=>'Загрузить'],
            'submit' => 'Обновить',
        ];
        $data['fields'] =[
            [
                'type' => 'text',
                'name' => 'name',
                'value' => $item['name'],
                'label' => 'Имя'
            ],
            [
                'type' => 'select',
                'name' => 'category_id',
                'text'  => 'name',
                'value' => 'id',
                'label' => 'Категория',
                'selected' =>$item['category_id'],
                'table' => Category::get(),
            ],
            [
                'type' => 'number',
                'name' => 'price',
                'value' => $item['price'],
                'label' => 'Цена'
            ],
            [
                'type' => 'textarea',
                'name' => 'desc',
                'value' => $item['desc'],
                'label' => 'Описание'
            ],
            [
                'type' => 'img',
                'name' => 'name',
                'photo'=> $item['photo'],
                'path' => $this->linkPhoto,
                'label' => 'Фото'
            ],
        ];
        return view('products.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,$this->validateRules);
        try{
            $item = Product::findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }

        if (!empty($_FILES['userFile']) && ($_FILES['userFile']['name'] != '')) {
            if ($_FILES['userFile']["type"] == "image/jpeg") {
                $fileName = $id .".jpg";
                $uploadFile = $this->pathPhoto . $fileName;
                if (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile)) {
//                    $image = Image::make($uploadFile);
//                    $image->resize(616, null, function ($image) {
//                            $image->aspectRatio();
//                        })
//                        ->save($uploadFile);
                    $item->photo = $fileName;
                }
            }
        }

        $item->name = $request->input('name');
        $item->desc = $request->input('desc');
        $item->category_id = $request->input('category_id');
        $item->price = $request->input('price');
        $item->save();
        return $this->redirect("edit/$id");
    }

    public function destroy($id)
    {
        try{
            Product::destroy($id);
        } catch (Exception $e){
            return abort(404);
        }
        return $this->redirect();
    }
}
