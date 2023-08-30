<?php
require "../../vendor/autoload.php";
use App\Controllers\CrudController;

$crudController = new CrudController();
$crudController->handleRequest();
$records = $crudController->getRecords();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="my-5 text-center">Welcome to CRUD Operation</h1>
    <button class="btn btn-success mb-4">
        <a class="text-decoration-none text-white" href="../../public">Go to Home</a>
    </button>
    <!--  User Input  -->
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" autocomplete="off" required/>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required/>
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile Number"
                   autocomplete="off" required/>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password"
                   autocomplete="off" required/>
        </div>
        <button type="submit" class="btn btn-primary" name="create">Submit</button>
    </form>
</div>
</body>
</html>