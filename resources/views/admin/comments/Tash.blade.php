@extends('admin.layouts.master')
@section('css')

    @toastr_css

@section('title')
    Comments
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Comments</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">Dashboard</a></li>
                    <li class="breadcrumb-item active">Comments</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @include('admin.errors')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <!-- Button trigger modal -->

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Post</th>
                                <th>Process</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; ?>
                            @foreach($comments as $comment)
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td>{{$comment->title}}</td>
                                    <td>{{$comment->body}}</td>
                                    <td>{{$comment->post->title}}</td>
                                    <td>
                                        <a class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#restore{{$comment->id}}"><i class="fa fa-backward" style="color: #ffffff"></i></a>
                                        <a class="btn btn-danger d-inline-block" data-toggle="modal" data-target="#delete{{$comment->id}}"><i class="fa fa-trash" style="color: #ffffff"></i></a>

                                    </td>
                                </tr>


                                <div class="modal fade" id="restore{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Retore Comment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.trashBack','test')}}">
                                                    @csrf
                                                    {{@method_field('POST')}}

                                                    Do You Want to retore it

                                                    <input type="hidden" name="id" value="{{$comment->id}}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Restore</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>










                                <div class="modal fade" id="delete{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Delete Comment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.deleteTrash','test')}}">
                                                    @csrf
                                                    {{@method_field('Delete')}}

                                                    are you sure

                                                    <input type="hidden" name="id" value="{{$comment->id}}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->



@endsection
@section('js')

    @toastr_js
    @toastr_render
@endsection
