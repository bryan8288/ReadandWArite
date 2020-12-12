<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReadandWArite</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-sm-12" style="display: flex; text-align: center; margin-top: 10px;">
        <form action="{{'/home/'}}">
            <div style="display: flex">
                <h4 class="title">ReadAndWArite</h4>
                <input type="text" name="keyword" class="form-control" placeholder="Search for Stationary"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px">
                <input type="submit" class="btn btn-primary" value="Search" style="margin-left: 10px; margin-bottom: 5px">
            </div>
        </form>
    @if($auth && \Illuminate\Support\Facades\Auth::user()->user_role == 'admin')
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 80px; color: black; background-color: white">Admin</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/home/logout">Logout</a>
            </div>
    </div>
    @endif
    </div>
    <div class="col-lg-12" style="background-image: url('/storage/Image/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; padding-bottom: 500px; padding-top: 30px; margin-top: 20px;">
        <div class="col-md-8" style="margin: auto">
            <form action="{{url('editProduct/update/'.$productDetail->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('put')}}
                <input type="text" name="name" class="form-control" value="{{$productDetail->name}}" style="margin-bottom: 5px">
                <input type="text" name="description" class="form-control" value="{{$productDetail->description}}" style="margin-bottom: 5px">
                <input type="text" name="price" class="form-control" value="{{$productDetail->price}}" style="margin-bottom: 5px">
                <input type="number" name="stock" class="form-control" value="{{$productDetail->stock}}" style="margin-bottom: 5px">
                <button class="btn btn-primary" style="margin-top: 5px">
                    Update Stationary Data
                </button>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul> 
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>

<style>
    .title{
       font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
       margin-left: 150px;
       text-decoration: none;
       color: black;
       margin-top: 5px;
   }
</style>