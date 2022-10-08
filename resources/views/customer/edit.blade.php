@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Customer
        <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>

        </h6>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form method="post" enctype="multipart/form-data" action="{{url('admin/customer/'.$data->id)}}">
                @csrf
                @method('put')
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>
                            <input name="full_name" placeholder="Full name" value="{{$data->full_name}}" type="text" class="form-control">
                            @error('full_name')
                               <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </td>
                    </tr>
                <tr>
                    <th>Email</th>
                    <td><input name="email" placeholder="email" value="{{$data->email}}" type="email" class="form-control">
                        @error('email')
                    <p class="text-danger">{{$message}}</p> 
                 @enderror</td>
                
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input name="password" placeholder="Password" type="password" class="form-control">
                        @error('password')
                        <p class="text-danger">{{$message}}</p> 
                     @enderror</td>
                  
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><input name="mobile" placeholder="mobile" value="{{$data->mobile}}" type="mobile" class="form-control">
                        @error('mobile')
                    <p class="text-danger">{{$message}}</p> 
                 @enderror</td>
                
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <input name="image" type="file" class="form-control">
                        <input name="image_prev" type="hidden" class="form-control" value="{{$data->image}}">   
                        <img width="100px" src="{{asset($data->image)}}" alt="">
                        @error('image')
                        <p class="text-danger">{{$message}}</p> 
                     @enderror</td>
                    
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" placeholder="Address" type="address" class="form-control">{{$data->address}}</textarea> @error('address')
                        <p class="text-danger">{{$message}}</p> 
                     @enderror  
                     </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn btn-primary"></td>
                </tr>
           </table>
           </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@section('script')

<!-- Custom styles for this page -->
  <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

 

 <!-- Page level plugins -->
 <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
@endsection