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
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 80px; color: black; background-color: white">Member</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/home/logout">Logout</a>
            </div>
        </div>
        <button class="btn btn-primary" style="margin-left: 10px; margin-bottom: 5px">
            Cart
        </button>
        <button class="btn btn-primary" style="margin-left: 10px; margin-bottom: 5px">
            History
        </button>
    </div>
    <div class="col-lg-12" style="background-image: url('/storage/Image/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; padding-bottom: 500px; padding-top: 30px; margin-top: 20px;">
        <div class="col-md-12" style="display: flex; margin-bottom: 5px">
            <div class="col-md-8" style="background-color: white; margin: auto; display: flex; padding-bottom: 50px">
                <div>
                    <img style="width: 200px; height: 200px" src="{{url('storage/'.$productDetail->image)}}">
                </div>
                <div class="detail">
                    <div>
                        <h6 style="">Stationary Name : {{$productDetail->name}}</h6>
                    </div>
                    <div>
                        <h6>Stationary Price : {{$productDetail->price}}</h6>
                    </div>
                    <div>
                        <h6>Quantity : {{$quantity}}</h6>
                    </div>
                    <div>
                        <h6>Stationary Type : {{$getStationaryType->name}}</h6>
                    </div>
                    <div>
                        <h6>Description : {{$productDetail->description}}</h6>
                    </div>
                    <form action="{{'/viewProduct/addtoCart/'.$productDetail->id}}" method="post">
                        {{csrf_field()}}
                    <input style="position: absolute; right: 145px; margin-top: 3px" type="number" name="quantity" placeholder="Input Quantity"/>
                    <button class="btn btn-dark" style="position: absolute; right: 30px;">Update Cart</button>
                    </form>
            </div>
        </div>
    </div>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul> 
    </div>
    @endif  
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

    .detail{
        margin-left: 50px;
        margin-top : 30px
    }
</style>