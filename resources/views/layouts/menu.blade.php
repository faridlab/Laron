<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

      <li class="nav-item {{ Request::is('home') ? ' active' : '' }}">
        <a href="{{url('/home')}}">
          <i class="icon-home"></i><span class="menu-title" data-i18n="nav.home">Dashboard</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('kols') ? ' active' : '' }}">
        <a href="{{url('/kols')}}">
          <i class="icon-directions"></i><span class="menu-title" data-i18n="nav.kols">K.O.L</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('interests') ? ' active' : '' }}">
        <a href="{{url('/interests')}}">
          <i class="icon-emotsmile"></i><span class="menu-title" data-i18n="nav.interests">Interests</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('ratecards') ? ' active' : '' }}">
        <a href="{{url('/ratecards')}}">
          <i class="icon-wallet"></i><span class="menu-title" data-i18n="nav.ratecards">Rate Cards</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('blacklists') ? ' active' : '' }}">
        <a href="{{url('/blacklists')}}">
          <i class="icon-dislike"></i><span class="menu-title" data-i18n="nav.blacklists">Black Lists</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('reviews') ? ' active' : '' }}">
        <a href="{{url('/reviews')}}">
          <i class="icon-note"></i><span class="menu-title" data-i18n="nav.reviews">Reviews</span>
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

      <!-- Administrator Area -->
      <li class=" navigation-header">
        <span data-i18n="nav.category.layouts">Administrator</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Layouts"></i>
      </li>
      <li class="nav-item"><a href="#"><i class="icon-people"></i><span class="menu-title" data-i18n="nav.amin.users">Users</span></a>
        <ul class="menu-content">
          <li class="{{ Request::is('users*')? ' active' : '' }}">
            <a class="menu-item" href="{{url('/users')}}" data-i18n="nav.users.users">Users</a>
          </li>
          <li class="{{ Request::is('roles*') ? ' active' : '' }}">
            <a class="menu-item" href="{{url('/roles')}}" data-i18n="nav.users.roles">Roles</a>
          </li>
          <li class="{{ Request::is('permissions*') ? ' active' : '' }}">
            <a class="menu-item" href="{{url('/permissions')}}" data-i18n="nav.users.permissions">Permissions</a>
          </li>
          <!-- <li class="navigation-divider"></li> -->
        </ul>
      </li>
      <li class="nav-item"><a href="#"><i class="icon-flag"></i><span class="menu-title" data-i18n="nav.admin.countries">Countries</span></a>
        <ul class="menu-content">
          <li class="{{ Request::is('countries') ? ' active' : '' }}">
            <a class="menu-item" href="{{url('/countries')}}" data-i18n="nav.countries.countries">Countries</a>
          </li>
          <li class="{{ Request::is('provinces') ? ' active' : '' }}">
            <a class="menu-item" href="{{url('/provinces')}}" data-i18n="nav.countries.provinces">Provinces</a>
          </li>
          <li class="{{ Request::is('cities') ? ' active' : '' }}">
            <a class="menu-item" href="{{url('/cities')}}" data-i18n="nav.countries.cities">Cities</a>
          </li>
          <!-- <li class="navigation-divider"></li> -->
        </ul>
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
</div>
