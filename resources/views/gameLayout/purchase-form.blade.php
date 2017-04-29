<div class="purchase-popup" id="popup1">
    <div class="purchase-popup-content">
        @if (isset(Auth::user()->id))
            <form

                    @foreach($purchase['attributes'] as $key => $value)
                    {{$key}} = "{{$value}}"
                    @endforeach
            >

                {{csrf_field()}}

                <fieldset>
                    <legend>Заказ товара</legend>
                    {{--<h3>{{$product->name}}</h3>--}}
                    <div class="item">
                        <label>Имя</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="item">
                        <label>Почта</label>
                        <input type="text" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <p>
                        <button type="submit">Отправить</button>
                        <button id="btn-cancel"  type="button">Отменить</button>
                    </p>
                </fieldset>
            </form>
        @else
            <p>Для покупки товара авторизируйтесь пожалуйса!</p>
            <button id="btn-cancel"  type="button">Ок</button>
        @endif
    </div>
</div>
