@extends('layout.master')
@section('content')

    <div class="container">
        <h1>Edit Post</h1>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('posts.update',$post->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input value="{{old('title',$post->title)}}" type="text" name="title" class="form-control"
                               aria-describedby="emailHelp" placeholder="Enter Tiltle">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Descreption</label><br>
                        <input value="{{old('description',$post->description)}}" type="text" name="description"
                               class="form-control"
                               placeholder="Enter descreption">
                    </div>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror


                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" id="">
                            <option value="">Select Category</option>
                            @foreach($cats as $cat)
                                <option
                                    @if(old('category_id',$post->category_id)==$cat->id) {{'selected'}}@endif
                                    value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="" cols="90" rows="10">
                        {{old('content',$post->content)}}
                    </textarea>
                        @error('content')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    @php
                        $tagIds = $post->tags->pluck('id')->toArray();
                         $tagIds=old('tag_id',$tagIds)
                    @endphp
                    <div class="form-group">
                        <label for="">Tag</label><br>
                        <select class="js-example-basic-single" multiple="multiple" name="tag_id[]">
                            @foreach($tags as $tag)
                                <option
                                    {{in_array($tag->id,$tagIds) ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
    </body>
@endsection
