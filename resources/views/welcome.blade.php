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
    <div class="col-sm-12" style="text-align: right;">
        <a href="{{'/login/'}}">
            <button class="btn btn-light">
                LOGIN
            </button>
        </a>
        <a href="{{'/register/'}}">
            <button class="btn btn-light" style="margin-bottom: 5px">
                REGISTER
            </button>
        </a>
    </div>
    <div style="margin-top: 150px">
        <h1 class="title">ReadAndWArite</h1>
    </div>
    <form action="{{'/home/'}}">
        <div class="col-md-12" style="text-align: center; width: 500px; margin-left: 500px">
            <input type="text" name="keyword" class="form-control" placeholder="Search for Stationary">
            <input type="submit" class="btn btn-primary" value="Search" style="margin-bottom: 30px">
        </div>
    </form>
    <div class="col-md-12" style="display: flex; text-align: center; padding-left: 300px">
        @if(count($getBestSeller) > 3)
            @foreach($getBestSeller as $item)
            <a class="link" href="{{'/mainProduct/'.$item->id}}">
                <div>
                    <img class="picture" src="{{url('storage/'.$item->image)}}">
                    <h5 class="typeName">{{$item->name}}</h5>
                </div>
            </a>
        @endforeach
        @endif
        @if(count($getBestSeller) < 4)
            <a class="link" href="{{'/mainProduct/'.'1'}}">
                <div>
                    <img class="picture" src="/storage/Image/pencilMain.jpg">
                    <h5 class="typeName">pencil</h5>
                </div>
            </a>
            <a class="link" href="{{'/mainProduct/'.'2'}}">
                <div>
                    <img class="picture" src="/storage/Image/penMain.jpg">
                    <h5 class="typeName">pen</h5>
                </div>
            </a>
            <a class="link" href="{{'/mainProduct/'.'3'}}">
                <div>
                    <img class="picture" src="/storage/Image/notebookMain.jpg">
                    <h5 class="typeName">notebook</h5>
                </div>
            </a>
            <a class="link" href="{{'/mainProduct/'.'4'}}">
                <div>
                    <img class="picture" src="/storage/Image/dictionaryMain.jpg">
                    <h5 class="typeName">dictionary</h5>
                </div>
            </a>
        @endif
    </div>
</body>
</html>

<style>
    .title{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        text-align: center;
        margin-bottom: 30px;
    }

    .picture{
        width: 200px;
        height: 150px;
    }

    .typeName{
        font-family: Georgia, 'Times New Roman', Times, serif
    }

    .link{
        text-decoration: none;
        color: black;
    }

    a:hover{
        text-decoration: none;
        color: black;
    }
</style>