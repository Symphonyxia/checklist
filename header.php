<?php
require_once('boot.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checklist</title>
    <link rel="stylesheet" type="text/css" href="resources/style.css">
    <link rel="stylesheet" type="text/css" href="resources/fontawesome-free-6.5.1-web/css/fontawesome.css">

    <link rel="stylesheet" type="text/css" href="resources/fontawesome-free-6.5.1-web/css/solid.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="resources/css/edit.css">
    <link rel="stylesheet" href="resources/css/view.css">

    <link rel="icon" type="image/x-icon" href="resources/img/iloilo.png">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="resources/js/table.js"></script>
    <script src="resources/js/update_questions.js"></script>
    <script src="resources/js/create.js"></script>
    <script src="resources/js/edit_question.js"></script>




</head>

<header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary-burlywood">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php"><strong>Checklist Assessment System</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button type="submit" class="btn btn-danger"><a class="dropdown-item" href="logout.php">
                            Logout
                        </a>
                    </button>
                </form>

            </div>
        </div>
    </nav>
</header>

<body>
<?php
if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger text-center'>
            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
          </div>";

    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<div class='alert alert-success text-center'>
            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
          </div>";

    unset($_SESSION['success']);
}
?>
    <br>
