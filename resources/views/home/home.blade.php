@extends('home/layouts/master')
@section('content')
<div class="container-fluid">
	<div class="row">
		<section class="col-md-8">
			<div class="card main-content">
                <div class="card-header d-flex align-items-center">
                  	<h3 class="h4">Medicines</h3>
                </div>
                <div class="card-body" >
                	<div class="row">
                		@foreach($items as $item)
                		<div class="col-md-3">
						 	<div class="card">
							  	<img class="card-img-top" src="/images/{{$item->image}}" alt="Card image cap">
							  	<div class="card-block">
							    	<p class="card-text text-center">{{$item->name}}</p>
							    <p class="col-md-12"><button onclick="addCart({{$item}})" class="btn btn-sm btn-info btn-block" title="add to cart"><i class="fa fa-cart-plus"></i></button></p>
							  </div>
							</div>
                		</div>
						@endforeach
                	</div>
                </div>
           	</div>
		</section>
		<section class="col-md-4">
			<div class="card full-body sidebar">
                <div class="card-header d-flex align-items-center">
                  	<h3 class="h4"><i class="fa fa-shopping-cart"></i> Cart</h3>
                </div>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-12">
                            
                        </div>
                	</div>
                </div>
           	</div>
		</section>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="/pages/home/app.js"></script>
@endsection