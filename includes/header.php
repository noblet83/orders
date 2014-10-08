
<?php include '../config/config.php' ?>
<?php include '../libraries/Database.php' ?>
<?php include '../helpers/format_helper.php' ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/stickyfooter.css">
    <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
  </head>
<body>
<header class="navbar navbar-default navbar-static-top" role="banner">

      <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

            <!-- Need to fix this with document root -->
            </button> <a href="/inventory/main/index.php" class="navbar-brand">Home</a>

        </div>
        <nav class="collapse navbar-collapse pull-right" role="navigation">
            <ul class="nav navbar-nav">
                <li> <a href="#" class="">Recent Orders</a> 
                </li>
                <li> <a href="#" class="">Orders By Date</a>
                </li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
          </ul>
        </nav>
    </div>
</header>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 aria-live="assertive" class="text-center">
      <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
      <?php endif; ?>
      </h1>
    </div>
  </div>
</div>
<div class="container">
  
  <div class="col-md-12">