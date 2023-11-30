
@extends('test.header')

@section('content')
<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
            <img style="max-width: 100%; max-height: 60vh; margin: auto;" class="rounded-4 fit" src="{{ asset($product['Image']) }}" />
          </a>
        </div>
        <div class="d-flex justify-content-center mb-3">
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" />
          </a>
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

          <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Chat Penjual </a>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Suka </a>
          <div class="col-md-4 col-6 mb-3 mt-3">
            <label class="mb-2 d-block">Buat penawaran</label>
            <div class="d-flex flex-row">
              <div class="form-outline w-100" style="width: 250px;">
                <input type="number" id="typeNumber" class="form-control" />
                <label class="form-label" for="typeNumber">Rp</label>
              </div>
              <a href="#" class="btn btn-warning shadow-0"> Tawar </a>
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
    <img src="profil.jpg" alt="" class="rounded-circle mx-5" style="width: 100px; height: 100px; object-fit: cover;">
    <div class="d-flex flex-column">
      <p class="fw-bold mb-0">{{ $user['name']}}</p>
      <p class="mb-0">Antafunky</p>
      <a href="">Kunjungi Profil</a>
    </div>
  </div>
</section>
<section class="bg-light border-top py-4">
  <h3 style="padding-left: 7%; padding-bottom: 0.5%;">Produk Serupa</h3>
  <div class="row px-5 mx-5">
    @foreach($products as $produk)
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex flex-wrap justify-content-between">
      <div class="card w-90 my-2 shadow-2-strong">
        <img src="{{ asset($produk['Image']) }}" class="card-img-top" />
        <div class="card-body d-flex flex-column">
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
            <a href="#!" class="btn btn-primary shadow-0 me-1">Chat Penjual</a>
            <a href="#!" class="btn btn-light border icon-hover px-2 pt-2"><i class="fas fa-heart fa-lg text-secondary px-1"></i></a>
          </div>
        </div>
      </div>
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