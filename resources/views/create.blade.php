<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="/posts" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" aria-describedby="emailHelp"
                           placeholder="Enter Tiltle">

                </div>
                <div class="form-group">
                    <label for="">Descreption</label>
                    <input type="text" name="description" class="form-control" id="" placeholder="Enter descreption ">
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" id="">
                        <option value="">Select Category</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tag</label><br>
                    <select multiple name="tag_id[]">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Content</label><br>
                    <textarea name="content" id="" cols="80" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>
