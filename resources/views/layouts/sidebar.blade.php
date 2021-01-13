
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu mt-2" data-widget="tree">

            <li class=""><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="header">Master Data</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('sepatu') }}"><i class="fa fa-edit"></i> <span>Data Sepatu</span></a></li>
            <li><a href="{{ url('pelanggan') }}"><i class="fa fa-folder"></i> <span>Data Pelanggan</span></a></li>
            <li><a href="{{ url('users') }}"><i class="fa fa-user"></i> <span>Data User</span></a></li>

            <li class="header">Transaksi</li>
            <li><a href="{{ url('penjualan') }}"><i class="fa fa-book"></i> <span>Penjualan</span></a></li>

        </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->