@foreach($categories as $category)
    <li class="sidebar-category__item"><a href="/categories/{{$category->id}}" class="sidebar-category__item__link">{{$category->name}}</a></li>
@endforeach
