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
        <a class="text-decoration-none text-white" href="../app/views/allUser.php">See All Users</a>
    </button>
    <!--  User Input  -->
    <form method="post" id="user_form">
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

</div>

<script>
    document.getElementById("user_form").addEventListener("submit", function (e) {
        e.preventDefault();
        this.querySelectorAll('input').forEach(function (input) {
            input.value = "";
        })
    })
</script>
</body>
</html>