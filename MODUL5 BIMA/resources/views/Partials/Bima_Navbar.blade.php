<nav class="nav">
    <div class="container-fluid">
        <ul class="nav justify-content-center">
            <li class="nav-item ">
              <a class="nav-link @yield('home') " href="/">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('vaccine')" href="{{ route('Bima_Vaccine_Index') }}">VACCINE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('patient') " href="{{ route('Bima_Patient_Index') }}">PATIENT</a>
            </li>
          </ul>
    </div>
  </nav>