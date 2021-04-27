<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    h1 {
        font-family: "Satisfy", sans-serif;
    }

    #header .logo h1 {
        font-size: 28px;
        margin: 0;
        line-height: 1;
        font-weight: 400;
        letter-spacing: 3px;
    }

    #header .logo h1 a,
    #header .logo h1 a:hover {
        color: #fff;
        text-decoration: none;
    }

    #header .logo img {
        padding: 0;
        margin: 0;
        max-height: 40px;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header logo me-auto">
                <h1><a href="#">e-Tailoring</a></h1>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h3>Right Aligned Navbar</h3>
        <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
    </div>

</body>

</html>