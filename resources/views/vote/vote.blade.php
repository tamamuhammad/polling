@extends('layout.main')

@section('title', 'Vote a Poll')

@section('container')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vote a Poll</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vote a Poll</li>
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
                            <h3 class="card-title">{{$poll->title}}</h3><br>
                            <small>{{ $poll->deadline }} - {{$poll->created_by}}</small>
                        </div>
                        <div class="card-body">
                            <p class="card-description">{{ $poll->description }}</p>
                        </div>
                        <div class="card-footer">
                            <form action="/vote" method="post">
                                @csrf 
                                <input type="hidden" name="poll_id" value="{{ $poll->id }}">
                                @foreach($choices as $choice)
                                <div class="form-group d-block">
                                    <input type="radio" name="choice" id="choice" class="form-check-input mr-2" value="{{ $choice->id }}"> <label for="">{{ $choice->choice }}</label>
                                </div>
                                @endforeach
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">VOTE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection