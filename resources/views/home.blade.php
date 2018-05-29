
@extends('layouts.default')
@section('title',Auth::user()->name)
@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div class="col-md-12">
      <div class="col-md-offset-2 col-md-8">
        <section class="user_info">
        <h1>{{Auth::user()->username }} </h1>
        <?php use App\Admin;?>
          @if(Admin::where('id',Auth::user()->id)->first())
            <h1>{{ Auth::user()->email }}---管理员</h1>
          @else
            <h1>{{ Auth::user()->email }}---普通用户</h1>
          @endif
        </section>
      </div>
    </div>
  </div>
</div>
    @if(Admin::where('id',Auth::user()->id)->first())
        <div>
        <h2>管理员权限</h2>
          
          
  
        <h2>用户权限</h2>
          
        </div>
    @else
      <div> 
          <h2>用户权限</h2>
      </div>
    @endif
@stop
