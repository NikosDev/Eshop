<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> My Shop </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/shop/public/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    </head>
    <style>
        .full {
            background: url('https://i.ytimg.com/vi/lt0WQ8JzLz4/maxresdefault.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            height:100%;
        }
        #trick{
            height: 100vh!important;
            overflow: auto!important;
            color:white;
        }
    </style>
    <body>
    <div class="container-fluid full">
    <div class="col-sm-12 d-flex justify-content-center animated fadeInUpBig py-5" id="trick">
  
      <form method="POST" action="admin">
        {{ csrf_field() }}
  
        <div class="form-group">
  
          <label for="name">Username:</label>
  
          <input type="text" class="form-control" id="name" name="name" required>
  
        </div>
  
        <div class="form-group">
  
          <label for="password">Password:</label>
  
          <input type="password" class="form-control" id="password" name="password" required>
  
        </div>
  
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
  
      </form>
    </div>
      </div>
    </body>
</html>