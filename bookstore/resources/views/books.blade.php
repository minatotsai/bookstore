@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ $errors->first('errors') }}</strong>
    </div>
@endif
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

	<div class="starter-template">
		<table class = "table table-hover">
		<tr>
			<td>圖片</td>
			<td>書籍名稱</td>
			<td>書籍價格</td>
			<td>剩餘數量</td>
			<td>加入購物車</td>
		</tr>
		@foreach ($query as $var)
		<tr book_id="{{$var->book_id}}">
			<td><img src="{{asset('img/'.$var->book_img_name)}}" alt="" width="80" height="100"></td>	
			<td>{{$var->book_name}}</td>
			<td>{{$var->book_price}}</td>
			<td>{{$var->book_quantity}}</td>
			<td><input type="text" name="buy_quantity" id="buy_quantity" value="1"></td>
			<td><a href="#" role="btn" class="btn btn-warning" id="insert-btn">加入購物車</a></td>
		</tr>
		@endforeach
		</table>
    </div>
@endsection	


<script src="{{asset('js/jquery.min.js') }}"></script>
<script>

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

</script>
