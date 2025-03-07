<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">


        <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-view-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

      <li class="nav-item">
        <a class="nav-link" href="category">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>


     <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-plus-box menu-icon"></i>
          <span class="menu-title">Users Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View product</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="brands">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
{{--
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/colors') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Colors</span>
        </a>
      </li> --}}


      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">History</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Home Slider</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="mdi mdi-account-group menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/settings') }}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Site Settings</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>
