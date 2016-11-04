@extends('base')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <h3 class="sign-head">Sign up</h3>
            <form role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}
                {{--{{$errors}}}--}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="email">User</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter User Name" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="pwd">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="repwd">Retype Password</label>
                    <input type="text" class="form-control" name="password_confirmation" placeholder="Retype Password">
                </div>
                <button type="submit" class="btn btn-primary form-control">submit</button>
            </form>

        </div>


    </div>

@endsection