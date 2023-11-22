@extends('test.header')

@section('content')
    {{-- <h1>Upload</h1>
    <form action="/upload" method="post">
        @csrf
        <input type="file" name="image" id="">
        <input type="submit" name="upload">
    </form> --}}



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="/upload/add" >
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            {{-- <label for="SellerID" class="col-md-4 col-form-label text-md-right">{{ __('Seller') }}</label> --}}

                            <div class="form-group row">
                                <label for="SellerID" class="col-md-4 col-form-label text-md-right">{{ __('SellerID') }}</label>

                                <div class="col-md-6">
                                    {{-- <input type="text" name="seller_id" value="{{ Auth::user()->name }}" readonly> --}}
                                    <input id="Title" type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>

                                    @error('SellerID')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="Title" type="text" class="form-control @error('Title') is-invalid @enderror" name="Title" value="{{ old('Title') }}" required autocomplete="Title">

                                @error('Title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="Description" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}" required autocomplete="Description"></textarea>

                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="Price" type="text" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price') }}" required autocomplete="Price">

                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select name="category_id" id="category_id" class="form-control">

                                    @foreach($categoryInfo as $category)
                                        <option value="{{ $category["id"] }}">{{ $category["CatName"]}}</option>
                                    @endforeach
                                </select>

                                @error('Category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Tags" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

                            <div class="col-md-6">
                                <input id="Condition" type="text" class="form-control @error('Condition') is-invalid @enderror" name="Condition" value="{{ old('Condition') }}" required autocomplete="Condition">

                                @error('Condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="Image" type="file" class="form-control @error('Image') is-invalid @enderror" name="Image" value="{{ old('Image') }}" required autocomplete="Image">

                                @error('Image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


