<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head >
	<title >Virtooal</title >
	<style >
    img
    {
      width: 100px;
    }
	</style >
	@vite('resources/js/app.js')
</head >
<body class="p-5">
<h1 class="p-5">
	Virtooal </h1 >

<table class="table">
	<thead >
	<tr >
		<th scope="col">Product Name</th >
		<th scope="col">Description</th >
		<th scope="col">URL</th >
		<th scope="col">Image</th >
		<th scope="col">Price</th >
	</tr >
	</thead >
	<tbody >
	@foreach($items as $item)
		<tr >
			<th >{{ $item->PRODUCT_NAME }}</th >
			<td >{{ $item->DESCRIPTION }}</td >
			<td ><a href="{{ $item->URL }}">{{ $item->URL }}</a ></td >
			<td ><img src="{{ $item->IMAGE_URL }}" alt="image"></td >
			<td >{{ $item->PRICE }}</td >
		</tr >
	@endforeach
	</tbody >
</table >

<div class="btn btn-primary">Load More</div >

</body >
</html >
