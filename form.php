<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms Practices</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <button type="submit" name="submit">Submit</button>
    </form>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        // echo "<h1 title =$name>$name</h1>";
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "userinfo";

        $conn = mysqli_connect($serverName, $userName, $password, $dbName);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connected successfully";
        }
        $query = "INSERT INTO userdata (name, email) VALUES ('$name', '$email')";
        $result = mysqli_query($conn, $query);
        $selectQuery = "SELECT * FROM userdata";
        $selectResult = mysqli_query($conn, $selectQuery);
        if (mysqli_num_rows($selectResult) > 0) {
            echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>";

            while ($row = mysqli_fetch_assoc($selectResult)) {
                echo "<tr>
                    <td>" . $row["SrNo"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["createdAt"] . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }


    ?>


</body>

</html>