<!DOCTYPE html>
<html>
    <head>
        <title>Bank Data</title>
	    <meta name="description" content="Test Website">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b15a8855ee.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/assets/css/stylesheet.css?php echo time(); ?>">
    </head>
    <body class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <a class="navbar-brand ms-2" href="/">
                <img src="/assets/img/logo.png" alt="Logo" style="height: 5vh; width: 4vw;">
                <p style="display: inline;">Live Chat</p> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ms-auto me-5">
                    <?php if (! session()->get('signedIn')) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/signup"><span class="fa-solid fa-user-plus"></span> Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/signin"><span class="fas fa-user"></span>Sign In</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/chat"><span class="fa-solid fa-comments"></span>Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/signout"><span class="fa-solid fa-right-to-bracket"></span>Sign Out</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
