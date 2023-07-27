<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="{{route('admin.dashboard.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tổng quan
                </a>
                {{view('layouts/admin/menu-item', ['name' => 'categories', 'title' => 'Chuyên mục'])}}
                {{view('layouts/admin/menu-item', ['name' => 'posts', 'title' => 'Bài viết'])}}
                {{view('layouts/admin/menu-item', ['name' => 'pages', 'title' => 'Trang'])}}
                {{view('layouts/admin/menu-item', ['name' => 'users', 'title' => 'Người dùng'])}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>