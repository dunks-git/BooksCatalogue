<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Admin panel</li>
        <li class="nav-item">
            <a href="/admin/book" class="nav-link">
                <i class="nav-icon fas fa-solid fa-bars"></i>
                <p>
                    Books
                    <span class="badge badge-info right">{{$books->total()}}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
