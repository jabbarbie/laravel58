
<!-- Logo -->
<a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>CL</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>{{ config('app.name', 'AdminLTE') }}</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <!-- untuk logout -->
        <li class="dropdown tasks-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" onclick="event.preventDefault();document.getElementById('form-logout').submit();">
                <span class="hidden-xs">Logout</span>
            </a>
            
            <form id="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

      
        
        </li>
       

    </ul>
    </div>
</nav>
 
