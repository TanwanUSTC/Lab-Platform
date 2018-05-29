@extends('layouts.default')
@section('title', '注册')
@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>注册</h5>
    </div>
    <div class="panel-body">
      <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">用户名：</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}"required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username">姓名：</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}"required autofocus>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}"required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}"required autofocus>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          </div>
          <button type="submit" class="btn btn-primary">注册</button>
      </form>
    </div>
  </div>
</div>
@stop