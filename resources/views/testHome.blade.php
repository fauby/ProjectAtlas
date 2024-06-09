@extends('test.header')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-white bg-white shadow-0">
          <!-- Container wrapper -->
          <div class="container justify-content-center justify-content-md-between">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarLeftAlignExample" aria-controls="navbarLeftAlignExample" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
              <!-- Left links -->
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Navbar dropdown -->


                <li class="nav-item">
                <a class="nav-link" href="#">Semua Kategori</a>
                </li>
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categoryFilter', ['id' => $category->id]) }}">
                        {{ $category->CatName }}
                    </a>
                </li>
                @endforeach
              </ul>
              <!-- Left links -->
            </div>
          </div>
          <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
<!--  intro  -->
<section class="">
  <div class="bg-primary text-white py-5 ">
    <div class="container py-5">
      <h1>
        Best products & <br />
        brands in our store
      </h1>
      <p>
        Trendy Products, Factory Prices, Excellent Service
      </p>
    </div>
  </div>
</section>
<!-- intro -->

<!-- Products -->
<section>
  <div class="container my-5">
    <header class="mb-4 ">
      <h3>Untuk Anda</h3>
      <ul class="m-0 p-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Filter
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
      </ul>
    </header>

    <div class="row">
    @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 ">
                <div class="card my-2 shadow-2-strong">
                    <a href="{{ route('showProductDetail', ['id' => $product['id']]) }}" style="color:inherit;" class="img-wrap">
                      <div class="mask" style="height: 50px;">
                          <div class="d-flex justify-content-start align-items-start h-100 m-2">
                              <h6><span class="badge bg-success pt-2">Offer</span></h6>
                          </div>
                      </div>
                      @foreach($images as $image)
                        @if ($image['ProductID'] == $product['id'])
                          <img src="{{ asset($image['Images']) }}" class="card-img-top" style="aspect-ratio: 1 / 1" alt="{{ $product['Title'] }}">
                          @break
                        @endif
                      @endforeach
                      <div class="card-body p-3">
                          <div href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></div>
                          <h5 class="card-title">{{ $product['Title'] }}</h5>
                          <h5 class="card-title m-0">Rp {{ number_format($product['Price'], 0, '.', '.') }}</h5>
                          <p class="text-muted mb-0">
                              Kondisi: {{$product['Condition']}}
                          </p>
                          <div class="d-flex flex-row align-items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                  <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                              </svg>
                              <p class="text-muted px-1 m-0">
                                  {{ $product['Location'] }}
                              </p>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
        @endforeach
    </div>
  </div>
</section>
<!-- Products -->

@endsection


