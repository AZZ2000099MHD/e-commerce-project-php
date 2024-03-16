<?php session_start();?>

<?php include('../server/connection.php');   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Commerce</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assetes/css/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <!--favicons-->
     
  </head>


        <body>
<style>
    .bd-placeholder-img{
        font-size:1.125rem;
        text-anchor:middle;
        -webkit-user-select:none;
        -moz-user-select:none;
        user-select:none;


    }
    @media(min-width;768px){
        .bd-placeholder-img-lg{
            font-size:3.5rem;
        }
    }
    </style>
    <link href="dashboard.css"l="stylesheet">

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" >Online store</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"> <span class ="navbar-toggler-icon"></span></button>

    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <!--to dont show in login page-->
        <?php if(isset($_SESSION['admin_loggeed_in'])){?>
        <a class="nav-link px-3" href="logout.php?logout=1">Sign out</a>
        <?php } ?>
</div>
</div>
</header>
