@extends('layouts.admin')
@section('header','Author')

@section('css')

@endsection

@section('content')
<div id="controller">
 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Author</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  	@foreach($authors as $key => $author)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $author->name }}</td>
                      <td>{{ $author->email }}</td>
                      <td>{{ $author->phone_number }}</td>
                      <td>{{ $author->address }}</td>
                      <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div> -->
        </div>
   </div>
   <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="{{ url('authors') }}" autocomplete="off">
              <div class="modal-header">

                <h4 class="modal-title">Author</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
              @csrf

              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="" required="">                
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="" required="">                
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="" required="">                
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="" required="">                
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
</div>
    
@endsection

@section('js')
  <script type="text/javascript">
      var controller = new Vue({
        el: '#controller',
        data: {
          data : {},
          actionUrl : '{{ url('authors') }}'
        },
        mounted: function (){

        },
        method: {
          addData() {
            console.log('add data');
          },
          editData() {

          },
          deleteData() {

          }
        }
      });
  </script>
@endsection