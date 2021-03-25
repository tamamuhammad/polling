@extends('layout.main')

@section('title', 'Management Users')

@section('container')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Management Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Management Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="row">
            <a href="/signin" class="btn btn-info">Add New Users</a>
            <div class="col-10">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Division</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->role }}</td>
                      <td>{{ $user->division_id }}</td>
                      <td>
                          <a href="/users/{{ $user->id }}" class="badge badge-success">Edit</a>
                          <form action="/users/{{ $user->id }}" method="post">
                            @csrf @method('delete')
                                <button class="badge badge-danger">Delete</button>
                            </form>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection