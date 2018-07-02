@extends('layouts.master')

@section('style')
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Add Book</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if(count($errors))
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif
        @if(\Illuminate\Support\Facades\Session::has('fail'))
            <div class="alert alert-danger alert-dismissible">
                <span>{{ \Illuminate\Support\Facades\Session::get('fail') }}</span>
            </div>
        @endif
        <form class="form-horizontal" method="post" action="{{route('storeBook')}}" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>

                    <div class="col-sm-10">
                        <input type="text" name="category" class="form-control" id="inputEmail3" placeholder="Category">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rental price</label>

                    <div class="col-sm-10">
                        <input type="number" step="1" pattern="\d+" class="form-control" id="inputEmail3" name="rental_price" placeholder="Rental price">
                    </div>
                </div>

                <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium"
                                 data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"></span>
                            </div>
                                        <span class="input-group-addon btn default btn-file">
                                        <span class="fileinput-new"> Select images </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="products_images[]" multiple> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists"
                               data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Author</label>

                    <div class="col-sm-10">
                        <input type="text" name="author"  class="form-control" id="inputEmail3" placeholder="Author">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Publisher</label>

                    <div class="col-sm-10">
                        <input type="text" name="publisher"  class="form-control" id="inputEmail3" placeholder="Publisher">
                    </div>
                </div>

                {{csrf_field()}}
                        <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Create Book</button>
                </div>
                <!-- /.box-footer -->
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection