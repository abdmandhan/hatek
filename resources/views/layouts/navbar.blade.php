<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center">
        
        <div class="col-6 col-xl-2">
          <h1 class="mb-0 site-logo"><a href="{{ url('/')}}" class="mb-0"><img src="{{ asset("templates/images/logo-sv-tek.png")}}" alt="" srcset="" style="height: 40px"></a></h1>
        </div>

        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li class="has-children">
                <a href="#" class="nav-link">Profile</a>
                <ul class="dropdown">
                  <li><a href="{{ url('/#about-section')}}" class="nav-link">Tentang Kami</a></li>
                  <li><a href="{{ url('/#team-section')}}" class="nav-link">Staff</a></li>
                  <li><a href="{{ url('/#berita-section')}}" class="nav-link">Berita</a></li>
                  <li><a href="{{ url('/#faq-section')}}" class="nav-link">Learning Outcomes</a></li>
                </ul>
              </li>

              <li class="has-children">
                <a href="#akademik-section" class="nav-link">Akademik</a>
                <ul class="dropdown">
                  <li class="has-children">
                      <a href="#">Kurikulum</a>
                      <ul class="dropdown">
                        <li><a href="{{ url('kurikulum/1')}}">Semester 1</a></li>
                        <li><a href="{{ url('kurikulum/2')}}">Semester 2</a></li>
                        <li><a href="{{ url('kurikulum/3')}}">Semester 3</a></li>
                        <li><a href="{{ url('kurikulum/4')}}">Semester 4</a></li>
                        <li><a href="{{ url('kurikulum/5')}}">Semester 5</a></li>
                        <li><a href="{{ url('kurikulum/6')}}">Semester 6</a></li>
                      </ul>
                    </li>
                </ul>
              </li>

              <li>
                <a href="{{ url('/#project-section')}}" class="nav-link">Project</a>
              </li>

              <li class="has-children">
                <a href="#mhs-section" class="nav-link">Kemahasiswaan</a>
                <ul class="dropdown">
                  <li><a href="#mhs-section" class="nav-link">Micro IT</a></li>
                  <li class="has-children">
                    <a href="#">Prestasi</a>
                    <ul class="dropdown">
                      <li><a href="#">Nasional</a></li>
                      <li><a href="#">Internasional</a></li>
                    </ul>
                  </li>

                  <li class="has-children">
                    <a href="#">Kegiatan Kemahasiswaan</a>
                    <ul class="dropdown">
                      <li><a href="#">Seminar</a></li>
                      <li><a href="#">Sidang</a></li>
                      <li><a href="#">Kuliah Umum</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="has-children">
                <a href="#alumni-section" class="nav-link">Alumni</a>
                <ul class="dropdown">
                  <li><a href="{{ route('login') }}" class="nav-link">Portal Alumni</a></li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

      </div>
    </div>
    
  </header>