<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReadandWArite</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
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
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="margin-left: 80px; color: black; background-color: white">Admin</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/home/logout">Logout</a>
                </div>
            </div>
            @endif
            @if($auth && \Illuminate\Support\Facades\Auth::user()->user_role == 'member')
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="margin-left: 80px; color: black; background-color: white">Member</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/home/logout">Logout</a>
                </div>
            </div>
            <a href="{{'/cart/'}}">
                <button class="btn btn-primary" style="margin-left: 10px; margin-bottom: 5px">
                    Cart
                </button>
            </a>
            <a href="{{'/history/'}}">
                <button class="btn btn-primary" style="margin-left: 10px; margin-bottom: 5px">
                    History
                </button>
            </a>
            @endif
            @if(!$auth)
            <a href="{{'/login/'}}">
                <button class="btn btn-light" style="margin-left: 150px">
                    LOGIN
                </button>
            </a>
            <a href="{{'/register/'}}">
                <button class="btn btn-light" style="margin-bottom: 5px">
                    REGISTER
                </button>
            </a>
            @endif
        </div>
        <div class="col-lg-12" style="background-image: url('/storage/Image/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; padding-bottom: 500px; padding-top: 30px; margin-top: 20px;">
            @if (count($productList) == 0)
            <center>
                <h3>There is no product match with the keyword.</h3>
            </center>
            @else
            @if($auth && \Illuminate\Support\Facades\Auth::user()->user_role == 'admin')
            <div class="adminButton">
                <a href="{{'/addProduct/'}}">
                    <button class="btn btn-primary">
                        Add New Stationary
                    </button>
                </a>
                <a href="{{'/addStationaryType/'}}">
                    <button class="btn btn-primary">
                        Add New Stationary Type
                    </button>
                </a>
                <a href="{{'/editStationaryType/'}}">
                    <button class="btn btn-primary">
                        Edit Stationary Type
                    </button>
                </a>
            </div>
            @endif
            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="col-md-12" style="display: flex">
                @foreach ($productList as $product)
                <div class="col-md-2" style="background-color: white; margin-left: 10px">
                    <a href="{{'/viewProduct/'.$product->id}}">
                        <img style="width: 200px; height: 200px" src="{{url('storage/'.$product->image)}}">
                    </a>
                    <hr>
                    <h5 style="color: blue">{{$product->name}}</h5>
                    <p>{{$product->description}}</p>
                </div>
                @endforeach
            </div>
            <div class="paginateStyle">
                {{$productList->links()}}
            </div>
            @endif
        </div>
</body>

</html>

<style>
    .title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        margin-left: 150px;
        text-decoration: none;
        color: black;
        margin-top: 5px;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    .text {
        width: 800px;
    }

    .paginateStyle {
        margin-left: 25px;
        margin-top: 10px;
    }

    .adminButton {
        margin-bottom: 10px;
        margin-left: 25px;
        padding-bottom: 10px;
    }

</style>
