<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Mockery\Exception;
use function PHPSTORM_META\type;

class CategoryController extends Controller
{
    private $commonURL = '/admin/categories/';

    private function redirect($page = '')
    {
        return redirect("{$this->commonURL}$page");
    }


    public function index()
    {
        $table = Category::all();
        foreach ($table as $key => $value) {
            $table[$key]['num'] = $key+1;
        }
        $data = [
            'title' => 'Категории',
            'table' => [
                'head'     => ['#','Имя','Описание','Действие'],
                'fields'    => ['num','name','desc'],
                'rows'       => $table,
            ],
            'button' => [
                'href' => "{$this->commonURL}create",
                'text' => 'Создать',
            ],
            'action' => [
                'edit'      => "{$this->commonURL}edit",
                'destroy'    => "{$this->commonURL}destroy",
            ]

        ];
        return  view('categories.index',$data);
    }

    public function create()
    {

        $data['form'] = [
            'title'  => "Создаем категорию",
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
                'type' => 'textarea',
                'name' => 'desc',
                'value' => '',
                'label' => 'Описание'
            ]
        ];

        return view('categories.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,[
                'name' => 'required|min:3',
                'desc' => 'required|min:5',
            ]
        );
        $category = new Category();
        $category->name = $request->input('name');
        $category->desc = $request->input('desc');
        $category->save();
        return $this->redirect();
    }

    public function edit($category_id)
    {
        try{
            $category = Category::findOrFail($category_id);
        } catch (Exception $e){
            return abort(404);
        }

        $data['form'] = [
            'title'  => "Редактируем категорию \"{$category['name']}\"",
            'action' => "/admin/categories/update/$category->id",
            'method' => "post",
            'submit' => 'Обновить',
        ];
        $data['fields'] =[
            [
                'type' => 'text',
                'name' => 'name',
                'value' => $category['name'],
                'label' => 'Имя'
            ],
            [
                'type' => 'textarea',
                'name' => 'desc',
                'value' => $category['desc'],
                'label' => 'Описание'
            ]
        ];
        return view('categories.edit',$data);
    }

    public function update(Request $request, $category_id)
    {
        $this->validate(
            $request,[
                'name' => 'required|min:3',
                'desc' => 'required|min:5',
            ]
        );
        try{
            $category = Category::findOrFail($category_id);
        } catch (Exception $e){
            return abort(404);
        }
        $category->name = $request->input('name');
        $category->desc = $request->input('desc');
        $category->save();
        return $this->redirect("edit/$category_id");
    }

    public function destroy($category_id)
    {
        try{
            Category::destroy($category_id);
        } catch (Exception $e){
            return abort(404);
        }
        return $this->redirect();
    }

}
