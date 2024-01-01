<!-- resources/views/categories/add.blade.php -->

@extends('test.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Kategori') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('addCategory') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Nama Kategori') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <!-- tambahkan field kategori lainnya jika diperlukan -->

                            <button type="submit" class="btn btn-primary">{{ __('Tambah Kategori') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
