<a href="{{ route('logout') }}" class="

    @if(isset($logoutClass))
        {{ $logoutClass }}
        @else
        authorization-block__link
        @endif
        "
   onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">Выйти</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>