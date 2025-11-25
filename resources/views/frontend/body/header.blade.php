    <header>
      <!-- Header Start -->
      <div class="header-area">
        <div class="main-header">
          <div class="header-bottom header-sticky">
            <div class="container-fluid">
              <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2">
                  <div class="logo">
                    <a href="index.html"
                      ><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""
                    /></a>
                  </div>
                </div>
                <div class="col-xl-10 col-lg-10">
                  <div
                    class="menu-wrapper d-flex align-items-center justify-content-end"
                  >
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                      <nav>
                        <ul id="navigation">
                          <li><a href="index.html">Home</a></li>
                          <li><a href="about.html">About</a></li>
                          <li><a href="services.html">services</a></li>
                          <li>
                            <a href="blog.html">Blog</a>
                            <ul class="submenu">
                              <li><a href="blog.html">Blog</a></li>
                              <li>
                                <a href="blog_details.html">Blog Details</a>
                              </li>
                              <li><a href="elements.html">Element</a></li>
                            </ul>
                          </li>
                          <li><a href="contact.html">Contact</a></li>

                          @auth
                          <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                          @else
                          <li><a href="{{route('login')}}">Login</a></li>
                          @endauth

                        </ul>
                      </nav>
                    </div>
                    <!-- Header-btn -->
                    <div class="header-right-btn d-none d-lg-block ml-20">
                      <a href="contact.html" class="btn header-btn"
                        ><img src="{{asset('frontend/assets/img/icon/smartphone.svg')}}" alt="" />
                        (+93) 788 077 685</a
                      >
                    </div>
                  </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header End -->
    </header>