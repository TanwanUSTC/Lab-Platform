@extends('layouts.default')
@section('content')
  <div class="jumbotron">
    <h1>BookManager</h1>
    <p class="lead">
      你现在所看到的是 <a href="https://github.com/LiuzeGit/bookmanager_liuze">中科大实验室信息平台</a>。
    </p>
    <p>
      一切，将从这里开始。
    </p>
    <p>
    @if (Auth::check())
      <a class="btn btn-lg btn-success" href="/home" role="button">开始</a>
    @else
      <a class="btn btn-lg btn-success" href="{{ route('login') }}" role="button">登录</a>
    @endif
    </p>
  </div>
@stop