@extends('gameLayout.index')

@section('index-css')
    @parent
    <link rel="stylesheet" href="/css/purchase.css">
@endsection

@section('content-middle')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">{{$product->name}} в разделе {{$product->category->name}}</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="product-container">
                <div class="product-container__image-wrap">
                    <img src="{{ '/' .Config('constants.pathPhoto').$product->photo}}"
                        class="image-wrap__image-product"></div>
                <div class="product-container__content-text">


                    <div class="product-container__content-text__title">{{$product->name}}</div>
                    <div class="product-container__content-text__price">
                        <div class="product-container__content-text__price__value">
                            Цена: <b>{{ $product->price  }}</b>
                            руб
                        </div><a href="javascript:PopUpShow()" class="btn btn-blue">Купить</a>
                    </div>
                    <div class="product-container__content-text__description">
                        {{ $product->desc }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="content-bottom">
        <div class="line"></div>
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
            </div>
        </div>
        <div class="content-main__container">
            @include('gameLayout.products')
        </div>
    </div>

@endsection

@section('content-footer')
@endsection

@section('purchase-form')
    @include('gameLayout.purchase-form')
@endsection

@section('index-script')
    @parent

    <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>

    <script>
        $(document).ready(function() {
            //Скрыть PopUp при загрузке страницы
            PopUpHide();
        });
        //Функция отображения PopUp
        function PopUpShow() {
            $("#popup1").show();
        }
        //Функция скрытия PopUp
        function PopUpHide() {
            $("#popup1").hide();
        }

        document.getElementById('btn-cancel').onclick = function() {
            //alert('Нажата кнопка');
            PopUpHide();
        }
    </script>

@endsection