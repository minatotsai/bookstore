@extends('layouts.app')

@section('content')

	<div class="starter-template">
		<table class = "table table-hover">
		<tr>
			<td>書籍名稱</td>
			<td>書籍價格</td>
			<td>購買數量</td>
			<td>修改數量</td>
		</tr>
		@foreach ($query as $var)
		<tr user_id="{{$var->user_id}}">
			
			<td>{{$var->book_id}}</td>
			<td>{{$var->book_price}}</td>
			<td><input type="text" name="buy_quantity" id="buy_quantity" value="{{$var->book_buy_quantity}}"></td>
			<td><a href="#" role="btn" class="btn btn-warning" id="insert-btn">修改</a></td>
		</tr>
		@endforeach
		</table>
    </div>
@endsection	


<script src="{{asset('js/jquery.min.js') }}"></script>
<script>
/*
$(document).ready(function(){	
	$( ".table tbody" ).on("click",'tr td #insert-btn',function() {
			    var id = $(this).parents('tr:first').attr('book_id');				
				var buy_quantity = $(this).closest('tr').find('#buy_quantity').val();
				var data = id + "," + buy_quantity;
				//alert(buy_quantity);
				window.location.href = "books\\" + data + "\\create";

	});	
});
*/
</script>
