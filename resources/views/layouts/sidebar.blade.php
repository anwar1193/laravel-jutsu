<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/adminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview {{ Request::is('rest_client1*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-chain"></i>
            <span>HTTP Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('rest_client1*') ? 'active' : '' }}"><a href="/rest_client1"><i class="fa fa-circle-o"></i> RestClient1</a></li>
          </ul>
        </li>

        <li class="treeview {{ Request::is('dynamic_select*') || Request::is('yajra_data_table*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-eye"></i>
            <span>View Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ Request::is('yajra_data_table*') ? 'active' : '' }}"><a href="/yajra_data_table"><i class="fa fa-circle-o"></i> Yajra DataTables</a></li>
            <li class="{{ Request::is('dynamic_select*') ? 'active' : '' }}"><a href="/dynamic_select"><i class="fa fa-circle-o"></i> Dynamic Select</a></li>
          </ul>


        </li>

        <li class="treeview {{ Request::is('crud_ajax*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>CRUD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('crud_ajax*') ? 'active' : '' }}"><a href="/crud_ajax"><i class="fa fa-circle-o"></i> CRUD AJAX</a></li>
          </ul>
        </li>
    
        {{-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>