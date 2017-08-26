@extends('layouts.app')

@section('content')


		<form name="upload" action="{{url('images/edit')}}" method="post" enctype="multipart/form-data">
		 {{ csrf_field() }}
		<img src="{{asset('public/img/'.$query[0]->book_img_name.'.jpg')}}">
		<input type="hidden" name="book_id" value="{{$query[0]->book_id}}">
		<input type="file" name="image" id="image">			
		<input type="submit" class="btn btn-primary">	
		
		</form>

@endsection	


<script src="{{asset('js/jquery.min.js') }}"></script>
<script>
/*
$(document).ready(function(){	
	$( ".table tbody" ).on("click",'tr td #insert-btn',function() {
			    var id = $(this).parents('tr:first').attr('book_id');				
				var buy_quantity = $(this).closest('tr').find('#buy_quantity').val();
				var data = id + "," + buy_quantity;
				history.pushState(null, null, '/books');
				//alert(buy_quantity);
				window.location.href = "books\\" + data + "\\create";
				
	});	
});
*/
</script>
