@extends('admin/layouts/master')
@section('css')
<style type="text/css">
	.button{
		margin-bottom: 30px;
	}

</style>
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;	
}
</style>
@endsection
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
	<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
		  <li class="breadcrumb-item">Maintenance</li>
		  <li class="breadcrumb-item active">Item</li>
	</ul>
</div>
<section class="forms"> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
                  	<div class="card">
	                    <div class="card-header d-flex align-items-center">
	                      	<h3 class="h4">Item</h3>
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-md-12">
	                    			<div class="pull-right button">
			                    		<button class="btn btn-primary mr-1"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&ensp;New Item</button>
			                    	</div>
	                    		</div>
		                    	<div class="col-md-12">
			                      	<table class="table table-striped" id="table">
				                        <thead>
				                          	<tr>
				                          		<th width="7%"></th>
				                          		<th width="20%">Name</th>
				                          		<th width="20%">Category</th>
				                          		<th width="17%">Type</th>
				                          		<th width="10%">Stocks</th>
				                          		<th width="10%" class="text-right">Price</th>
				                          		<th width="15%">Actions</th>
					                        </tr>	
				                        </thead>
				                        <tbody>
				                        	@foreach($items as $item)
				                        	<tr>
				                        		<td><img src="/images/{{$item->image}}" width="50px" height="50px"></td>
				                        		<td>{{$item->name}}</td>
				                        		<td>{{$item->itemcategory->name}}</td>
				                        		<td>{{$item->itemtype->name}}</td>
				                        		<td>{{$item->stocks}}</td>
				                        		<td class="text-right">{{$item->new_price}}</td>
					                        	<td>
					                        		<button class="btn btn-primary" onclick="addStock({{$item->id}})" data-toggle="modal" data-target="#addStocks" title="Add Stocks"><i class="fa fa-plus"></i></button>
					                        		<button class="btn btn-info butt" onclick="updateClicked({{$item->id}})" data-toggle="modal" data-target="#updateModal" title="Update"><i class="fa fa-pencil"></i></button>
					                        		<button class="btn btn-danger butt" onclick="removeClicked({{$item->id}})"  data-toggle="modal" data-target="#removeModal" title="Delete"><i class="fa fa-trash"></i></button>
					                        	</td>
				                        	</tr>
				                        	@endforeach
				                        </tbody>
			                      	</table>
		                    	</div>
	                    	</div>
	                    </div>
                  	</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- New Modal -->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
     	<div class="modal-content">
          	<form action="/item/insert" method="post" enctype="multipart/form-data"	>
          		{{csrf_field()}}
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">New Item</h4>
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
		        	<div class="form-group row">
			            <div class="col-md-4 text-center">
				            <div class="kv-avatar">
				                <div class="file-loading">
				                    <input id="avatar-1" name="avatar" type="file" width="150" height="150">
				                </div>
				            </div>
				        </div>
				        <div class="col-md-8" style="margin-top: 10px;">
				        	<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item type<font color="red">*</font></label>
							  	<div class="col-8">
							  		<select name="itemtype_id" class="form-control" onchange="itemchange(this)">
							  			@foreach($types as $type)
							  				<option value="{{$type->id}}" >{{$type->name}}</option>
							  			@endforeach
							  		</select>
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item Category</label>
							  	<div class="col-8">
							  		<select name="itemcategory_id" class="form-control select" disabled></select>
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item Name<font color="red">*</font></label>
							  	<div class="col-8">
							  		<input type="text" name="name" class="form-control">
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item Description</label>
							  	<div class="col-8">
							  		<textarea class="form-control" name="description"></textarea>
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Price<font color="red">*</font></label>
							  	<div class="col-8">
							  		<input type="text" name="price" class="form-control">
							  	</div>
							</div>
				        </div>
		        	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Save</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>

<!-- Update Modal -->
<div id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
     	<div class="modal-content">
          	<form action="/item/update" method="post" enctype="multipart/form-data"	>
          		{{csrf_field()}}
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">Update Item</h4>
		          <input type="hidden" id="id" name="id">
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
		            <div class="form-group row">
			            <div class="col-md-4 text-center">
				            <div class="kv-avatar">
				                <div class="file-loading">
				                    <input id="avatar-2" name="avatar" type="file" width="150" height="150">
				                </div>
				            </div>
				        </div>
				        <div class="col-md-8" style="margin-top: 10px;">
				        	<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item type<font color="red">*</font></label>
							  	<div class="col-8">
							  		<select  name="itemtype_id" class="form-control" onchange="itemchange(this)">
							  			@foreach($types as $type)
							  				<option id="type{{$type->id}}" value="{{$type->id}}" >{{$type->name}}</option>
							  			@endforeach
							  		</select>
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item Category</label>
							  	<div class="col-8">
							  		<select name="itemcategory_id" class="form-control select2" disabled></select>
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item Name<font color="red">*</font></label>
							  	<div class="col-8">
							  		<input id="name" type="text" name="name" class="form-control">
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Item Description</label>
							  	<div class="col-8">
							  		<textarea id="description" class="form-control" name="description"></textarea>
							  	</div>
							</div>
							<div class="form-group row">
							  	<label for="example-text-input" class="col-4 col-form-label">Price<font color="red">*</font></label>
							  	<div class="col-8">
							  		<input id="price" type="text" name="price" class="form-control">
							  	</div>
							</div>
				        </div>
		        	</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Save</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>

<!-- Remove Modal -->
<div id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
     	<div class="modal-content">
          	<form action="/item/delete" method="post">
          		{{csrf_field()}}
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">Remove Item</h4>
		          <input type="hidden" id="delete_id" name="id">
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
			        <h3 class="h4">Are you sure you want to remove <em id="text"></em></h3>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Continue</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>

<!-- Add Stocks -->
<div id="addStocks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-md">
     	<div class="modal-content">
          	<form action="/item/addstock" method="post">
          		{{csrf_field()}}
	          	<input type="hidden" id="stock_id" name="id">
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">Add Stocks</h4>
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
		        	<div class="form-group row">
				        <label for="example-text-input" class="col-4 col-form-label">Stocks<font color="red">*</font></label>
					  	<div class="col-5">
					  		<input type="text" name="stocks" class="form-control">
					  	</div>
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
<script type="text/javascript" src="/pages/item/app.js"></script>
<script type="text/javascript">
    $('#headtext').text('Maintenance');
    $('#maintenance').attr('aria-expanded','true');
    $('#maintenance').addClass(' collapse ');
    $('#item').addClass(' active ');
    $('#exampledropdownDropdown').addClass(' show ');
    $('#table').DataTable();
    function populateCategory(){
		$('.select2').attr('disabled',false);
	    @foreach($categories as $category)
			$('.select2').append('<option id="category{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>')
		@endforeach
    }
</script>
@endsection