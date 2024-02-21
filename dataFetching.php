<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fatching</title>
</head>
<body>
    <h1>Data Fetching From DataBase</h1>
    <?php
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
            echo "No Data Found";
        }
    
    
    ?>
</body>
</html>
<!-- $result= mysqli_query($conn, "SELECT * FROM `crudinfo`");

    if(mysqli_num_rows($result) > 0){
        echo "<table border='1' class='mt-5 table container'>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>";
        $num = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $num . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["createdAt"] . "</td>
            </tr>";
            $num++;
        }
        echo "</table>";
    } else {
        echo "No Data Found";
    } -->
