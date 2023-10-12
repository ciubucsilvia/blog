@extends('admin.layout')

@section('title')
    Categories
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
    <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Create</a>
        <div class="row">

            <div class="col-12">
              <div class="card">
                {{-- <div class="card-header">
                <div class="card-title">
                    Show 
                    <select name="entries">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                        entries
                    
                </div>
                
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}">
                                        {{ $category->title }}
                                    </a>
                                </td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                {{ Form::open(['route' => ['admin.categories.destroy', $category->id]]) }} 
                                    @method('DELETE')
                                    <button type="submit" class="ion-icon">
                                        <ion-icon name="trash-outline"></ion-icon>
                                {{ Form::close() }}
                                
                                </td>
                            </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer clearfix">
                    {{ $categories->links() }}
                  </div>
                  
              </div>
              <!-- /.card -->
            </div>
          </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection