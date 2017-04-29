<div class="cart-product-list">
@foreach($orders as $order)
    <div class="cart-product-list__item">
        <div class="cart-product__item__product-photo"><img src="{{'/' . Config('constants.pathPhoto') . $order->product->photo }}" class="cart-product__item__product-photo__image"></div>
        <div class="cart-product__item__product-name">
            <div class="cart-product__item__product-name__content"><a href="/products/{{$order->product->id}}">{{$order->product->name}}</a></div>
        </div>
        <div class="cart-product__item__cart-date">
            <div class="cart-product__item__cart-date__content">{{$order->created_at->format('d.m.Y')}}</div>
        </div>
        <div class="cart-product__item__product-price"><span class="product-price__value">{{$order->product->price}} руб</span></div>
    </div>
@endforeach
</div>