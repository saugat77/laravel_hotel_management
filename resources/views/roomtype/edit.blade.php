@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Roomtype
        <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>

        </h6>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form method="post" action="{{url('admin/roomtype/'.$data->id)}}">
                @csrf
                @method('put')
                <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <td><input value="{{$data->title}}" name="title" type="text" class="form-control col-md-4"></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input value="{{$data->price}}" name="price" type="text" class="form-control col-md-4"></td>
                </tr>
                <tr>
                    <th>Details</th>
                    <td><textarea name="detail" class="form-control col-md-4">{{$data->detail}}</textarea> </td>
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
 <script src="{{asset('/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/demo/datatables-demo.js')}}"></script>
@endsection
@endsection
