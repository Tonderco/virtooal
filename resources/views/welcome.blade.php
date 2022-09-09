<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head >
	<title >Virtooal</title >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

{{--<div>--}}
{{--	{{ csrf_field() }}--}}
{{--	<div id="post_data"></div>--}}
{{--</div>--}}

<div class="btn btn-primary">Load More</div >

</body >
</html >

<script>
  $(document).ready(function(){

    var _token = $('input[name="_token"]').val();

    load_data('', _token);

    function load_data(id="", _token)
    {
      $.ajax({
               url:"{{ route('load-data') }}",
               method:"POST",
               data:{id:id, _token:_token},
               success:function(data)
               {
                 $('#load_more_button').remove();
                 $('#post_data').append(data);
               }
             })
    }

    $(document).on('click', '#load_more_button', function(){
      var id = $(this).data('id');
      $('#load_more_button').html('<b>Loading...</b>');
      load_data(id, _token);
    });

  });
</script>
