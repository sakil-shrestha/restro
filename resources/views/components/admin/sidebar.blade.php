<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                    class="logo-name">Restro</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        class="fas fa-fax"></i><span>Widgets</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                    <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
                </ul>
            </li>

            <li class="{{ request()->routeIs('table.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('table.index') }}"><i class="fas fa-table"></i><span>Table</span></a></li>

            <li class="menu-header">Kitchen Management</li>
            <li class="{{request()->routeIs('category.*')?'active':''}}"><a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-grip-horizontal"></i><span>Category</span></a>
            </li>
            <li><a class="nav-link" href="timeline.html"><i class="fas fa-cart-plus"></i><span>Order</span></a></li>
            <li><a class="nav-link" href="timeline.html"><i class="fas fa-clipboard-list"></i><span>MenuItem</span></a>
            </li>


        </ul>
    </aside>
</div>
