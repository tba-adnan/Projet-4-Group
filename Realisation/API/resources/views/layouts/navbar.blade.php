<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        
          <li class="nav-item d-none d-sm-inline-block">
         
          </li>
        </ul>
    
        <!-- Right navbar links -->
        
        <ul class="navbar-nav ml-auto">
          <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
               {{app()->getLocale()}}
            
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

              <a class="dropdown-item" rel="alternate"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}</a>
             
              
          @endforeach

            </div>
        </div>
    
    
          <!-- Messages Dropdown Menu -->
        
          <!-- Notifications Dropdown Menu -->
       
           
<<<<<<< HEAD
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        
=======
          
          {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li> --}}
>>>>>>> 2353b6fd0af25efe3342eaa061de268c9a3875aa
        </ul>
      </nav>