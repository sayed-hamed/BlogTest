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
                            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModalScrollable">
                                New Comment
                            </button>
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
                                        <a class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#edit{{$comment->id}}"><i class="fa fa-edit" style="color: #ffffff"></i></a>
                                        <a class="btn btn-danger d-inline-block" data-toggle="modal" data-target="#delete{{$comment->id}}"><i class="fa fa-trash" style="color: #ffffff"></i></a>

                                    </td>
                                </tr>





                                <div class="modal fade" id="edit{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">New Comment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.comments.update','test')}}" >
                                                    @csrf
                                                    {{@method_field('patch')}}

                                                    <input type="hidden" name="id" value="{{$comment->id}}">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="text" value="{{$comment->title}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Message</label>
                                                        <input type="text" value="{{$comment->body}}" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Author">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="inputName" class="control-label">Post</label>
                                                        <select name="post_id" class="form-control" id="exampleFormControlSelect2">
                                                            <option selected  value="{{$comment->post->id}}">{{$comment->post->title}}</option>

                                                            @foreach($posts as $post)
                                                                <option value="{{$post->id}}">{{$post->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
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
                                                <form method="post" action="{{route('admin.comments.destroy','test')}}">
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.comments.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Message</label>
                            <input type="text" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Message">
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="control-label">Post</label>
                            <select name="post_id" class="form-control" id="exampleFormControlSelect2">
                                <option selected  disabled>Chooose Post</option>

                            @foreach($posts as $post)
                                    <option value="{{$post->id}}">{{$post->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('js')

    @toastr_js
    @toastr_render
@endsection
