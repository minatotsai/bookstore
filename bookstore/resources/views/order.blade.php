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
			<td>品項</td>
			<td>總價</td>
			<td>繳費狀態</td>
			<td>建立時間</td>
			<td>繳費時間</td>
		</tr>
		@foreach ($query as $var)
		<tr id = "{{$var->id}}" book_id= "{{$var->order_id}}">
			<td>{{$var->book_array}}</td>
			<td>{{$var->amount}}</td>

			
			@if ($var->book_status == 0)
				<td>未繳費</td>
			@elseif ($var->book_status == 1)
				<td>已繳費</td>
			@else
				<td>error</td>
			@endif
			<td>{{$var->created_at}}</td>
			
			
			@if($var->created_at == $var->updated_at)
				<td>尚未繳費</td>
			@else
				<td>{{$var->updated_at}}</td>
			@endif
		</tr>
		@endforeach
		
		</table>
    </div>
	
@endsection	

<script src="{{asset('js/jquery.min.js') }}"></script>
<script>

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

</script>
