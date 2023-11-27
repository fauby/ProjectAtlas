@extends('test.header')

@section('content')
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
      <button type="button" class="btn btn-outline-light">
        Learn more
      </button>
      <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white">
        <span class="pt-1">Purchase now</span>
      </button>
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
        {{-- @dd($product) --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card my-2 shadow-0">
                    <a href="#" class="img-wrap">
                        <div class="mask" style="height: 50px;">
                            <div class="d-flex justify-content-start align-items-start h-100 m-2">
                                <h6><span class="badge bg-success pt-2">Offer</span></h6>
                            </div>
                        </div>
                        {{-- <img src="{{ asset('storage/' . $product['Image']) }}" class="card-img-top" style="aspect-ratio: 1 / 1" alt="{{ $product['Title'] }}"> --}}
                        <img src="{{asset($product['Image'])}}" class="card-img-top" style="aspect-ratio: 1 / 1" alt="{{ $product->title }}">
                    </a>
                    <div class="card-body p-0 pt-3">
                        <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                        <h5 class="card-title">{{ $product['Title'] }}</h5>
                        <h5 class="card-title m-0">Rp {{ $product['Price'] }}</h5>
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
                </div>
            </div>
        @endforeach
    </div>
  </div>
</section>
<!-- Products -->

<!-- Feature -->
<section class="">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="card-banner bg-gray h-100" style="
                                                      min-height: 200px;
                                                      background-size: cover;
                                                      background-position: center;
                                                      width: 100%;
                                                      background-repeat: no-repeat;
                                                      top: 50%;
                                                      background-image: url('https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/banners/banner-item2.webp');">
          <div class="p-3 p-lg-5" style="max-width: 70%;">
            <h3 class="text-dark">Best products & brands in our store at 80% off</h3>
            <p>That's true but not always</p>
            <button class="btn btn-warning shadow-0" href="#"> Claim offer </button>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row mb-3 mb-sm-4 g-3 g-sm-4">
          <div class="col-6 d-flex">
            <div class="card w-100 bg-primary" style="min-height: 200px;">
              <div class="card-body">
                <h5 class="text-white">Gaming toolset</h5>
                <p class="text-white-50">Technology for cyber sport</p>
                <a class="btn btn-outline-light btn-sm" href="#">Learn more</a>
              </div>
            </div>
          </div>
          <div class="col-6 d-flex">
            <div class="card w-100 bg-primary" style="min-height: 200px;">
              <div class="card-body">
                <h5 class="text-white">Quality sound</h5>
                <p class="text-white-50">All you need for music</p>
                <a class="btn btn-outline-light btn-sm" href="#">Learn more</a>
              </div>
            </div>
          </div>
        </div>
        <!-- row.// -->

        <div class="card bg-success" style="min-height: 200px;">
          <div class="card-body">
            <h5 class="text-white">Buy 2 items, With special gift</h5>
            <p class="text-white-50" style="max-width: 400px;">Buy one, get one free marketing strategy helps your business improves the brand by sharing the profits</p>
            <a class="btn btn-outline-light btn-sm" href="#">Learn more</a>
          </div>
        </div>
      </div>
      <!-- col.// -->
    </div>
    <!-- row.// -->
  </div>
  <!-- container end.// -->
</section>
<!-- Feature -->

<!-- Recently viewed -->
<section class="mt-5 mb-4">
  <div class="container text-dark">
    <header class="">
      <h3 class="section-title">Baru saja dilihat</h3>
    </header>

    <div class="row gy-3">
      <div class="col-lg-2 col-md-4 col-4">
        <a href="#" class="img-wrap">
          <img height="200" width="200" class="img-thumbnail" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp" />
        </a>
      </div>
      <!-- col.// -->
      <div class="col-lg-2 col-md-4 col-4">
        <a href="#" class="img-wrap">
          <img height="200" width="200" class="img-thumbnail" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/2.webp" />
        </a>
      </div>
      <!-- col.// -->
      <div class="col-lg-2 col-md-4 col-4">
        <a href="#" class="img-wrap">
          <img height="200" width="200" class="img-thumbnail" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/3.webp" />
        </a>
      </div>
      <!-- col.// -->
      <div class="col-lg-2 col-md-4 col-4">
        <a href="#" class="img-wrap">
          <img height="200" width="200" class="img-thumbnail" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/4.webp" />
        </a>
      </div>
      <!-- col.// -->
      <div class="col-lg-2 col-md-4 col-4">
        <a href="#" class="img-wrap">
          <img height="200" width="200" class="img-thumbnail" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp" />
        </a>
      </div>
      <!-- col.// -->
      <div class="col-lg-2 col-md-4 col-4">
        <a href="#" class="img-wrap">
          <img height="200" width="200" class="img-thumbnail" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/6.webp" />
        </a>
      </div>
    </div>
  </div>
</section>
<!-- Recently viewed -->

<section>
  <div class="container">
    <div class="px-4 pt-3 border">
      <div class="row pt-1">
        <div class="col-lg-3 col-md-6 mb-3 d-flex">
          <div class="d-flex align-items-center">
            <div class="badge badge-warning p-2 rounded-4 me-3">
              <i class="fas fa-thumbs-up fa-2x fa-fw"></i>
            </div>
            <span class="info">
              <h6 class="title">Reasonable prices</h6>
              <p class="mb-0">Have you ever finally just</p>
            </span>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3 d-flex">
          <div class="d-flex align-items-center">
            <div class="badge badge-warning p-2 rounded-4 me-3">
              <i class="fas fa-plane fa-2x fa-fw"></i>
            </div>
            <span class="info">
              <h6 class="title">Worldwide shipping</h6>
              <p class="mb-0">Have you ever finally just</p>
            </span>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3 d-flex">
          <div class="d-flex align-items-center">
            <div class="badge badge-warning p-2 rounded-4 me-3">
              <i class="fas fa-star fa-2x fa-fw"></i>
            </div>
            <span class="info">
              <h6 class="title">Best ratings</h6>
              <p class="mb-0">Have you ever finally just</p>
            </span>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3 d-flex">
          <div class="d-flex align-items-center">
            <div class="badge badge-warning p-2 rounded-4 me-3">
              <i class="fas fa-phone-alt fa-2x fa-fw"></i>
            </div>
            <span class="info">
              <h6 class="title">Help center</h6>
              <p class="mb-0">Have you ever finally just</p>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


