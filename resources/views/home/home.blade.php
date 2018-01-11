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
                		<div aria-label="Page navigation " class="page">
					        <ul class="pagination" id="pagination"></ul>
					    </div>
                		@if(count($items)>8)
                			@for($x=0; $x < ((int)count($items)/8) ; $x++)
	            				<div class="page{{$x+1}} col-md-12 row tago">
	                				@for($y=$x * 8; $y < ($x+1)*8; $y++)
	                					@if($y <= count($items)-1)
	                					<div class="col-md-3">
										 	<div class="card">
											  	<img class="card-img-top" src="/images/{{$items[$y]->image}}" alt="Card image cap">
											  	<div class="card-block">
											    	<p class="card-text text-center">{{$items[$y]->name}}<br> <small class="text-muted">&#8369; {{$items[$y]->new_price}}</small></p>
											    @if($items[$y]->stocks > 0)
											    <p class="col-md-12"><button id="but{{$items[$y]->id}}" onclick="addCart({{$items[$y]}},this)" class="btn btn-sm btn-info btn-block" title="add to cart"><i class="fa fa-cart-plus"></i></button></p>
											    @else
											    <p class="col-md-12"><button class="btn btn-sm btn-danger btn-block disabled" title="add to cart">Out of stock</button></p>
											    @endif
											  </div>
											</div>
				                		</div>
				                		@endif
	                				@endfor
	            				</div>
	            			@endfor
                		@else
                		@foreach($items as $item)
                		<div class="col-md-3">
						 	<div class="card">
							  	<img class="card-img-top" src="/images/{{$item->image}}" alt="Card image cap">
							  	<div class="card-block">
							    	<p class="card-text text-center">{{$item->name}}<br> <small class="text-muted">&#8369; {{$item->new_price}}</small></p>
							    <p class="col-md-12"><button id="but{{$item->id}}" onclick="addCart({{$item}},this)" class="btn btn-sm btn-info btn-block" title="add to cart"><i class="fa fa-cart-plus"></i></button></p>
							  </div>
							</div>
                		</div>
						@endforeach
						@endif
                	</div>
                </div>
           	</div>
		</section>
		<section class="col-md-4">
			<div class="card full-body sidebar">
                <div class="card-header d-flex align-items-center">
                  	<h3 class="h4"><i class="fa fa-shopping-cart"></i> Cart</h3>
                  	<div class="float-right"><button class="btn btn-info butt" onclick="checkoutClicked()" data-toggle="modal" data-target="#checkout"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>&ensp;Check-out</button></div>
                </div>
                <div class="card-body">
                	<div class="row">
                		<table class="table">
                			<thead>
                				<tr>
                					<th width="40%">Item</th>
                					<th width="20%">Quantity</th>
                					<th width="25%" class="text-right">Price</th>
                					<th width="15%"></th>
                				</tr>
                			</thead>
                			<tbody id="tbody">
                			</tbody>
                		</table>
                	</div>
                </div>
           	</div>
		</section>
	</div>
</div>

<!-- check-out -->
<div id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-md">
     	<div class="modal-content">
          	<form action="/checkout" method="post">
          		{{csrf_field()}}
	          	<input type="hidden" id="stock_id" name="id">
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">Checkout</h4>
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
		        	<div class="form-group row">
				        <label for="example-text-input" class="col-2 col-form-label">Total<font color="red">*</font></label>
				        <label  for="example-text-input" class="col-4 col-form-label">&#8369; &ensp;<span id="total"></span></label>
		        	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Continue</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/pages/home/app.js"></script>
<script type="text/javascript">
	var totalPage = {{(int)count($items)/8}};
	var prevPage =0;
	@if(count($items)%8 != 0)
		totalPage++;
	@endif
	$(function () {
        var obj = $('#pagination').twbsPagination({
            totalPages: totalPage,
            visiblePages: 5,
            onPageClick: function (event, page) {
				$('.page'+page).removeClass('tago');
				$('.page'+prevPage).addClass('tago');
            	prevPage = page;

            }
        });
        console.info(obj.data());
    });
</script>
@endsection