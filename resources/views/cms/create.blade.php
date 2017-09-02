<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> My Shop </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="/shop/public/css/style2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    </head>
    <script src="https://use.fontawesome.com/24b6222c9f.js"></script>
    <body>
    
    <nav class="navbar navbar-toggleable-sm navbar-inverse sticky-top">
        <nav class="container">
            <div class="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">NikosCMS</a>
            </div>

            
        </nav>
    </nav>
     
    
    <div class="jumbotron jumbotron-fluid bg-inverse text-white">
        <div class="container ">
            <div class="row">
                <div class="col-lg-10">
                    <ul class="list-inline">
                        <li class="list-inline-item"> <h3><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Manage</h3> </li>
                        <li class="list-inline-item"> <p class="lead"> Product Pages!!! </p> </li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle"
                                type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                          Exit Mode
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
    </div>
      
    <div class="container">
        <div class="row">
            <div class="col-md-3" >
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item main-color ">  <a class="card-link text-white" href="#"> <i class="fa fa-cog" aria-hidden="true"></i> &nbsp;Dashboard</a> </li>
                        <li class="list-group-item list-group-item-action "> <a class="card-link" href="#"> <i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; Products </a> </li>
                        
                        
                    </ul>
                </div>
                <div class="card my-3">
                    <div class="card-block">
                        <h5> Disk Space Used </h5>
                        <div class="progress my-3">
                            <div class="progress-bar" role="progressbar" style="width: 41%" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>40%
                        </div>
                        <h5>Bandwith Used </h5>
                        <div class="progress my-3">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>60%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card" id="keno">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item main-color text-white">Add Product</li>
                        <!--Collapse modal -->
                        <li class="list-group-item  ">
                          <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                              <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Add Product!!
                                  </a>
                                </h5>
                              </div>
                          
                              <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-block">
                                    <form method='post' action="{{url('/cms/add')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                          <label for="title2">Title</label>
                                          <input type="text" class="form-control" name="title2" id="title2" placeholder="Type Your Tittle" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="price2">Price</label>
                                          <input type="text" class="form-control" name="price2" id="price2" placeholder="Enter Price" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="description2">Description</label>
                                          <input type="text" class="form-control" name="description2" id="description2" placeholder="Type Description" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="image2">ImagePath</label>
                                          <input type="text" class="form-control" name="imagepath2" id="imagepath2" placeholder="Insert Image Path" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <table class="table table-hover ">
                            <thead>
                              <tr>
                                <th>Title</th>
                                <th>Published</th>
                                <th>Updated</th>
                                <th>Modify</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                <td>{{$product->title }}</td>                              
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td>{{$product->updated_at }}</td>
                                <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$product->id}}">
                                  EDIT
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form method='post' action="{{url('/cms/update/'.$product->id)}}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                              <label for="title">Title</label>
                                              <input type="text" class="form-control" name="title" id="title" placeholder="Type your title" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="price">Price</label>
                                              <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="description">Description</label>
                                              <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="image">ImagePath</label>
                                              <input type="text" class="form-control" name="imagepath" id="imagepath" placeholder="Insert Image Path" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                               
                                <a href="{{url('/cms/remove/'.$product->id)}}">DELETE</a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
      
    <!-- Footer --> 
    <nav class="navbar sticky-bottom navbar-light bg-inverse text-white text-center" >
        <p id="footer-space"> -Bootstrap4 CMS- </p>
    </nav>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      
    </body>
</html>