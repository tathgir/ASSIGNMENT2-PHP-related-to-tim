<?php
$servername="localhost";
$username="root";
$password="";
$database="tim_menu";


    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

$name = "";
$address = "";
$salary = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"]; 

    do {
        if ( empty($name) || empty($address) ||   empty($salary) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        //add new employee to database
        $sql = "INSERT INTO employees (name, address, salary) " .
                "VALUES ('$name', '$address', '$salary')";
            $result = $connection->query($sql);
            
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
       
        $name = "";
        $address = "";
        $salary = "";

        $successMessage = "Employee added correctly";

        header("location: /TIM/index.php");
        exit;

    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <h2>New employee</h2>

        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
</div>
</div>
    
<div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">

</div>
</div>
<div class="row mb-3">
                <label class="col-sm-3 col-form-label">Salary</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="salary" value="<?php echo $salary; ?>">
               
            </div>
</div>

<?php
    if ( !empty($successMessage) ) {
        echo "
        <div class='row mb-3'>
        <div class='offset alert-success alert-dismissible fade show' role='alert'>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            </div>
            </div>
            ";
    }
?>


<div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a class="b tn btn-outline-primary" href="/TIM/index.php" role="button">Cancel</a>
</div>
</div>
</form>
</div>
</body>
</html>