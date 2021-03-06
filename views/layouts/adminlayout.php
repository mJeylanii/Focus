<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/dark-switch.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!--Dashboard CSS -->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <title>Dashboard</title>
    <style>
        html, body{
            height: 100vh;
        }
    </style>
</head>
<body>
<?php if (\app\core\Application::$app::isGuest()): ?>
<?php if (\app\core\Application::$app->user->getType() == 1): ?>
<?php
include 'includes/admin.navbar.phtml';
?>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse navbar-light">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="/dashboard">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/orders">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?selection=5">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/messages">
                            <span data-feather="inbox"></span>
                            Messages
                            <span id="newMessage" class="badge bg-secondary">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
{{content}}
<script>
    feather.replace()
</script>
<script src="js/messages_controller.js"></script>
</body>
</html>
<?php else: ?>
    <?php \app\core\Application::$app->router->response->setStatusCode('403'); ?>
    <div class="text-center">
        <div class="alert alert-danger"><h1>You do not have access to this page!</h1>
            <h2>Please contact the system admin to get access</h2></div>
        <p class="lead">Redirecting you to the home page...</p>
        <?php echo ' <meta http-equiv="refresh" 
          content="2; url=/" />' ?>
    </div>

<?php endif; ?>
<?php else: ?>
    <?php \app\core\Application::$app->router->response->setStatusCode('403'); ?>
    <div class="text-center container-fluid mt-5 ">
        <div class="alert alert-danger"><h1>You do not have access to this page!</h1>
            <h2>Please contact the system admin to get access</h2></div>
        <p class="lead">Redirecting you to the home page... <a class="text-muted" href="/home">Click this link if you are not redirected</a></p>
        <?php echo ' <meta http-equiv="refresh"
          content="2; url=/" />' ?>
    </div>
<?php endif; ?>


