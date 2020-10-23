<?php
require 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cars = array_filter($db,function ($el)
    {
        global $id;
        return $el ['id'] == $id;
    });

}elseif($_GET['search']){
    $search = $_GET['search'];
    $cars = array_filter($db, function ($el)
    {
        global $search;
        return $el ['brend'] == $search || $el ['name'] == $search || $el ['price'] == $search; 
    });

    if (count($cars) == 0) {
        header ("Location: index.php?error=1");
    }

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
    <a href="index.php" class="navbar-brand">Cars</a>
    
    </nav>

    <div class="jumbotron text-center">
        <h2>
            <?php foreach ($cars as $car): ?>
                <span><?php echo $car ['brend']; ?></span>
            <?php endforeach; ?>
        </h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <?php foreach ($cars as $car): ?>
                        <div class="col-6" style="outline:1px solid #ddd">
                            <h3 class="display4"><?php echo $car['name']; ?></h3>
                            <hr>
                            <p><?php echo $car ['info']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>