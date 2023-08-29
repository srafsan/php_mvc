<?php
require_once "../app/models/Database.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $data = [
    "name" => $_POST["name"],
    "mobile" => $_POST["mobile"],
    "email" => $_POST["email"],
    "password" => $_POST["password"],
  ];

  if (isset($_POST['create'])) {
    $db->insert("crud", $data);
  } elseif (isset($_POST['update'])) {
    $where = "id = " . $_POST['record_id'];
    $db->update("crud", $data, $where);
  } elseif (isset($_POST['delete'])) {
    $record_id = $_POST['record_id'];
    $where = "id = " . $record_id;
    $db->delete("crud", $where);
  }
}

$records = $db->select("crud");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="my-5 text-center">Welcome to CRUD Operation</h1>
    <button class="btn btn-success mb-4">
        <a class="text-decoration-none text-white" href="addUser.php">Add User</a>
    </button>
    <!--  User Input  -->
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" autocomplete="off"/>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off"/>
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile Number"
                   autocomplete="off"/>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password"
                   autocomplete="off"/>
        </div>
        <button type="submit" class="btn btn-primary" name="create">Submit</button>
    </form>

    <!-- Display User -->
    <h2>Records</h2>
    <table class="table">
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
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?= $record['id'] ?></td>
                <td><?= $record['name'] ?></td>
                <td><?= $record['email'] ?></td>
                <td><?= $record['mobile'] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="record_id" value="<?= $record['id'] ?>">
                        <button type="submit" name="update" class="btn btn-warning">Update</button>
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>