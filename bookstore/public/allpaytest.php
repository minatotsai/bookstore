@extends('layouts.app')
<form action="payTest" method ="post" >
	<input type="hidden" value="fuck" name="MerchantTradeNo">
	<input type="hidden" value="you" name="RtnCode">
	<input type="hidden" name="_token" value="">
	<input type="submit" value = "繳費">
	{{ csrf_token() }}
</form>
