@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rooms
            <a href="{{url('admin/room/create')}}" class="float-right btn btn-success btn-sm">Add new</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if (Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if ($data)
                        @foreach ($data as $d )    
                    <tr>
                    <td>{{$d->id}} </td>
                    <td>{{$d->title}} </td>
                        <td>
                        <a href="{{url('admin/room/'.$d->id)}} " class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> </a> 
                        <a href="{{url('admin/room/'.$d->id.'/edit')}} " class="btn btn-primary btn-sm"  ><i class="fa fa-edit"></i> </a>
                        <a onclick="return confirm('Are u sure u want to delete?')" href="{{url('admin/room/'.$d->id.'/delete')}} " class="btn btn-primary btn-sm" ><i class="fa fa-trash"></i> </a> 
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                @endif
            </table>
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