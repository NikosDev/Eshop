@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"> </br>
                <ul class="list-group">
                    @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge badge-default"> {{ $product['qty'] }} </span></h1> &nbsp;
                                <strong>{{ $product['item']['title'] }}</strong> &nbsp;
                                <span class="label label-success">{{ $product['price'] }}&euro;</span> &nbsp;
                                <div class="dropdown open">
                                    <button class="btn btn-secondary dropdown-toggle"
                                            type="button" id="dropdownMenu4" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                      Reduce
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{  URL::to('/reduce/'.$product['item']['id']) }}">Reduce by 1</a>
                                      <a class="dropdown-item" href="{{  URL::to('/remove/'.$product['item']['id']) }}">Remove</a>
                                    </div>
                              </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrice }} &euro;</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection
