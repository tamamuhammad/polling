@extends('layout.main')

@section('title', 'Result a Poll')

@section('container')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Result a Poll</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Result a Poll</li>
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
                            @foreach ($finals as $final)
                                @if ($final == 0)
                                <p>Nothing to see here.</p>
                                @else 
                                <div class="result">
                                    <label for=""><?= $final['choice'] ?></label><input type="range" value="<?= $final['result'] ?>" min="0" max="100" disabled> <label for=""><?= $final['result'] ?>%</label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection