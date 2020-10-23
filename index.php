<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>
<body>
<header>
  <div class="wrap">
    <div class="search">
    <input type="text" class="searchterm" name="" placeholder="What are you looking for?">
    <button type="submit" class="searchbtn">
    <i class="fa fa-search" aria-hidden="true"></i>
    </button> 
    </div>
  </div>
<div class="main">
  <ul>
    <li><a href="">This is my web site</a></li>
    <li><a href="home.html">Home</a></li>
    <li><a href="">Services</a></li>
    <li><a href="">About</a></li>
    <li><a href="">Contact</a></li>
  </ul>
</div>
<div class="title">
    <h1>This is my web site for cars :)</h1>

</div>

<div class="container-fluid">
      <div class="row">
          <div class="col-8 offset-2">
          <h3 class="display-4">Search cars</h3>
                <form action="carInfo.php" method="get">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="<?php
                        if(isset($_GET['error'])){
                            echo "No match found. Try again";
                        }else{
                            echo "Search";
                        }?>">
                        <div class="input-group-append">
                            <button class="buttonn" type="submit" name="subBtn" class="btn btn.info">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br><br>
        <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <?php foreach($db as $car): ?>
                    <div class="col-3">
                        <a href="carInfo.php?id=<?php echo $car ['id']; ?>">
                        <div class="card text-center">
                            <div class="card-header"><?php echo $car['brend']; ?></div>
                            <div class="car-body"><?php echo $car['name']; ?></div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm"><?php echo $car['price']."$"; ?></button>
                                <button class="btn btn-<?php if ($car['used']) {
                                    echo "warning";
                                }else{
                                    echo "success";
                                } ?> btn-sm"><?php if($car['used']){
                                    echo "Used";
                                }else{
                                    echo "New";
                                } 
                                
                                ?></button>
                            </div>
                        </div>
                    </div>
                        </a>
                     
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    
</header>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>