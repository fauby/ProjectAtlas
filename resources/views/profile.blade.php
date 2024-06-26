@extends('test.header')

@section('content')
<!-- Heading -->
<div class="bg-primary mb-4">
    <div class="container py-4">
        <div class="d-flex flex-row px-5 pt-1 mx-5 align-items-center justify-content-between">
            <div class="d-flex flex-row">
            <img src="{{asset($user['image'])}}" alt="" class="rounded-circle"
                    style="margin-left: 10%; margin-right:30px; width: 110px; height: 100px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-between text-white">
                    <p class="fw-bold mb-0">{{ $user->name }}</p>
                    <p class="mb-0">{{ $user->location }}</p>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-between">
                <!-- <a href="{{ route('profileedit')}}" class="btn btn-secondary shadow-0 me-1 my-1">Edit profil</a>
                <a href="{{ route('create') }}" class="btn btn-secondary shadow-0 me-1 my-1">Jual Barang</a> -->
                @if(auth()->user()->id == $user->id)
                    <a href="{{ route('profileedit')}}" class="btn btn-secondary shadow-0 me-1 my-1">Edit profil</a>
                    <a href="{{ route('create') }}" class="btn btn-secondary shadow-0 me-1 my-1">Jual Barang</a>
                @endif
                @if(auth()->user()->email == "test1234@gmail.com")
                    <a href="{{ route('addCategory')}}" class="btn btn-secondary shadow-0 me-1 my-1">tambah category</a>
                @endif
            </div>
        </div>
        <!-- Breadcrumb -->
    </div>
</div>
<!-- Heading -->
</header>

<!-- sidebar + content -->
<section class="">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <!-- sidebar -->

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
                    @foreach ($products as $product) 
                    <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                    <a href="{{ route('showProductDetail', ['id' => $product['id']]) }}" style="color:inherit;">
                    <div class="card w-100 my-2 shadow-2-strong">
                        @foreach($images as $image)
                            @if ($image['ProductID'] == $product['id'])
                            <img src="{{ asset($image['Images']) }}" class="card-img-top" style="aspect-ratio: 1 / 1" alt="{{ $product['Title'] }}">  
                            @break
                            @endif
                        @endforeach

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex flex-column">
                                    <h5 class="mb-1 me-1">{{ $product['Title'] }}</h5>
                                    <h5 class="mb-1 me-1">Rp {{ number_format( $product['Price'], 0, '.', '.') }}</h5>
                                </div>
                                <p class="text-muted mb-0">
                                    Kondisi: {{ $product['Condition'] }}
                                </p>
                                <div class="d-flex flex-row align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #c0c0c0
                                            }

                                        </style>
                                        <path
                                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                    </svg>
                                    <p class="text-muted px-1 m-0">
                                        Bandung
                                    </p>
                                </div>
                                <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                    <a href="#!" class="btn btn-light border icon-hover px-2 pt-2"><i
                                            class="fas fa-heart fa-lg text-secondary px-1"></i></a>
                                </div>
                            </div>
                        </div>
                        </a>
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
@endsection
