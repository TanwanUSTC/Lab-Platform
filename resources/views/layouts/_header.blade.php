<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
    @if (Auth::check())
      <a href="/home" id="logo">LAB PLATFORM</a>
    @else
    <a href="/" id="logo">>LAB PLATFORM</a>
    @endif
      <nav>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"role="button" aria-expanded="false" aria-haspopup="true">
                {{ Auth::user()->name }} <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
              <!-- <li>
                  <a href="{{url('bookadd')}}" 
                    role="button">
                    用户信息
                  </a>
              </li> -->
            </ul>
          </li>
          @else
            <li><a href="{{ route('help') }}">帮助</a></li>
            <li><a href="{{ route('login') }}">登录</a></li>
            <li><a href="{{ route('register') }}" role="button" >注册</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>