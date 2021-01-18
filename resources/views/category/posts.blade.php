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
    li{

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
</body>
</html>