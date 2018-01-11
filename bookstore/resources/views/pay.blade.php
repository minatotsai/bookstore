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
@php
	$total = 0;
@endphp
	<div class="starter-template">
		<table class = "table table-hover">
		<tr>
			<td>書籍名稱</td>
			<td>書籍價格</td>
			<td>購買數量</td>
		</tr>
		@foreach ($query as $var)
			<tr cart_id = "{{$var->cart_id}}" book_id= "{{$var->book_id}}">
			<td>{{$var->book_name}}</td>
			<td>{{$var->book_price}}</td>
			<td>{{$var->book_buy_quantity}}</td>
		</tr>
		@php
			$total = $total + ($var->book_price)*($var->book_buy_quantity);			
		@endphp
		@endforeach
		</table>
    </div>
	@php
		if($total != 0)
		{
		echo "<div align=\"right\">";
		echo "<span style=\"color:red;font-size:1cm;\">總和:$total</span>";
		echo "</div>";
		}
	@endphp

	<form action="paySet"  onSubmit="return confirm('訂單已確認?');">
		<hr>
		<h2>ChoosePayment</h2>
		<select name="payway">
	        <option value="ALLPAY" selected>ALLPAY</option>
	    </select>
		<input class="btn btn-danger" type="submit" value="選擇繳費方式" />
	</form>

	
@endsection	

<script src="{{asset('js/jquery.min.js') }}"></script>
<script>
/*
$(document).ready(function(){	
	$( ".table tbody" ).on("click",'tr td #update-btn',function() {
			    var id = $(this).parents('tr:first').attr('book_id');				
				var buy_quantity = $(this).closest('tr').find('#buy_quantity').val();
				var data = id + "," + buy_quantity;
				//alert(data);
				history.pushState(null, null, '/carts');
				window.location.href = "carts\\" + data + "\\edit";

	});

	$( ".table tbody" ).on("click",'tr td #delete-btn',function() {
				if(!confirm("確實要刪除嗎?"))
					return false;
				else
				{
					var id = $(this).parents('tr:first').attr('cart_id');								
					//alert(id);	
					history.pushState(null, null, '/carts');
					window.location.href = "carts\\" + id + "\\destroy";				
				}
	});
	
});
*/
</script>
