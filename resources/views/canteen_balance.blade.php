@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            @if (session()->has('message_fail'))
                <div class="alert alert-danger">
                    {{ session('message_fail') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message_success'))
                <div class="alert alert-success">
                    {{ session('message_success') }}
                </div>
            @endif
        </div>
    </div>

    <center>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('assets/img/saldo_icon.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Canteen's Balance</h5>
                <p class="card-text">Rp {{ number_format($saldo) }}</p>
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_add"
                    style="width: 100px">Add</button>
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_withdraw"
                    style="width: 100px">Withdraw</button>
            </div>
        </div>
    </center>

    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_canteen_balance') }}" method="POST">
                        @csrf
                        <input id="amount" name="amount" type="number"
                            class="form-control @error('amount') is-invalid @enderror" placeholder="amount" required
                            autocomplete="amount" min="1" autofocus>
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Withdraw Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('withdraw_canteen_balance') }}" method="POST">
                        @csrf
                        <input id="amount" name="amount" type="number"
                            class="form-control @error('amount') is-invalid @enderror" placeholder="amount" required
                            autocomplete="amount" min="1" autofocus>
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Withdraw</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
