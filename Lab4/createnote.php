<?php
    session_start();
    require("header.php");
    require("mysql_connect.php");
    $title = $content = $priority = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);
        $priority = htmlspecialchars($_POST["priority"]);
        $id=$_SESSION["user_id"];

        if (!empty($title) && !empty($content) && !empty($priority)) {
            $sql = "INSERT INTO notes(title, content, priority, userid) VALUES ('$title','$content','$priority','$id')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">
                        Record updated successfully.
                      </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        An error occurred while updating.<br>
                        Error:  '.$sql.' <br>  '.$conn->error.'
                      </div>';
            }
        }
        $conn->close();
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
                    <span>
                    <h1> <a class="m-2" href="notes.php">⬅︎</a></h1>
                    <h1 class="card-title text-center">Note Creation</h5>
                    </span>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="An indecredible title" required />
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, iusto!" rows="3" required></textarea>
                                </div>

                                <label for="priority" class="form-label">Prority</label>
                                <select class="form-select" name="priority" required>
                                    <option selected hidden>Select priority</option>
                                    <option value="low">Low</option>
                                    <option value="middle">Middle</option>
                                    <option value="high">High</option>
                                </select>

                                <div class="d-grid gap-2 pt-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
