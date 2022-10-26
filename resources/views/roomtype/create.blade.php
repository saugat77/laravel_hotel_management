@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Roomtype
        <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>

        </h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif
        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form method="post" enctype="multipart/form-data" action="{{url('admin/roomtype')}}">
                @csrf
                <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <td><input name="title" type="text" class="form-control col-md-4"></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input name="price" type="text" class="form-control col-md-4"></td>
                </tr>
                <tr>
                    <th>Details</th>
                    <td><textarea name="detail" class="form-control col-md-4"></textarea></td>
                </tr>
                <tr>
                    <th>Gallery</th>
                    <td><input name="imgs[]" multiple type="file" class="form-control col-md-4"></td>
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
