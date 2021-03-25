@extends('layout.auth')

@section('title', 'Change Password')

@section('container')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>YukPilih</b> Change Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Your password is default by admin, please change the password</p>

      <form action="/password" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Old Password" name="password">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="password1">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype New Password" name="password2">
        </div>
        <div class="row">
            <div class="col-6">
                <a href="/dashboard" class="btn btn-secondary btn-block">Ignore</button>
            </div>
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Change</button>
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