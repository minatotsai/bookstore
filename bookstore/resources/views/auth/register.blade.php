@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_account') ? ' has-error' : '' }}">
                            <label for="user_account" class="col-md-4 control-label">Account</label>

                            <div class="col-md-6">
                                <input id="user_account" type="text" class="form-control" name="user_account" value="{{ old('user_account') }}" required autofocus>

                                @if ($errors->has('user_account'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_account') }}</strong>
                                    </span>
								@elseif ($errors->has('errors'))
									<span class="help-block">
                                        <strong>{{ $errors->first('errors') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
