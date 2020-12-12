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
    <div class="col-lg-12" style="background-image: url('/storage/Image/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; padding-bottom: 500px; padding-top: 50px; margin-top: 20px">
        <div class="col-md-12">
            <form action="" method="post" style="text-align: center; background-color: white; padding-top: 20px; padding-bottom: 50px">
                {{csrf_field()}}
                <h5 style="text-align: center; margin-top: 10px;">Login</h5>
                <hr>
                <div class="container" style="margin-top: 30px">
                    <div style="display: flex">
                        <label for="uname" style="margin-top: 5px"><b>E-Mail Address</b></label>
                        <input type="text" class="form-control" placeholder="Enter E-Mail Address" name="email" required style="width: 800px; margin-left: 20px">
                    </div>
                    <div style="display: flex">
                        <label for="psw" style="margin-top: 15px"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required style="width: 800px; margin-top: 10px; margin-left: 62px">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" style="width: 150px; height: 40px; margin-top: 10px">Login</button>
                    </div>
                    <div>
                        <label>
                          <input type="checkbox" name="remember_me" value="1"> Remember Me
                        </label>
                    </div>
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{$message}}</strong>
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul> 
                        </div>
                    @endif
                  </div>
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
    }

    a:hover{
        text-decoration: none;
        color: black;
    }

    .text{
        width: 800px;
    }
    
</style>