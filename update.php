<?php
$id = $_GET['uid'];
$serverName = "localhost";
$username = "root";
$password = "";
$database = "crudapp";

$conn = mysqli_connect($serverName, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM `crudinfo` WHERE `SrNo` = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['ntitle'];
    $description = $_POST['ndescription'];
    $sql = "UPDATE `crudinfo` SET `title` = '$title', `description` = '$description' WHERE `SrNo` = '$id'";
    $res = mysqli_query($conn, $sql);
    $message = "Your data has been updated";
    header("Location: /LearnPhp/webPractice/app.php?message=" . urlencode($message));
}

?>

<body>
    <div class="container mt-5">
        <h1 class="text-center my-5">Update Your Entry </h1>
        <form action="/LearnPhp/webPractice/update.php?uid=<?php echo $id ?>" method="post">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="" name="ntitle" value="<?php echo $row['title'] ?>">
                <label for="floatingInput">Title</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea name="ndescription" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $row['description']; ?></textarea>

                <label for="floatingTextarea2">Description</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>