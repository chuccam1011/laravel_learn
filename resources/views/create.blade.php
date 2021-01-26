@extends('layout.master')
@section('content')
    <div class="container">
        <h1>Create Post</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="/posts" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control"
                               aria-describedby="emailHelp"
                               placeholder="Enter Tiltle">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">Descreption</label>
                        <input type="text" name="description" value="{{old('description')}}" class="form-control" id=""
                               placeholder="Enter descreption ">
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
                                    {{ old('category_id')== $cat->id ?'selected' :"" }} value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>


                    @php
                        $inputTags= old('tag_id',[]);
                    @endphp
                    <div class="form-group">
                        <label for="">Tag</label><br>
                        <select class="js-example-basic-single" multiple="multiple" name="tag_id[]">
                            @foreach($tags as $tag)
                                <option
                                    {{in_array($tag->id,$inputTags) ? 'selected':''  }} value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Content</label><br>
                        <textarea name="content" id="" cols="80" rows="10">{{old('content')}}</textarea>
                    </div>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
