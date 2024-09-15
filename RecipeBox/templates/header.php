<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD IN PHP & MYSQL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">

        body {
            font-family: 'Open Sans', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        .brand-text{
            color: #009688 !important;
        }
        
        form{
            max-width: 500px;
            margin: 40px auto;
            padding: 40px;
        }

        form label{
            font-size: 18px;
            font-weight: bold;
        }

        .receipe_img{
            width: 200px;
            margin: 130px auto -190px;
            display: block;
            position: relative;
            top: -120px;
        }
        .center-card {
            max-width: 650px;
            margin: 50px auto; 
            padding:40px;
        }

        .center-card h3, h5 {
            text-align: center;
        }

        .center-card p {
            text-align: justify;
            font-size: 20px;
        }

    </style>

</head>

<body class="blue-grey darken-4">

    <nav class="white z-depth-0">

        <div class="container" style="padding: 0 20px;">

            <a href="index.php" class="brand-logo brand-text" style="font-size: 2.9rem; padding-left: 10px;">RecipeBox</a>

            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="add.php" class="btn brand z-depth-0">Add Recipe</a></li>
            </ul>

        </div>

    </nav>