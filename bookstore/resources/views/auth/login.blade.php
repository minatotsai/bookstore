@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="user_account" class="col-md-4 control-label">Account</label>

                            <div class="col-md-6">
                                <input id="user_account" type="user_account" class="form-control" name="user_account" value="{{ old('user_account') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>													
							
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            </div>
                        </div>
						
						@if ($errors->any())
							<div class="alert alert-danger">
								<strong>{{ $errors->first('errors') }}</strong>
							</div>
						@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
