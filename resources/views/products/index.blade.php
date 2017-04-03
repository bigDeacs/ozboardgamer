@extends('appAdmin')

@section('meta')
    <title>Products</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Products</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/admin/pushProducts" class="btn btn-danger">Push To Algolia <i class="fa fa-cloud-upload"></i></a> <a href="/admin/products/add" class="btn btn-primary">Update Products <i class="fa fa-plus-square"></i></a></div>
			  	<div style="clear:both;"></div>
			  	<div class="row">
					<div class="col-sm-12">
						<p><strong>Products:</strong></p>
						<div class="table-responsive">
						  <table class="table dataTable table-striped table-hover">
						  	<col width="30%">
  							<col width="15%">
  							<col width="15%">
  							<col width="10%">
  							<col width="10%">
  							<col width="20%">
						    <thead>
						    	<tr>
						    		<th>Name</th>
						    		<th>Price</th>
						    		<th>Sale</th>
						    		<th>Savings</th>
						    		<th>Link</th>
						    		<th></th>
									<th></th>
						    	</tr>
						    </thead>
						    <tbody>
						    	@foreach($products as $product)
									<tr class="success">
							    		<td scope="row">{{ $product->name }}</td>
							    		<td>${!! $product->priceDisplay !!}</td>
							    		<td>@if($product->sale > 0)${!! $product->saleDisplay !!}@endif</td>
							    		<td>{!! round($product->savings, 2) !!}%</td>
										<td><a href="{!! $product->slug !!}" target="_blank">Link</a></td>
										<td><img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" /></td>
										<td><a href="/admin/products/{!! $product->id !!}/remove" target="_blank" class="btn btn-danger">Remove</a></td>
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
@endsection
