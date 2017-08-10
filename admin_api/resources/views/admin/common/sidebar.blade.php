@section('sidebar')
<!--sidebar-menu-->
<div id="sidebar"><a href="{{url(route('admin_dashboard'))}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
<!--  Dashboard -->
    <li class="<?php if(url()->current()==url(route('admin_dashboard'))){echo "active";}?>"><a href="{{url(route('admin_dashboard'))}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!--  Users -->
	<li class="submenu <?php if(url()->current()==url(route('Add.User')) || url()->current()==url(route('users'))){echo "open";}?>"> <a href="#"><i class="icon icon-group"></i> <span>Users</span> </a>
      <ul>
        <li class="<?php if(url()->current()==url(route('Add.User'))){echo "active";}?>"><a href="{{url(route('Add.User'))}}">Add User</a></li>
        <li class="<?php if(url()->current()==url(route('users')) ){echo "active";}?>"><a href="{{url(route('users'))}}">Manage Users</a></li>
      </ul>
    </li>
<!--  Projects -->
	<li class="submenu <?php if(url()->current()==url(route('Projects'))){echo "open";}?>"> <a href="#"><i class="icon icon-tasks"></i> <span>Projects</span> </a>
      <ul>
        <li class="<?php if(url()->current()==url(route('Projects')) ){echo "active";}?>"><a href="{{url(route('Projects'))}}">Manage Projects</a></li>
      </ul>
    </li>
    
  </ul>
</div>
<!--sidebar-menu-->
@endsection