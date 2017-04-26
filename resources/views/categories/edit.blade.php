@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создаем категорию</div>
                    <div>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                    <div class="panel-body">
                        <form action="/categories/update/{{$category->id}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="name" value="{{$category->name}}">
                            <textarea name="desc" cols = 30 rows = 5>{{$category->desc}}</textarea>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
