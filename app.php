<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CRUD APP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $database = "crudapp";

        $conn = mysqli_connect($serverName, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $query = "INSERT INTO `crudinfo` (`title`, `description`) VALUES ('$title', '$description')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> Your data has been inserted successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Error!</strong> Your data has not been inserted successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
        
        ?>
        <?php
        if(isset($_GET['message'])) {
            $message = $_GET['message'];
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$message</strong>.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
        ?>
    </div>


    <div class="container mt-5">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="" name="title">
                <label for="floatingInput">Title</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Description</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SrNo</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col" >Update/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `crudinfo`";
                $result = mysqli_query($conn, $query);
                $num = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                   <tr>
                    <th scope='row'><?php echo $num ?></th>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><a href="/LearnPhp/webPractice/update.php?uid=<?php echo $row['SrNo'] ?>" class="btn btn-primary mx-3 my-1">Update</a><a onclick="confirm('Are You Sure To Delete This Fild')" href="/LearnPhp/webPractice/delete.php?uid=<?php echo $row['SrNo'] ?>" class="btn btn-danger mx-3 my-1 ">Delete</a></td>
                    </tr>

                    <?php
                    $num++;
                }
                ?>
                
            </tbody>
            
        </table>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>