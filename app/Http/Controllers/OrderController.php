<?php

namespace App\Http\Controllers;


use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    private $commonURL = '/admin/orders/';

    public function index()
    {
        $table = Order::with('product')
            ->with('user')
            ->orderby('id','desc')
            ->paginate(5);

        foreach ($table as $key => $value) {
            if (isset($value->product)) {
                $table[$key]['ProductName'] = $value->product->name;//'test';// $value->category->name;
            } else {
                $table[$key]['ProductName'] = 'не найден';
            }
            if (isset($value->user)) {
                $table[$key]['UserName'] = $value->product->name;//'test';// $value->category->name;
            } else {
                $table[$key]['UserName'] = 'не найден';
            }
        }
        $data = [
            'title' => 'Товары',
            'table' => [
                'head'     => ['#', 'Имя',  'Продукт',      'E-mail',   'Дата',         'Закр.','Действие'],
                'fields'   => ['id','name', 'ProductName', 'email',    'created_at',   'closed'],
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

        return  view('orders.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validate($request,$this->validateRules);
        $item = new Order();
        $item->user_id = Auth::user()->id;
        $item->product_id = $request->input('product_id');
        $item->name = $request->input('name');
        $item->email = $request->input('email');
        $item->save();
        Mail::to(Config('constants.newOrderMail'))
            ->send(new SendMail(
                [
                    'user'  =>  Auth::user()->name,
                    'order' =>  $item->id,
                ]
            ));

        return redirect("/orders");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $item = Order::findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }

        $data['form'] = [
            'title'  => "Редактируем заказ \"{$item['id']}\"",
            'attributes' => [
                'action' => "{$this->commonURL}update/$item->id",
                'method' => "post",
            ],
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
                'type' => 'text',
                'name' => 'email',
                'value' => $item['email'],
                'label' => 'E-mail'
            ],
            [
                'type' => 'checkbox',
                'name' => 'closed',
                'value' => $item['closed'],
                'label' => 'Закрыт'
            ],
        ];
        return view('orders.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,[
                'name' => 'required|min:3',
                'email' => 'required|email',
            ]
        );
        try{
            $category = Order::findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }
        if ( $request->input('closed') == null ) {
            $closed = 0;
        } else {
            $closed = 1;
        }

        $category->name = $request->input('name');
        $category->email = $request->input('email');
        $category->closed = $closed;
        $category->save();
        return redirect("{$this->commonURL}edit/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Order::destroy($id);
        } catch (Exception $e){
            return abort(404);
        }
        return redirect("$this->commonURL");
    }
}
