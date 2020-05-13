<?php session_start();?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Fantasy Pokémon - Create Teams</title>
    <meta name="description" content="IT 490 - 5 Braincells Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="text-center">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Add your site or application content here -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Fantasy Pokémon</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="createTeams.php">Create Teams <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Builds/BattleSim.html">Battle Pokémon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Profile </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item my-2 my-lg-0">
                            <a class="nav-link" href="signout.php">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Navbar -->
        <!-- Sidebar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link disabled" href="#">Filters</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="name" name="name">
                                <a class="dropdown-item" value="nameaz">Name [A-Z]</a>
                                <a class="dropdown-item" value="nameza">Name [Z-A]</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="type" name="type">
                                <a class="dropdown-item" value="normal">Normal</a>
                                <a class="dropdown-item" value="fire">Fire</a>
                                <a class="dropdown-item" value="water">Water</a>
                                <a class="dropdown-item" value="electric">Electric</a>
                                <a class="dropdown-item" value="grass">Grass</a>
                                <a class="dropdown-item" value="ice">Ice</a>
                                <a class="dropdown-item" value="fighting">Fighting</a>
                                <a class="dropdown-item" value="poison">Poison</a>
                                <a class="dropdown-item" value="ground">Ground</a>
                                <a class="dropdown-item" value="flying">Flying</a>
                                <a class="dropdown-item" value="psychic">Psychic</a>
                                <a class="dropdown-item" value="bug">Bug</a>
                                <a class="dropdown-item" value="rock">Rock</a>
                                <a class="dropdown-item" value="ghost">Ghost</a>
                                <a class="dropdown-item" value="dragon">Dragon</a>
                                <a class="dropdown-item" value="dark">Dark</a>
                                <a class="dropdown-item" value="steel">Steel</a>
                                <a class="dropdown-item" value="fairy">Fairy</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Evolution</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="evolution" name="evolution">
                                <a class="dropdown-item" value="lowest">Lowest</a>
                                <a class="dropdown-item" value="middle">Middle</a>
                                <a class="dropdown-item" value="highest">Highest</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Generation</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="generation" name="generation">
                                <a class="dropdown-item" value="I">I</a>
                                <a class="dropdown-item" value="II">II</a>
                                <a class="dropdown-item" value="III">III</a>
                                <a class="dropdown-item" value="IV">IV</a>
                                <a class="dropdown-item" value="V">V</a>
                                <a class="dropdown-item" value="VI">VI</a>
                                <a class="dropdown-item" value="VII">VII</a>
                                <a class="dropdown-item" value="VIII">VIII</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Sidebar -->
        <!-- Page Content  -->
        <div id="content">
            <h1>Create your own fantasy Pokémon teams!</h1>
            <p>Create teams of 6 pokemon to battle against opponents. Who's party will be victorious?</p>
            <h3> My Team </h3>
            <div id="team" style="position: center;">
                <div id="pokemonRow" class="card-deck" style="padding-top: 15px;">
                    <!-- Card Row 1 -->
                    <div class="col">
                        <div id="pokemon" class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
                            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
                            <div class="card-body">
                                <p id="name" value="bulbasaur" class="card-text" style="font-weight: bold;">Name: Bulbasaur</p>
                                <p id="type" value="grass" class="card-text">Type: grass</p>
                                <p id="evolution" value="lowest" class="card-text">Evolution: lowest</p>
                                <p id="generation" value="I" class="card-text">Generation: I</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="pokemon" class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
                            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
                            <div class="card-body">
                                <p id="name" value="charmander" class="card-text" style="font-weight: bold;">Name: Charmander</p>
                                <p id="type" value="fire" class="card-text">Type: fire</p>
                                <p id="evolution" value="lowest" class="card-text">Evolution: lowest</p>
                                <p id="generation" value="I" class="card-text">Generation: I</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="pokemon" class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
                            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
                            <div class="card-body">
                                <p id="name" value="squirtle" class="card-text" style="font-weight: bold;">Name: Squirtle</p>
                                <p id="type" value="water" class="card-text">Type: water</p>
                                <p id="evolution" value="lowest" class="card-text">Evolution: lowest</p>
                                <p id="generation" value="I" class="card-text">Generation: I</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Card Row 1 -->
                <!-- Card Row 2 -->
                <div id="pokemonRow" class="card-deck" style="padding-top: 15px;">
                    <div class="col">
                        <div id="pokemon" class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
                            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
                            <div class="card-body">
                                <p id="name" value="blastoise" class="card-text" style="font-weight: bold;">Name: Blastoise</p>
                                <p id="type" value="water" class="card-text">Type: water</p>
                                <p id="evolution" value="lowest" class="card-text">Evolution: lowest</p>
                                <p id="generation" value="I" class="card-text">Generation: I</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="pokemon" class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
                            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
                            <div class="card-body">
                                <p id="name" value="pidgey" class="card-text" style="font-weight: bold;">Name: Pidgey</p>
                                <p id="type" value="normal" class="card-text">Type: normal</p>
                                <p id="evolution" value="lowest" class="card-text">Evolution: lowest</p>
                                <p id="generation" value="I" class="card-text">Generation: I</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="pokemon" class="card" style="width: 18rem;">
                            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
                            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
                            <div class="card-body">
                                <p id="name" value="caterpie" class="card-text" style="font-weight: bold;">Name: Caterpie</p>
                                <p id="type" value="bug" class="card-text">Type: bug</p>
                                <p id="evolution" value="lowest" class="card-text">Evolution: lowest</p>
                                <p id="generation" value="I" class="card-text">Generation: I</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- /Card Row 2 -->
            </div><!-- /My Team -->
        </div> <!-- /Page Content -->
    </div> <!-- /Wrapper -->
    <!-- Footer -->
    <footer class="container">
        <p>&copy; 2020 </p>
    </footer>
    <!-- Scripts -->
    <script src="js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <!--  <script src="js/main.js"></script> -->
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>
