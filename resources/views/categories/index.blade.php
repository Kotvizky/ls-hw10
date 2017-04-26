@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categories</div>
                    <div>
                        <a href  = "categories/create" class = "btn">Создать</a>
                    </div>
                    <div class="panel-body">
                        <table>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td><a href="/categories/edit/{{$category->id}}" class="btn">Редактировать</a></td>
                                    <td>
                                        <form action="/categories/destroy/{{$category->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" value="Удалить">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
