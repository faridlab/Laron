<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">

      <li class="nav-item {{ Request::is('home') ? ' active' : '' }}">
        <a class="nav-link active" href="{{url('/home')}}">
          <span data-feather="home"></span> Dashboard
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file"></span>
          Orders
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="shopping-cart"></span>
          Products
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="users"></span>
          Customers
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="bar-chart-2"></span>
          Reports
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="layers"></span>
          Integrations
        </a>
      </li>
    </ul>

    <div class="dropdown-divider"></div>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="lock"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item {{ Request::is('users*')? ' active' : '' }}">
        <a class="nav-link" href="#">
          <span data-feather="users"></span>
          Users
        </a>
      </li>
      <li class="nav-item {{ Request::is('users*')? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/users')}}">Users</a>
      </li>
      <li class="nav-item {{ Request::is('roles*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/roles')}}">Roles</a>
      </li>
      <li class="nav-item {{ Request::is('permissions*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/permissions')}}">Permissions</a>
      </li>

      <li class="nav-item {{ Request::is('countries*')? ' active' : '' }}">
        <a class="nav-link" href="#">
          <span data-feather="flag"></span>
          Countries
        </a>
      </li>
      <li class="nav-item {{ Request::is('countries*')? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/countries')}}">Countries</a>
      </li>
      <li class="nav-item {{ Request::is('provinces*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/provinces')}}">Provinces</a>
      </li>
      <li class="nav-item {{ Request::is('cities*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/cities')}}">Cities</a>
      </li>
    </ul>

    <div class="dropdown-divider"></div>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Support</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="lock"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item {{ Request::is('users*')? ' active' : '' }}">
        <a class="nav-link" href="#">
          <span data-feather="users"></span>
          Users
        </a>
      </li>
      <li class="nav-item {{ Request::is('users*')? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/users')}}">Users</a>
      </li>
      <li class="nav-item {{ Request::is('roles*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/roles')}}">Roles</a>
      </li>
      <li class="nav-item {{ Request::is('permissions*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/permissions')}}">Permissions</a>
      </li>

      <li class="nav-item {{ Request::is('countries*')? ' active' : '' }}">
        <a class="nav-link" href="#">
          <span data-feather="flag"></span>
          Countries
        </a>
      </li>
      <li class="nav-item {{ Request::is('countries*')? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/countries')}}">Countries</a>
      </li>
      <li class="nav-item {{ Request::is('provinces*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/provinces')}}">Provinces</a>
      </li>
      <li class="nav-item {{ Request::is('cities*') ? ' active' : '' }}">
        <a class="nav-link ml-4" href="{{url('/cities')}}">Cities</a>
      </li>
    </ul>

  </div>
</nav>

<!-- <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

      <li class="nav-item {{ Request::is('home') ? ' active' : '' }}">
        <a href="{{url('/home')}}">
          <i class="icon-home"></i><span class="menu-title" data-i18n="nav.home">Dashboard</span>
        </a>
      </li>

      <hr>

      <li class="nav-item">
        <a href="#"><i class="icon-pie-chart"></i><span class="menu-title" data-i18n="nav.dash.main">Report</span><span class="badge badge badge-danger badge-pill float-right mr-2">5</span></a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="#" data-i18n="nav.dash.analytics">Report</a>
          </li>
          <li>
            <a class="menu-item" href="#" data-i18n="nav.dash.project">Report</a>
          </li>
          <li>
            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">Report</a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#"><i class="icon-bubble"></i><span class="menu-title" data-i18n="nav.dash.main">Mailbox</span><span class="badge badge badge-danger badge-pill float-right mr-2">5</span></a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="#" data-i18n="nav.dash.analytics">Inbox</a>
          </li>
          <li>
            <a class="menu-item" href="#" data-i18n="nav.dash.project">Sent</a>
          </li>
          <li>
            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">Trash</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="icon-bell"></i><span class="menu-title" data-i18n="nav.dash.main">Notifications</span><span class="badge badge badge-danger badge-pill float-right mr-2">5</span></a>
      </li>

      <li class=" navigation-header">
        <span data-i18n="nav.category.support">Support</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Support"></i>
      </li>
      <li class="nav-item">
        <a href="#"><i class="icon-support"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Ticket</span></a>
      </li>
      <li class=" nav-item">
        <a href="https://pixinvent.com/robust-bootstrap-admin-template/documentation"><i class="icon-notebook"></i>
          <span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span>
        </a>
      </li>
    </ul>
  </div>
</div> -->
