<nav class="topnav navbar navbar-light">
  <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>
  <form class="form-inline mr-auto searchform text-muted">
    <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Пошуковий запит ..." aria-label="Search">
  </form>
  <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
      <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
          Мега меню
          <i class="mdi mdi-chevron-down"></i> 
      </button>
      <div class="dropdown-menu dropdown-megamenu">
          <div class="row">
              <div class="col-sm-8">

                  <div class="row">
                      <div class="col-md-4">
                          <h5 class="font-size-14">UI Components</h5>
                          <ul class="list-unstyled megamenu-list">
                              <li>
                                  <a href="javascript:void(0);">Lightbox</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Range Slider</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Sweet Alert</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Rating</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Forms</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Tables</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Charts</a>
                              </li>
                          </ul>
                      </div>

                      <div class="col-md-4">
                          <h5 class="font-size-14">Applications</h5>
                          <ul class="list-unstyled megamenu-list">
                              <li>
                                  <a href="javascript:void(0);">Ecommerce</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Calendar</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Email</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Projects</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Tasks</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Contacts</a>
                              </li>
                          </ul>
                      </div>

                      <div class="col-md-4">
                          <h5 class="font-size-14">Extra Pages</h5>
                          <ul class="list-unstyled megamenu-list">
                              <li>
                                  <a href="javascript:void(0);">Light Sidebar</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Compact Sidebar</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Horizontal layout</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Maintenance</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Coming Soon</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Timeline</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">FAQs</a>
                              </li>
                  
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="row">
                      <div class="col-sm-6">
                          <h5 class="font-size-14">UI Components</h5>
                          <ul class="list-unstyled megamenu-list">
                              <li>
                                  <a href="javascript:void(0);">Lightbox</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Range Slider</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Sweet Alert</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Rating</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Forms</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Tables</a>
                              </li>
                              <li>
                                  <a href="javascript:void(0);">Charts</a>
                              </li>
                          </ul>
                      </div>

                      <div class="col-sm-5">
                          <div>
                              <img src="{{ asset('assets/admin/images/megamenu-img.png') }}" alt="megamenu-img" class="img-fluid mx-auto d-block">
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
        <i class="fe fe-sun fe-16"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
        <span class="fe fe-grid fe-16"></span>
      </a>
    </li>
    <li class="nav-item nav-notif">
      <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
        <span class="fe fe-bell fe-16"></span>
        <span class="dot dot-md bg-success"></span>
      </a>
    </li>
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="avatar avatar-sm mt-2">
        <img src="{{ asset('assets/dashboard/images/avatars/face-1.jpg') }}" alt="..." class="avatar-img rounded-circle">
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Профайл</a>
        <a class="dropdown-item" href="#">Налаштування</a>
        <a class="dropdown-item" href="#">Активності</a>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            <i class="fe fe-power"></i>
            {{ __('Logout') }}
        </a>
        </form>
      </div>
    </li>
  </ul>
</nav>