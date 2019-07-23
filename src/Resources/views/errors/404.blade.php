<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.1/croppie.min.css">
    <style>
        @import "lesshat";
        @import url(https://fonts.googleapis.com/css?family=Roboto);
        html { 
            background:  url(https://38.media.tumblr.com/546c0cd48d71f210f9b67a389003790d/tumblr_neq0yw9rMA1tm16jjo1_500.gif) no-repeat center center fixed; 
            background-size: cover;
            font-family: 'Roboto', sans-serif;
        }
        h1{
            font-size: 16em;
            margin: .2em .5em;
            color: rgba(255,255,255, 0.7);
            margin-bottom:0px;
        }
        h2{
            font-size: 1.7em;
            margin: .2em .5em;
            color: rgba(255,255,255, 0.6);
            .material-icons {
                font-size: 1.5em;
                position: relative;
                top: 10px;
            }
        }
        div.error{
            position:absolute;
            top:30%;
            margin-top:-8em;
            width:100%;
            text-align:center;
        }
    </style>
</head>
<body style="background:none;">
    <section class="section">
            <!--Navbar -->
                <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/articles') }}">Articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/categories') }}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/tags') }}">Tags</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            <!--/.Navbar -->
    </section>
    <section class="content">
        <div class="error">
            <h1>404 </h1>
            <h2>Page not found <i class="material-icons">contact : ajaykum.aipl@gmail.com</i></h2>
        </div>
    <section>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>
    
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.1/croppie.min.js"></script>
</body>
</html>