
@extends('test.header')

@section('content')
<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
      <!-- <div id="carouselExample" class="carousel slide" data-ride="carousel"> -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($images as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset($image->Images) }}" class="d-block w-100" style="height: 400px;" alt="Image {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="d-flex justify-content-center mb-3">
      @foreach($images as $index => $image)
          <a href="#" class="border mx-1 rounded-2 thumbnail-link" data-slide-to="{{ $index }}" data-target="#myCarousel">
              <img width="60" height="60" class="rounded-2" src="{{ asset($image->Images) }}" alt="Thumbnail {{ $index + 1 }}">
          </a>
      @endforeach
    </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark mb-0">
            {{ $product['Title']}}
          </h4>
          <div class="d-flex flex-row my-1">
            <span class="text-success ms-0 ">Tersedia</span>
          </div>

          <div class="mb-3">
            <span class="h5">Rp {{number_format( $product['Price'] , 0, ",", ".")}}</span>
          </div>

          <p>
            {{ $product['Description']}}
          </p>

          <div class="row">
            <dt class="col-3">Diunggah</dt>
            <dd class="col-9">{{ $hari }} hari yang lalu</dd>

            <dt class="col-3">Kondisi</dt>
            <dd class="col-9">{{$product['Condition']}}</dd>

            <dt class="col-3">Lokasi</dt>
            <dd class="col-9">Bandung</dd>
          </div>

          <hr />

          <a href="{{ route('chat.history', ['userId' => $user->id]) }}" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Chat Penjual </a>
          <!-- <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Suka </a>
         -->
         <form action="{{ route('wishlist', ['id' => $product]) }}" method="post">
           @method('POST')
            @csrf
            <button type="submit" class="btn btn-light border border-secondary py-2 icon-hover px-3">
                <i class="me-1 fa fa-heart fa-lg"></i> Suka
            </button>
        </form>
          <div class="col-md-4 col-6 mb-3 mt-3">
            <label class="mb-2 d-block">Buat penawaran</label>
            <div class="d-flex flex-row">
              <form action="{{ route('sendOfferMessage' , ['userId'=> $user->id])}}" method="POST">
                @csrf
                <input type="hidden" name="product" value="{{ $product->Title }}">
                <div class="form-outline w-100" style="width: 250px;">
                  <input type="text" id="typeNumber" name="typeNumber" class="form-control" />
                  <label class="form-label" for="typeNumber">Rp</label>
                </div>
                <button type="submit" class="btn btn-warning shadow-0"> Tawar </button>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->
<section class="border-top">
  <h3 style="padding-left: 9%; padding-top: 3%;">Profil Penjual</h1>
  <div class="d-flex flex-row pb-5 px-5 pt-1 mx-4">
    <img src="{{asset($user['image'])}}" alt="" class="rounded-circle mx-5" style="width: 100px; height: 100px; object-fit: cover;">
    <div class="d-flex flex-column">
      <p class="fw-bold mb-0">{{ $user['name']}}</p>
      <p class="mb-0">{{$user['location']}}</p>
      <a href="{{ route('showProfileSeller', ['id' => $user['id']]) }}">Kunjungi Profil</a>
    </div>
  </div>
</section>
<section class="bg-light border-top py-4">
  <h3 style="padding-left: 7%; padding-bottom: 0.5%;">Produk Serupa</h3>
  <div class="row px-5 mx-5">
    @foreach($products as $produk)
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex flex-wrap justify-content-between">
      <a href="{{ route('showProductDetail', ['id' => $produk['id']]) }}" style="color:inherit;">
      <div class="card w-90 my-2 shadow-2-strong">
        <img src="{{ asset($produk->images->first()->Images) }}" class="card-img-top" style = "aspect-ratio: 1/1;"/>
        <div class="card-body d-flex flex-column" style="color:inherit">
          <div class="d-flex flex-column">
            <h5 class="mb-1 me-1">{{ $produk['Title']}}</h5>
            <h5 class="mb-1 me-1">Rp {{number_format($produk['Price'], 0, ',' , '.')}}</h5>
          </div>
          <p class="text-muted mb-0">
            Kondisi: {{ $produk['Condition' ]}}
          </p>
          <div class="d-flex flex-row align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#c0c0c0}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
            <p class="text-muted px-1 m-0">
              Bandung
            </p>
          </div>
          <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
            <div href="#!" class="btn btn-primary shadow-0 me-1">Chat Penjual</div>
            <div href="#!" class="btn btn-light border icon-hover px-2 pt-2"><i class="fas fa-heart fa-lg text-secondary px-1"></i></div>
          </div>
        </div>
      </div>
      </a>
    </div>
    @endforeach
  </div>
</section>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
@endsection