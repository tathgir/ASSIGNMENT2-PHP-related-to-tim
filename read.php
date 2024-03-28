<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
    <body>
        <div class="container-fluid">
            <h2> List of Employees</h2>
            <a class="btn btn-primary" href="/TIM/read.php" role="button">New Employee</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Salary</th>
</tr>
</thead>
<tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tim_menu";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    //read all row from database table
    $sql = "SELECT * FROM employees";
    $result = $connection->query($sql);

    if (!$result) {
        die("Invalid query: " . $connection->error);
    }

    // read data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[address]</td>
        <td>$row[salary]</td>
        <td>$row[created_at]</td>
        <td>
        <a class='btn btn-primary btn-sm' href='/TIM/update.php?id=$row[id]'>Update</a>
        <a class='btn btn-danger btn-sm' href='/TIM/delete.php?id=$row[id]'>Delete</a>
        <a class='btn btn-success btn-sm' href='/TIM/read.php?id=$row[id] '>Read</a>
</td>
</tr>
        ";
    } 

    ?>
    
</tbody>
</table>

</div>
</body>
</html>