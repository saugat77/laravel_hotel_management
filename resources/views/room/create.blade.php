@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Room
        <a href="{{url('admin/room')}}" class="float-right btn btn-success btn-sm">View All</a>

        </h6>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form method="post" action="{{url('admin/room')}}">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>RoomTypes</th>
                        <td>
                            <select class="form-control" name="rt_id">
                                <option value="0"  >--- select ---</option>
                                @foreach ($roomtypes as $rt )
                                  <option value="">{{$rt->title}}</option> 
                                @endforeach
                            </select>
                        </td>
                    </tr>
                <tr>
                    <th>Title</th>
                    <td><input name="title" type="text" class="form-control"></td>
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