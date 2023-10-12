@extends('admin.layout')

@section('title')
    Create post
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    {{ Form::open(['route' => 'admin.posts.store', 'files' => true]) }}
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                              </div>
                            </div>
                          </div>

                        <div class="form-group">
                            <div class="form-check">
                                {{ Form::checkbox('is_featured', old('is_featured')) }}
                                {{ Form::label('is_featured', 'Recommend')  }}
                              </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                {{ Form::checkbox('status', old('status')) }}
                                {{ Form::label('status', 'Draft (se publica sau nu)')  }}
                              </div>
                        </div>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="col-md-6">
              <div class="card-body">
                  <div class="form-group">
                    {{ Form::label('category', 'Category') }}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                </div>

                  <div class="form-group">
                      <label>Tags</label>
                      {{ Form::select('tags[]',
                                $tags,
                                old('tags'),
                                [
                                    'class' => 'select2',
                                    'multiple' => 'multiple',
                                    'style' => "width: 100%;",
                                    'data-placeholder' => "Select Tags"
                                    ]
                                )
                      }}
                  </div>

                <div class="form-group">
                  {{ Form::label('date', 'Date') }}
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date') }}"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

              </div>
            </div>
        </div>
      <!-- /.row -->
      <div class="row" >
        <div class="col-md-12">
          {{ Form::label('description', 'Description') }}
          <textarea class="textarea" name="description" placeholder="Place some text here" 
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
            {{ old('description') }}
          </textarea>
        </div>
      </div>

      <div class="row" >
        <div class="col-md-12">
          {{ Form::label('content', 'Content') }}
          <textarea class="textarea" name="content" placeholder="Place some text here" 
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
            {{ old('content') }}
          </textarea>
        </div>
      </div>

          {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
