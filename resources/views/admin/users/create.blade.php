@extends('admin.layout')

@section('title')
    Create user
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    {{ Form::open(['route' => 'admin.users.store', 'files' => true]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('avatar', 'Avatar') }}
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                              </div>
                              <!-- <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div> -->
                            </div>
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