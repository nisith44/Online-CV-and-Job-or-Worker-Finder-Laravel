<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2c7fbec831.js"></script>
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/material-sharp/24/000000/parse-from-clipboard.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Online CV - @yield('title')</title>
</head>
<body>

    <!-- nav bar -->
    <div class="container-fluid " style="padding: 0px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="#"><i class="far fa-address-card fa-lg"></i>  MYCV.OKKOMAMEKE.COM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse " id="navbarSupportedContent" style="">
            <form action="/navbar-search" method="post" class="form-inline my-2 my-lg-0 mx-auto">
            {{csrf_field()}}
                <input class="form-control mr-sm-2" style="width:400px;" type="search" placeholder="Search People By Skill" name="key" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" name="submit" type="submit">Search</button>
              </form>            
              <ul class="navbar-nav ml-auto " style="">
              <li class="nav-item active">
                  <a class="nav-link" href="/home">MY PROFILE</a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link active" href="/edit-profile" tabindex="-1" aria-disabled="true">EDIT PROFILE</a>
                </li>
                                
                @if(Auth::check()) 
                <li class="nav-item active">
                  <a class="nav-link" href="/logout">LOGOUT <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active"> 
                <button type="button" style="padding-top:0px;padding-bottom:0px;margin-top:7px;" class="btn btn-outline-light align-middle">{{Auth::user()->name}}</button>
                </li>
                @else 
                <li class="nav-item active">
                  <a class="nav-link" href="/login">LOGIN <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/register">REGISTER <span class="sr-only">(current)</span></a>
                </li>
                @endif
                
                
                
              </ul>

            </div>
          </nav>
    </div>
    <!-- nav bar end -->

<br>

@yield('content')



<footer class="footer bg-dark ">
      <div class="container p-3">
        <p class="text-white">Site Design By <a class="text-white" href="https://www.facebook.com/nisithheshanbro">Nisith heshan</a> </p>
      </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>