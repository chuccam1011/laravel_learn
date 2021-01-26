@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("posts.create")}}">Create New Post</a>
                <br>
                <form action="">
                    <input type="text" value="{{request()->key}}" placeholder="Enter your key " name="key" id="">
                    <button type="submit">Search..</button>
                </form>
                <table class="table table-dark" style="margin-top: 30px">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiltle</th>
                        <th scope="col">Description</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title}}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <button type="button"><a href="{{ route('posts.edit',$post->id) }}">Edit</a></button>
                                ||
                                <form id="frm-delete" method="POST" action="{{route('posts.delete',$post->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button id="btn-delete" type="button" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->appends(request()->all()) }}

            </div>
        </div>
    </div>
    <style type="text/css">
        li {

            margin-left: 10px;
        }

    </style>
    <script>
        $(document).ready(function () {
            $('#btn-delete').click(function () {
                let isDelete = confirm("Do you want to delete ? ");
                if (isDelete) {
                    $(this).parent().submit();
                }
            })
        })
    </script>
@endsection
