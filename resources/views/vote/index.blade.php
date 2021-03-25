@extends('layout.main')

@section('title', 'My Polls')

@section('container')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Poll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Poll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="row">
            <div class="card">
                @foreach($polls as $poll)
                <div class="col-4">
                    <div class="card-header">
                        <h3 class="card-title">{{$poll->title}}</h3><br>
                        <small class="text-muted">{{ $poll->deadline }} - {{$poll->created_by}}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-description">{{ $poll->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/vote/{{ $poll->id }}" class="btn btn-primary">VOTE</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection