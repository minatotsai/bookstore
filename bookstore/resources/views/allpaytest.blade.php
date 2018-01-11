@extends('layouts.app')
@section('content')
<form action="payTest" method ="post" >
	<input type="hidden" value="9e94e1bd210aaec" name="MerchantTradeNo">
	<input type="hidden" value="1" name="RtnCode">
	<input type="hidden" name="_token" value="">
	<input type="submit" value = "繳費">
	{{ csrf_field() }}
</form>
@endsection