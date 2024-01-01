@extends('test.header')


@section('content') 
<!-- sidebar + content -->
<section class="">
  <div class="container">
    <div class="row">
      <!-- sidebar -->
      <div class="col-lg-3">
        <!-- Toggle button -->
        <button
                class="btn btn-outline-secondary mb-3 w-100 d-lg-none"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
          <span>Show filter</span>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                        class="accordion-button text-dark bg-light"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#panelsStayOpen-collapseOne"
                        aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne"
                        >
                  Kategori lainnya
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                  @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categoryFilter', ['id' => $category->id]) }}">
                        {{ $category->CatName }}
                    </a>
                </li>
                @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button
                        class="accordion-button text-dark bg-light"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#panelsStayOpen-collapseTwo"
                        aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseTwo"
                        >
                  Kondisi
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                <div class="accordion-body">
                  <div>
                    <!-- Checked checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked />
                      <label class="form-check-label" for="flexCheckChecked1">Baru</label>
                      <span class="badge badge-secondary float-end">120</span>
                    </div>
                    <!-- Checked checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked />
                      <label class="form-check-label" for="flexCheckChecked2">Bekas</label>
                      <span class="badge badge-secondary float-end">15</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                        class="accordion-button text-dark bg-light"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#panelsStayOpen-collapseThree"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree"
                        >
                  Harga
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                <div class="accordion-body">
                  <div class="range">
                    <input type="range" class="form-range" id="customRange1" />
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <div class="form-outline">
                        <input type="number" id="typeNumber" class="form-control" />
                        <label class="form-label" for="typeNumber">Min</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-outline">
                        <input type="number" id="typeNumber" class="form-control" />
                        <label class="form-label" for="typeNumber">Maks</label>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-white w-100 border border-secondary">terapkan</button>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button
                        class="accordion-button text-dark bg-light"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#panelsStayOpen-collapseThree"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree"
                        >
                  Jarak
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                <div class="accordion-body">
                  <div class="range">
                    <input type="range" class="form-range" id="customRange1" />
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <div class="form-outline">
                        <input type="number" id="typeNumber" class="form-control" />
                        <label class="form-label" for="typeNumber">Min</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-outline">
                        <input type="number" id="typeNumber" class="form-control" />
                        <label class="form-label" for="typeNumber">Maks</label>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-white w-100 border border-secondary">terapkan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <!-- content -->
      <div class="col-lg-9">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
        <strong class="d-block py-2">{{ $productsCount }} Barang ditemukan </strong>
          <div class="ms-auto">
            <select class="form-select d-inline-block w-auto border pt-1">
              <option value="0">Paling Sesuai</option>
              <option value="1">Terbaru</option>
              <option value="2">Harga Tertinggi</option>
              <option value="3">Harga Terendah</option>
            </select>
            <div class="btn-group shadow-0 border">
              <a href="#" class="btn btn-light" title="List view">
                <i class="fa fa-bars fa-lg"></i>
              </a>
              <a href="#" class="btn btn-light active" title="Grid view">
                <i class="fa fa-th fa-lg"></i>
              </a>
            </div>
          </div>
        </header>

        <div class="row">
            @if(isset($selectedCategory))
                <div class="col-12">
                    <h4>Filtered by Category: {{ $selectedCategory->name }}</h4>
                </div>
            @endif
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                    <div class="card w-100 my-2 shadow-2-strong"> 
                    <a href="{{ route('showProductDetail', ['id' => $product['id']]) }}" style="color:inherit;" class="img-wrap">
                        @foreach($images as $image)
                            @if ($image['ProductID'] == $product['id'])
                                <img src="{{ asset($image['Images']) }}" class="card-img-top" style="aspect-ratio: 1 / 1" alt="{{ $product['Title'] }}">  
                                @break
                            @endif
                        @endforeach
                        <img src="" class="card-img-top" />
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex flex-column">
                                <h5 class="mb-1 me-1">{{$product['Title']}}</h5>
                                <h5 class="mb-1 me-1">Rp {{ number_format( $product['Price'], 0, '.', '.') }}</h5>
                            </div>
                            <p class="text-muted mb-0">
                                Kondisi: {{ $product['Condition']}}
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
                    </a>
                    </div>
                </div>
            @endforeach
        </div>

        <hr />

        <!-- Pagination -->
        <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- Pagination -->
      </div>
    </div>
  </div>            
</section>
<!-- sidebar + content -->

<!-- Footer -->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
@endsection

