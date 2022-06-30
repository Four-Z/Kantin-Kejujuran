@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>Products</h2>
            </div>
            <div class="col-md-4">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('home_sortByDate') }}">Date Created</a>
                        <a class="dropdown-item" href="{{ route('home_sortByName') }}">Product Name</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="products mb-5">
            <div class="row mt-4">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ url('assets/products') }}/{{ $product->image_path }}" class="img-fluid">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <h5><strong>{{ $product->name }}</strong> </h5>
                                        <p>{{ $product->description }}</p>
                                        <h5>Rp. {{ number_format($product->price) }}</h5>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <form action="{{ route('buy_product') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $product->id }}" name="product_id" hidden>
                                            <button class="btn btn-primary btn-block"
                                                onclick="return confirm('Are you sure?')"><i class="fas fa-shopping-cart">
                                                    Buy</i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        @include('layouts.footer')
    @endsection
