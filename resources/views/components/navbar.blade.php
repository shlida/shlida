<div class="header-jeban-logo">
    <a href="#">
        <img src="http://s.jeban.com/2014/web/images/jeban-logo.png">
    </a>
</div>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-top">
    <!-- start menu & search -->
    <ul class="nav">
        <li class="nav-item">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#jeban-section" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="jeban-section">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-community"></i><span>Webboard<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-privilege"></i><span>Activity & Privilege<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-swatch"></i><span>Swatch<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-beautycheck"></i><span>Beauty Check<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-review"></i><span>User Review<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-vdo"></i><span>VDO<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-star"></i><span>Shine Girls<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-event"></i><span>Event<span/></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item flex-left mobile-search">
            <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
            <a class="nav-link jeban-social" href="#"><i class="fa fa-facebook"></i></a>
            <a class="nav-link jeban-social" href="#"><i class="fa fa-instagram"></i></a>
            <a class="nav-link jeban-social" href="#"><i class="fa fa-youtube-play"></i></a>
        </li>
    </ul>
    <!-- end user section & search -->

    <!-- start user section -->
    <ul class="nav justify-content-end user-section">
      @if (Auth::guest())
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">
          <i class="fa fa-edit"></i>
          <span>Login</span>
        </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/register') }}">
            <i class="fa fa-edit"></i>
            <span>Register</span>
          </a>
        </li>
      @else
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-edit"></i>
                <span>Create</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#user-desktop-dropdown" data-toggle="collapse" data-target="#user-desktop-dropdown" aria-expanded="false" >
                <img class="user-avatar" src="http://unsplash.it/30x30">
                <span>ploykidz</span>
            </a>
            <div class="collapse" id="user-desktop-dropdown">
              <a class="nav-item" href="#">My page</a>
              <a class="nav-item" href="#">Notifications</a>
              <a class="nav-item" href="#">mgmt</a>
              <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>

            </div>
        </li>
      @endif
    </ul>
    <!-- end user section -->
</nav>


<nav class="navbar navbar-toggleable-* navbar-light bg-faded navbar-scroll hidden">
    <!-- start user section & search -->
    <ul class="nav user-section">
        <li class="nav-item">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-mobile-dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu-mobile-dropdown">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-community"></i><span>Webboard<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-privilege"></i><span>Activity & Privilege<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-swatch"></i><span>Swatch<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-beautycheck"></i><span>Beauty Check<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-review"></i><span>User Review<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-vdo"></i><span>VDO<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-star"></i><span>Shine Girls<span/></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="icon-event"></i><span>Event<span/></a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item mobile-jeban-logo">
            <a class="nav-link" href="#">
                <img src="http://s.jeban.com/2014/web/images/jeban-logo.png">
            </a>
        </li>
        <li class="nav-item flex-left mobile-create">
            <a class="nav-link" href="#">
                <i class="fa fa-edit"></i>
                <span>Create</span>
            </a>
        </li>
        <li class="nav-item mobile-search">
            <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
        </li>
        <li class="nav-item dropdown mobile-user">
            <a class="nav-link dropdown-toggle" href="#user-mobile-dropdown" data-target="#user-mobile-dropdown" data-toggle="collapse"
            aria-expanded="false" aria-label="Toggle navigation">
                <img class="user-avatar" src="http://unsplash.it/30x30">
                <span>ploykidz</span>
            </a>
            <div class="collapse" id="user-mobile-dropdown">
              <a class="nav-item" href="#">My page</a>
              <a class="nav-item" href="#">Notifications</a>
              <a class="nav-item" href="#">mgmt</a>
            </div>
        </li>
    </ul>
    <!-- end user section & search -->
</nav>
