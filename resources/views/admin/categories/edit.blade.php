@extends('admin.layout')

@section('title')
    Edit category
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    {{ Form::open(['route' => ['admin.categories.update', $category->id]]) }}
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            @method('PUT')
                            {{ Form::text('title', old('title', $category->title), ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection