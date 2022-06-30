@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 border">
            <div class="p-3 py-5">
                <div class="d-flex mb-3">
                    <h4 class="text-left">&nbsp;Tambah Product</h4>
                </div>
                <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Product Name</label><input type="text"
                                class="form-control" placeholder="product name" name="product_name" required /></div>
                        <div class="col-md-12"><label class="labels">Description</label><input type="text"
                                class="form-control" placeholder="description" name="desc" required /></div>
                        <div class="col-md-12"><label class="labels">Price</label><input type="number" min="1"
                                class="form-control" placeholder="price" name="price" required /></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Product Image</label>
                            <input type="file" class="form-control" name="foto" required />
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="sumbit">Add
                            Product</button>
                </form>
            </div>
            @include('layouts.footer')
        @endsection
