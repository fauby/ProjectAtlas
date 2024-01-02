<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atlas ID</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- fslightbox CSS and JS -->
    <link rel="stylesheet" href="https://fslightbox.com/assets/fslightbox.min.css">
    <script src="https://fslightbox.com/assets/fslightbox.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your custom script -->

    <script>
      $(document).ready(function () {
          // Handle thumbnail click events
          $('.thumbnail-link').on('click', function (e) {
              e.preventDefault();

              // Get the target carousel ID
              var targetCarousel = $(this).data('target');

              // Get the index of the clicked thumbnail
              var index = $(this).data('slide-to');

              // Update the target carousel to the selected index
              $(targetCarousel).carousel(index);
          });
      });
    </script>

    <!-- Your first script -->
    <script>
        // Custom JavaScript/jQuery for image carousel
        $(document).ready(function(){
            // Initialize the Bootstrap Carousel
            $('.carousel').carousel();

            // Trigger the lightbox when a thumbnail is clicked
            $('[data-fslightbox]').fslightbox();
        });
    </script>


</head>
<body>
    <!--Main Navigation-->
    <header class>
        <!-- Jumbotron -->
        <div class="p-3 text-center bg-white border-bottom">
          <div class="container">
            <div class="row gy-3 align-items-center">
              <!-- Left elements -->
              <div class="col-lg-2 col-sm-4 col-4">
                <a href = "/test" class="float-start">
                    <img src="{{ asset('images/ewe.png') }}" alt="Example Image" height="50" >
                </a>
              </div>
              <!-- Left elements -->

              <!-- Center elements -->
              <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                <div class="d-flex float-end">
                    @guest
                    @if (Route::has('login'))
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        <a href="{{ route('login') }}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                            <p class="d-none d-md-block mb-0">Log in</p>
                        </a>
                    @endif

                    @if (Route::has('register'))
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> --}}
                        <a href="{{ route('register') }}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                            <p class="d-none d-md-block mb-0">Register</p>
                        </a>
                    @endif
                @else
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" action="{{ route('logout') }}" method="POST" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <a action="{{ route('logout') }}" method="POST" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> <i class="fas fa-user-alt m-1 me-md-2"></i><p class="d-none d-md-block mb-0">{{ Auth::user()->name }}</p> </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
                    {{-- <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> <i class="fas fa-user-alt m-1 me-md-2"></i><p class="d-none d-md-block mb-0">{{ Auth::user()->name }}</p> </a> --}}
                    <div class="dropdown">
                        <a href="{{url('profile')}}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0" >{{ Auth::user()->name }}</p>
                        </a>
                        

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            {{-- <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a href="{{url('wishlistUser')}}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="me-1 fa fa-heart fa-lg"></i>
                            <p class="d-none d-md-block mb-0" >Wishlist</p>
                        </a>
                    </div> 
                    <div class="dropdown">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button> 
                        </form>
                    </div>
                @endguest
                </div>
              </div>
              <!-- Center elements -->

              <!-- Right elements -->
              <div class="col-lg-5 col-md-12 col-12" style="width:100%;">
                <form action="{{route('showCatalog')}}" method="GET" class="input-group float-center">
                  <div class="d-flex flex-row w-100">
                  <div class="form-outline border" style="width:100%;">
                    <input type="search" id="form1" class="form-control" name="search"/>
                    <label class="form-label" for="form1">Search</label>
                  </div>
                    <button type="submit" class="btn btn-primary shadow-0" style="border-radius: 0% 20% 20% 0%;">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
              <!-- Right elements -->
            </div>
          </div>
        </div>
        <!-- Jumbotron -->


      </header>
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
<footer class="text-center text-lg-start text-muted bg-primary mt-3">
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start pt-4 pb-4">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-12 col-lg-3 col-sm-12 mb-2">
            <!-- Content -->
            <a href="https://mdbootstrap.com/" target="_blank" class="text-white h2">
              ATLAS
            </a>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-6 col-sm-4 col-lg-2">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">
              Store
            </h6>
            <ul class="list-unstyled mb-4">
              <li><a class="text-white-50" href="#">About us</a></li>
              <li><a class="text-white-50" href="#">Find store</a></li>
              <li><a class="text-white-50" href="#">Categories</a></li>
              <li><a class="text-white-50" href="#">Blogs</a></li>
            </ul>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-6 col-sm-4 col-lg-2">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">
              Information
            </h6>
            <ul class="list-unstyled mb-4">
              <li><a class="text-white-50" href="#">Help center</a></li>
              <li><a class="text-white-50" href="#">Money refund</a></li>
              <li><a class="text-white-50" href="#">Shipping info</a></li>
              <li><a class="text-white-50" href="#">Refunds</a></li>
            </ul>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-6 col-sm-4 col-lg-2">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">
              Support
            </h6>
            <ul class="list-unstyled mb-4">
              <li><a class="text-white-50" href="#">Help center</a></li>
              <li><a class="text-white-50" href="#">Documents</a></li>
              <li><a class="text-white-50" href="#">Account restore</a></li>
              <li><a class="text-white-50" href="#">My orders</a></li>
            </ul>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-12 col-sm-12 col-lg-3">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">Newsletter</h6>
            <p class="text-white">Stay in touch with latest updates about our products and offers</p>
            <div class="input-group mb-3">
              <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
              <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                Join
              </button>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <div class="">
      <div class="container">
        <div class="d-flex justify-content-between py-4 border-top">
          <!--- payment --->
          <div>
            <i class="fab fa-lg fa-cc-visa text-white"></i>
            <i class="fab fa-lg fa-cc-amex text-white"></i>
            <i class="fab fa-lg fa-cc-mastercard text-white"></i>
            <i class="fab fa-lg fa-cc-paypal text-white"></i>
          </div>
          <!--- payment --->

          <!--- language selector --->
          <div class="dropdown dropup">
            <a class="dropdown-toggle text-white" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
              </li>
            </ul>
          </div>
          <!--- language selector --->
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->
      <!-- MDB -->
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- Custom scripts -->
      <script type="text/javascript" src="js/script.js"></script>
  </body>
  </html>

