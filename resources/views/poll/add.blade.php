@extends('layout.main')

@section('title', 'Add New Poll')

@section('container')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Poll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Poll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Poll</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/add" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="text" class="form-control float-right" id="reservationtime" name="deadline">
                    </div>
                    <div class="form-group">
                      <label for="choice">Choice</label>
                      <input type="text" class="form-control" id="choice" placeholder="Choice" name="choice">
                    </div>
                    <div class="form-group">
                      <label for="choice2">Choice 2</label>
                      <input type="text" class="form-control" id="choice2" placeholder="Choice 2" name="choice2">
                    </div>
                    <div class="form-group">
                      <label for="choice3">Choice 3</label>
                      <input type="text" class="form-control" id="choice3" placeholder="Choice 3" name="choice3">
                    </div>
                    <div class="form-group">
                      <label for="choice4">Choice 4</label>
                      <input type="text" class="form-control" id="choice4" placeholder="Choice 4" name="choice4">
                    </div>
                    <div class="form-group">
                      <label for="choice5">Choice 5</label>
                      <input type="text" class="form-control" id="choice5" placeholder="Choice 5" name="choice5">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>
</section>
            <!-- /.card -->
</div>
@endsection