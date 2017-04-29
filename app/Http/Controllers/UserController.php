<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $commonURL = '/admin/users/';

    public function index()
    {
        $table = User::orderby('id','desc')->paginate(5);

        $data = [
            'title' => 'Категории',
            'table' => [
                'head'     => ['#','Имя','Email','Админ','Действие'],
                'fields'    => ['id','name','email','admin'],
                'rows'       => $table,
            ],
            'action' => [
                'edit'      => "{$this->commonURL}edit",
                'destroy'    => "{$this->commonURL}destroy",
            ],
            'button' => [
                'href' => "{$this->commonURL}create",
                'text' => 'Создать',
            ],
            'pages' => $table->links(),

        ];

        return  view('users.index',$data);
    }

    public function edit($id)
    {
        try{
            $item = User::findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }

        $data['form'] = [
            'title'  => "Редактируем пользователя № \"{$item['id']}\"",
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
                'name' => 'admin',
                'value' => $item['admin'],
                'label' => 'Адинистратор'
            ],
        ];
        return view('users.edit',$data);
    }

    public function destroy($id)
    {
        try{
            User::destroy($id);
        } catch (Exception $e){
            return abort(404);
        }
        return redirect("$this->commonURL");
    }

    public function update(Request $request, $id)
    {
        try{
            $item = User::findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }

        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        if ( $request->input('admin') == null ) {
            $admin = 0;
        } else {
            $admin = 1;
        }

        $item->name = $request->input('name');
        $item->email = $request->input('email');
        $item->admin = $admin;
        $item->save();
        return redirect("{$this->commonURL}edit/$id");
    }

}
