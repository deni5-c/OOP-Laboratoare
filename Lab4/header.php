<?php
    session_start();
  
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="landing.php"><img src="assets/img/logo.png" style="width: 45px;"></path>
                    </svg></span><span>DeNotes</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">

                <a class="btn btn-primary" role="button" style="background: #61b4cd; border-color: #61b4cd;margin: 4px" href="notes.php">Notes</a>
                <?php if($_SESSION['user_type'] == 'admin'): ?>
					<a class="btn btn-primary" role="button" style="background: #e6735c; border-color: #e6735c;margin: 4px" href="notes_admin.php">Admin Notes</a>
				</li>
                </ul>
                <?php endif;?> 
                <a class="btn btn-primary" role="button" style="background: var(--bs-red);border-color: var(--bs-red);" href="logout.php">Logout</a></ul>
        </div>
    </nav>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        </body>
</html>