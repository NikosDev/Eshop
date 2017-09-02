<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use App\Product;
?>
@extends('layouts.master')


@section('content')
    <div class='row'>
        <input type="text" class="form-control" id="search" name="search"></input>
        <div class='col-md-3'>
            <form action="{{URL::current()}}" container" >

                  <div class="col-md-8 my-4"><b>Price:</b> <br>
                    min:<input type="text" class="form-control" name="min_price" value="{{Input::get('min_price')}}">
                    max:<input type="text" class="form-control" name="max_price" value="{{Input::get('max_price')}}">
                </div>

                <div class="col-md-8 my-4">
                    <b>Order By:</b> <select name="taksinomisi" class="form-control"  >
                        <option class="blockquote-footer"> Select</option>
                        <option name="auksousa"  value="1" {{Input::get('taksinomisi')==1 ? 'selected' :'' }}>Ascending</option>
                        <option name="fthinousa" value="2" {{Input::get('taksinomisi')==2 ? 'selected' :'' }}>Descending </option>
                    </select>
                </div>

                <div class="col-md-8 my-4">
                    <b>Title:</b> <select name="title" class="form-control" >
                        <option value="" class="blockquote-footer"> Select</option>
                        <option name="playstasion4" value="playstasion4" {{Input::get('title')=='playstasion4' ? 'selected' :'' }}>Playstasion4</option>
                        <option name="nintendo ds" value="nintendo ds" {{Input::get('title')=='nintendo ds' ? 'selected' :'' }}>Nintendo Ds </option>
                        <option name="xbox one" value="xbox one" {{Input::get('title')=='xbox one' ? 'selected' :'' }}>Xbox one </option>
                        <option name="psp" value="psp" {{Input::get('title')=='psp' ? 'selected' :'' }}>Psp </option>
                        <option name="wii" value="wii" {{Input::get('title')=='wii' ? 'selected' :'' }}>Wii </option>    
                    </select>
                </div>
                
                <div class="col-md-8 my-4">
                    <input type="submit" class="btn btn-outline-primary" value="submit">
                </div>
                   
                
            </form>
        </div>
<div class='col-md-9' id="kosta" >
    @foreach($products->chunk(3) as $productChunk)
        <div class='row'>
            @foreach($productChunk as $product)
            <div class="col-md-4 my-3">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{$product->imagePath }}" alt="Card image cap"  style='max-height: 200px'  >
                        <div class="card-block">
                          <h4 class="card-title">{{$product->title }}</h4>
                            <p class="card-text">
                                {{$product->description }}
                            </p>
                          <button type="button" id="exept" onclick="location.href='{{URL::to('/add-to-cart/'.$product->id)}}';" class="btn btn-primary btn-md float-left" >Add to cart</button>
                          <h4 class="card-title float-right" id="add">{{$product->price }}&euro;</h4>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    @endforeach
    </div>
    </div>
    
    <div class='row' id="pagi">
        Pages: &nbsp; {{ $products->appends(Request::query())->links('') }}
    </div>       

@endsection
