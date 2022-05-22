<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
    <img class="logo-normal" src="/img/logo.png" class="avatar" width="40" height="40">
    {{ __('Apetitos') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'menu' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('product.menu') }}">
          <i class="material-icons">restaurant_menu</i>
            <p>{{ __('Menu') }}</p>
        </a>
      </li>
      @can('permission_index')
      <li class="nav-item {{ ($activePage == 'permissions' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#credenciales" aria-expanded="true">
          <i class="material-icons">fingerprint</i>
          <p>{{ __('Credenciales') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="credenciales">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('permissions.index') }}">
              <i class="material-icons">engineering</i>
                <span class="sidebar-normal">Permisos</span>
              </a>
            </li>
          </ul>
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('roles.index') }}">
              <i class="material-icons">manage_accounts</i>
                <span class="sidebar-normal">Roles</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endcan
      @can('user_index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">content_paste</i>
            <p>Usuarios</p>
        </a>
      </li>
      @endcan
      @can('product_index')
      <li class="nav-item{{ $activePage == 'Productos' ? ' active' : '' }}">
        <a class="nav-link" href="/product/index">
          <i class="material-icons">inventory</i>
            <p>{{ __('Productos') }}</p>
        </a>
      </li>
      @endcan
      <li class="nav-item{{ $activePage == 'purcharses' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('purcharses.index') }}">
          <i class="material-icons">paid</i>
          <p>{{ __('Ventas') }}</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="#">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> -->
        </ul>
    </div>
</div>
