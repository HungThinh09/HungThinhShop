<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        @foreach ($menus as $menu)
        @can($menu['can']) 
                <li class="nav-item">
                    <a href="{{ route($menu['route']) }}" class="nav-link">
                        <i class="nav-icon fas {{ $menu['icon'] }}"></i>
                        <p>
                            {{ $menu["label"]}}
                            @if (isset($menu['items']))
                                <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>
                    @if (isset($menu['items']))
                        @foreach ($menu['items'] as $item)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route($item['route']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $item['label'] }}</p>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @endif
                </li>
            @endcan
        @endforeach
    </ul>
</nav>
