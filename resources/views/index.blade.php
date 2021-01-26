@extends('layout.master')
@push('title')
    List Posts
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route("posts.create")}}">Create New Post</a>
                <br>
                <form action="">
                    <label for="">Tag</label>
                    <select class="js-example-basic-single" multiple="multiple" name="tag_ids[]">
                        @foreach($tags as $tag)
                            <option
                                value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="" id="">
                            <option value="">Select Category</option>
                            @foreach($cats as $cat)
                                <option
                                    value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" value="{{request()->key}}" placeholder="Enter your key " name="key" id="">
                    <button class="btn btn-primary" type="submit">Search..</button>
                </form>
                <table class="table table-dark" style="margin-top: 30px">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiltle</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td scope="row">{{ $post->id }}</td>
                            <td>{{ $post->title}}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                @if($post->category)
                                    {{ $post->category->name }}
                                @endif
                            </td>
                            <td>
                                @if($post->tags()->count())
                                    <ul>
                                        @foreach($post->tags as $tag)
                                            <li>{{$tag->name}}</li>
                                        @endforeach
                                    </ul>

                                @endif

                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <button class="btn " type="button"><a
                                        href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                </button>
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
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
