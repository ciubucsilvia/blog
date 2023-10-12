@extends('admin.layout')

@section('title')
    Create tag
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    {{ Form::open(['route' => 'admin.tags.store']) }}
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection