@extends('admin.layout')

@section('title')
    Users
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
    <a class="btn btn-success" href="{{ route('admin.users.create') }}">Create</a>
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
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Avatar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td><img src="{{ $user->getAvatar() }}" width="150"></td>
                                <td>
                                {{ Form::open(['route' => ['admin.users.destroy', $user->id]]) }} 
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
                    {{ $users->links() }}
                  </div>
                  
              </div>
              <!-- /.card -->
            </div>
          </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection