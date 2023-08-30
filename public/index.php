<?php
require "../vendor/autoload.php";
use App\Controllers\CrudController;

$crudController = new CrudController();
$crudController->handleRequest();
$records = $crudController->getRecords();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Users</title>
</head>
<body>
<div class="text-center my-5">
    <h1 class="py-2">Records of all users</h1>
    <button class="btn btn-primary">
        <a href="../app/Views/addUser.php" class="text-white text-decoration-none">Add Users +</a>
    </button>
</div>
<table class="table text-center">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($records as $record): ?>
        <tr>
            <td><?= $record['id'] ?></td>
            <td><?= $record['name'] ?></td>
            <td><?= $record['email'] ?></td>
            <td><?= $record['mobile'] ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="record_id" value="<?= $record['id'] ?>">
                    <button type="submit" name="update" class="btn btn-warning">
                        <a class="text-decoration-none" href="../app/Views/updateUser.php?update_id=<?= $record['id'] ?>">Update</a>
                    </button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>

<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        alert(1);-->
<!--    })-->
<!--</script>-->
</body>
</html>