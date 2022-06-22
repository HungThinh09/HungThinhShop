<div id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">HungThinh Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-nav-bar"
            aria-controls="my-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="my-nav-bar">
            <ul class="navbar-nav">

                <!--Kích hoạt phần tử-->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                </li>


                @foreach ($menus as $menu)
                    @if ($menu->child->contains('parent_id', $menu->id))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="{{ route('category', ['slug' => $menu->categorySlug]) }}" id="mydropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $menu->categoryName }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="mydropdown">
                                @foreach ($menu->child as $menuChild)
                                    <a class="dropdown-item"
                                        href="{{ route('category', ['slug' => $menuChild->categorySlug]) }}">
                                        {{ $menuChild->categoryName }}</a>
                                @endforeach
                                @if ($menu->child->count() > 1)
                                    <a class="dropdown-item"
                                        href="{{ route('category', ['slug' => $menu->categorySlug]) }}">
                                        All-{{ $menu->categoryName }} </a>
                                @endif
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category', ['slug' => $menu->categorySlug]) }}">
                                {{ $menu->categoryName }}</a>
                        </li>
                    @endif
                @endforeach

                <div class="carts">
                    <a href="{{ route('cart') }}">
                        <ion-icon name="cart-outline"></ion-icon>
                    </a>
                    @if (count($cart->items)>0)
                    <div class="soProduct">
                       <span>{{ count($cart->items)}}</span>
                    </div>
                    @endif
                </div>
            </ul>
            <input type="checkbox" id="bg-menu" class="switch-toggle switch-bg">
            &nbsp; <span id="icon_bg" class="btn btn-outline-dark">
                <ion-icon name='partly-sunny-outline'></ion-icon>
            </span>


    </nav>

</div>
