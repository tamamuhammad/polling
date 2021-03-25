@extends('layout.auth')

@section('title', 'Login Page')

@section('container')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>YukPilih</b> Login Page</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login for vote the new polls</p>

      <form action="/" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection