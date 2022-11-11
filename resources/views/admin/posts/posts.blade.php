@extends('admin.layouts.master')
@section('css')

    @toastr_css

@section('title')
    Posts
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Posts</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
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
                               New Post
                            </button>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>author</th>
                                <th>Date</th>
                                <th>Process</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; ?>
                            @foreach($posts as $post)
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td><img src="{{asset('uploads/posts/'.$post->image)}}" style="width: 100px" alt="" class="img-thumbnail"></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->author}}</td>
                                    <td>{{$post->date}}</td>
                                    <td>
                                        <a class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#edit{{$post->id}}"><i class="fa fa-edit" style="color: #ffffff"></i></a>
                                        <a class="btn btn-danger d-inline-block" data-toggle="modal" data-target="#delete{{$post->id}}"><i class="fa fa-trash" style="color: #ffffff"></i></a>

                                    </td>
                                </tr>





                                <div class="modal fade" id="edit{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">New Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.posts.update','test')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    {{@method_field('patch')}}

                                                    <input type="hidden" name="id" value="{{$post->id}}">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="text" value="{{$post->title}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Author</label>
                                                        <input type="text" value="{{$post->author}}" name="author" class="form-control" id="exampleInputPassword1" placeholder="Author">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">image</label>
                                                        <img src="{{asset('uploads/posts/'.$post->image)}}" style="width: 100px" class="img-thumbnail">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Image</label>
                                                        <input type="file"  name="img" class="form-control" id="exampleInputPassword1" placeholder="Post Image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Description</label>
                                                        <input type="text" value="{{$post->date}}" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Date">
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

                                <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Delete Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.posts.destroy','test')}}">
                                                    @csrf
                                                    {{@method_field('Delete')}}

                                                   are you sure

                                                    <input type="hidden" name="id" value="{{$post->id}}">
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
                    <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Author</label>
                            <input type="text" name="author" class="form-control" id="exampleInputPassword1" placeholder="Author">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" name="img" class="form-control" id="exampleInputPassword1" placeholder="Post Image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Date">
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
