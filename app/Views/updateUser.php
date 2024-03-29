<?php
	require "../../vendor/autoload.php";
    use App\Controllers\CrudController;

	$crudController = new CrudController();
	$crudController->handleRequest();
	
	if(isset($_GET['update_id']))
	{
		$id = $_GET['update_id'];
		$record = $crudController->getRecord($id)[0];
	}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Update User</title>
</head>
<body class="container">
<div class="text-center my-5">
	<h1 class="pb-2 text-uppercase">Update User Info</h1>
	<button class="btn btn-success mb-4">
		<a class="text-decoration-none text-white" href="../../public/">Home Page</a>
	</button>
</div>
<form method="post">
    <input type="hidden" name="record_id" value="<?= $record['id'] ?>">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?= $record['name'] ?>" class="form-control" placeholder="Enter your name" autocomplete="off" required/>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= $record['email'] ?>" class="form-control" placeholder="Enter your email" autocomplete="off" required/>
    </div>
    <div class="mb-3">
        <label>Mobile</label>
        <input type="text" name="mobile" value="<?= $record['mobile'] ?>" class="form-control" placeholder="Enter your Mobile Number"
               autocomplete="off" required/>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="text" name="password" value="<?= $record['password'] ?>" class="form-control" placeholder="Enter your password" autocomplete="off" required/>
    </div>
    <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>
</body>
</html>
