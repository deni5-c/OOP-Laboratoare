<?php
    session_start();
    require("mysql_connect.php");
    $id = $_GET["id"];
    $sql = "DELETE FROM notes WHERE id=$id";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("Location: notes.php");
            die();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DN | Notes</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="notes.php">My Notes</a>
        </div>
    </nav>

    <div class="container">
        <div class="row pt-3">
            <div class="col">
                <div class="card">
                    <h1 class="card-title text-center">This will delete the note. Are you sure?</h5>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=$id"; ?>" method="post">
                                <div class="d-grid gap-2 pt-4">
                                    <button class="btn btn-danger" type="submit">Yes</button>
                                    <a href="notes.php" class="btn btn-secondary">No</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
