@extends('layouts.app')

@section('create-button')
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('layouts.list')
            </div>
        </div>
    </div>
@endsection
