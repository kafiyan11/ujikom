<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE-2') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- Sidebar Navigation for Petugas -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-tachometer"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('konsumens.index') ? 'active' : '' }}">
                <a href="{{ route('konsumens.index') }}">
                    <i class="fa fa-users"></i> <span>Data Konsumen</span>
                </a>
            </li>
            <li class="{{ Request::is('orders.index') ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
