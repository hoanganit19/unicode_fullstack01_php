<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse{{ $name }}">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    {{ $title ?? '' }}
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapse{{ $name ?? '' }}" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{route('admin.'.$name.'.index')}}">Danh sách</a>
        <a class="nav-link" href="{{route('admin.'.$name.'.add')}}">Thêm mới</a>
    </nav>
</div>