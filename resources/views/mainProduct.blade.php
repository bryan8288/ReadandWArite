<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReadandWArite</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="col-sm-12" style="display: flex; text-align: center; margin-top: 10px;">
        <form action="{{'/home/'}}">
            <div style="display: flex">
                <h4 style="margin-top: 5px"><a class="title" href="{{'/'}}">ReadAndWArite</a></h4>
                <input type="text" name="keyword" class="form-control" placeholder="Search for Stationary"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px">
                <input type="submit" class="btn btn-primary" value="Search" style="margin-left: 10px; margin-bottom: 5px">
            </div>
        </form>
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
    </div>
    <div class="col-lg-12" style="background-image: url('/storage/Image/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; padding-bottom: 500px; padding-top: 50px; margin-top: 20px;">
    @if (count($productList) == 0)
        <center>
            <h3>There is no product match with the keyword.</h3>
        </center>
    @else
    <div class="col-md-12" style="display: flex">
        @foreach ($productList as $product)
            <div class="col-md-2" style="background-color: white; margin-left: 10px">
                <img style="width: 200px; height: 200px" src="{{url('storage/'.$product->image)}}">
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
    .title{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        margin-left: 150px;
        text-decoration: none;
        color: black;
    }

    a:hover{
        text-decoration: none;
        color: black;
    }

    .text{
        width: 800px;
    }

    .paginateStyle{
        margin-left: 25px;
        margin-top: 10px;
    }
    
</style>