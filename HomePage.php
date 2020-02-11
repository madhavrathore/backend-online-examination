<!DOCTYPE html>
<html>
<title>Home</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="HomePage.css">


</head>

<body style="background-image: url('https://images4.alphacoders.com/191/191228.jpg');background-size: 100%;background-repeat: no-repeat; background-attachment: fixed; height: 100%; width: 100%;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top col-lg-12">
  <a class="navbar-brand" href="HomePage.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav>


<div class="wrapper">
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3><?php $name=""; $conn=new mysqli("localhost","root","");mysqli_select_db($conn,"PlantStore"); $value="SELECT * FROM CUSTOMER where id=57"; $result=$conn->query($value);if($result->num_rows > 0){while ($row = $result->fetch_assoc()){$name=$row['c_name'];}}echo "$name";?></h3>
      </div>
      
      
      <ul class="list-unstyled components">
        <p class="text-light">Online Plant Store</p>
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-success">Catagories</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="#">Medicinal</a>
            </li>
            <li>
              <a href="#">Showcase</a>
            </li>
            <li>
              <a href="#">Fertilizers</a>
            </li>
          </ul> 
        </li>
        
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">Services</a>
        </li>
        <li>
          <a href="#">Contact Us</a>
        </li>
      </ul>
      
      <ul class="list-unstyled CTAs">
        <li>
          <a href="Login.php" class="download">Sign In</a>
        </li>
        <li>
          <a href="Register.php" class="article">Register</a>
        </li>
      </ul>
    </nav>
    
  <div class="main">
         
  <div class="container-fluid">
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/Lavender.jpg" alt="Los Angeles">
        </div>
        <div class="carousel-item">
          <img src="img/img.jpg" alt="Chicago">
        </div>
        <div class="carousel-item">
          <img src="img/Lavender.jpg" alt="New York">
        </div>
      </div>

      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
    </div>
    <section class="my-3">
      <div class="py-5">
        <h2 class="text-center text-light">Products</h2>
      </div>
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="getImage.php?id=3" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php $pname=""; $conn=new mysqli("localhost","root","");mysqli_select_db($conn,"PlantStore"); $value="SELECT * FROM PLANTINFO where id=3"; $result=$conn->query($value);if($result->num_rows > 0){while ($row = $result->fetch_assoc()){$pname=$row['p_name'];}}echo "$pname";?></h5>
                <p class="card-text"><?php $pinfo=""; $conn=new mysqli("localhost","root","");mysqli_select_db($conn,"PlantStore"); $value="SELECT * FROM PLANTINFO where id=3"; $result=$conn->query($value);if($result->num_rows > 0){while ($row = $result->fetch_assoc()){$pinfo=$row['p_info'];}}echo "$pinfo";?></p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
        </div><br><br>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="card" style="width: 15rem;">
              <img src="img/naruto.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                  <div class="col-lg-4">
                    <a href="#" class="btn btn-primary btn-sm">Buy</a>
                  </div>
                  <div class="col-lg-8">
                    <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                  </div>
                </div>
              </div>
            </div>   
          </div>
        </div>
      </div>
    </section>  
  </div>
</div>
</body>
</html>
