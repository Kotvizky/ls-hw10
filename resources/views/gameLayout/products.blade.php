<div class="products-columns">
    @foreach($products as $product)
        <div class="products-columns__item">
            <div class="products-columns__item__title-product">
                <a href="#" class="products-columns__item__title-product__link">{{$product->name}}</a>
            </div>
            <div class="products-columns__item__thumbnail"><a href="/products/{{$product->id}}" class="products-columns__item__thumbnail__link">
                    <img src="{{'/' . Config('constants.pathPhoto') . $product->photo }}" class="products-columns__item__thumbnail__img"></a>
            </div>
            <div class="products-columns__item__description">
                <span class="products-price">{{$product->price}} руб</span>
                <a href="#" class="btn btn-blue">Купить</a>
            </div>
        </div>
    @endforeach
</div>