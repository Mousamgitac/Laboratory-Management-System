<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Dashboard</li>
         @foreach($modules as $module)
        <li class="treeview">
          
          <a href= "">
           
            <i class="fa fa-dashboard"></i> <span>{{ $module->labModule_name }} </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> 
          </a>
          <ul class="treeview-menu">
             
             
             @foreach($subs as $sub)
             @if($sub->module_id === $module->lab_module_id)
            <li><a href="{{ url( $sub->sub_module_name) }}"><i class="fa fa-circle-o"></i> {{ $sub->sub_module_name }} </a></li>
            @endif
            @endforeach
            
            
          </ul>
        </li>
        @endforeach

        
    </section>
    <!-- /.sidebar -->
  </aside>