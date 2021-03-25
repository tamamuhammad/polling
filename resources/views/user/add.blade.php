@extends('layout.main')

@section('title', 'Add New User')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="row">
      <form action="/signin" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="input-group mb-3">
          <select name="division" id="division">
              @foreach($divisions as $division)
              <option value="{{ $division->id }}">{{ $division->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="row">
            <div class="col-8">
                <a href="/users" class="btn btn-secondary btn-block">Back</button>
            </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Add</button>
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