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
        <h2>An error has occurred:</h2>
        <p>
            
            $error = $_GET['error'] ?? 'An unknown error has occurred.';
            echo htmlspecialchars($error);
        
        </p>
        <p><a class="btn btn-primary" href="/" role="button">Return to the home page</a></p>
    </div>  
</body>

</html>