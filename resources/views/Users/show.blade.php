@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of all users</h3>
        </div>
        <a href="{{route('getAddUser')}}"  class="btn btn-success" style="margin-left: 20px;">Add User</a>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                <tr>

                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a class="btn btn-info" href="{{ route('profile',['user_id'=>$user->id]) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('getUpdateUser' ,['user_id'=>$user->id] ) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('deleteUser' ,['user_id'=>$user->id] ) }}">Delete</a>

                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
            </div>
        </div>
@endsection

@section('javaScript')

    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <script>
        $(function () {
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : false,
                'ordering'    : true,
                'info'        : false,
                'autoWidth'   : true
            })
        })
    </script>
@endsection