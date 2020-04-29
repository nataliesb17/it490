<?php ?>
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
    <!-- Sidebar  -->
    <nav id="sidebar" class="navbar navbar-light bg-light">
      <div class="sidebar-header">
          <h3>Create Teams</h3>
      </div>
      <ul class="list-unstyled components">
        <div class="col text-center">
          <form id="search" class="form-inline">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success text-center" type="submit">Search</button>
          </form>
        </div>
        <p>Filters</p>
        <div class="form-group">
          <a class="nav-link">
            <label for="sortMenu">Name</label>
            <select id="sortMenu" name="sortMenu">
              <option value="nameaz">Name [A-Z]</option>
              <option value="nameza">Name [Z-A]</option>
            </select>
          </a>
        </div>
        <div class="form-group">
          <a class="nav-link">
            <label for="type">Type</label>  
            <select id="type" name="type">
              <option value="normal">Normal</option>
              <option value="fire">Fire</option>
              <option value="water">Water</option>
              <option value="electric">Electric</option>
              <option value="grass">Grass</option>
              <option value="ice">Ice</option>
              <option value="fighting">Fighting</option>
              <option value="poison">Poison</option>
              <option value="ground">Ground</option>
              <option value="flying">Flying</option>
              <option value="psychic">Psychic</option>
              <option value="bug">Bug</option>
              <option value="rock">Rock</option>
              <option value="ghost">Ghost</option>
              <option value="dragon">Dragon</option>
              <option value="dark">Dark</option>
              <option value="steel">Steel</option>
              <option value="fairy">Fairy</option>
            </select>
          </a>
        </div>
        <div class="form-group">  
          <a class="nav-link">
            <label for="evolution">Evolution</label>  
            <select id="evolution" name="evolution">
              <option value="lowest">Lowest</option>
              <option value="middle">Middle</option>
              <option value="highest">Highest</option>
            </select>
          </a>
        </div>
        <div class="form-group">  
          <a class="nav-link">
            <label for="generation">Generation</label>  
            <select id="generation" name="generation">
              <option value="I">I</option>
              <option value="II">II</option>
              <option value="III">III</option>
              <option value="IV">IV</option>
              <option value="V">V</option>
              <option value="VI">VI</option>
              <option value="VII">VII</option>
              <option value="VIII">VIII</option>
            </select>
          </a>
        </div>
    </nav>
    <!-- /Sidebar -->

    <!-- Page Content  -->
    <div id="content">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="createTeams.html">Create Teams <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.html">My Profile </a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- /Navbar -->

      <h1>Create your own fantasy Pokémon teams!</h1>
      <p>Create teams of 6 pokemon to battle against opponents. Who's party will be victorious?</p>
      <h3> My Team </h3>
      <div id="pokemonRow" class="card-row" style="padding-top: 15px;">
        <!-- Card Row 1 -->
          <div id="pokemon" class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
            <div class="card-body">
            <p id="name" value="" class="card-text" style="font-weight: bold;">Name</p>
            <p id="type" value="" class="card-text">Type</p>
            <p id="evolution" value="" class="card-text">Evolution</p>
            <p id="generation" value="" class="card-text">Generation</p>
            </div>
          </div>
          <div id="pokemon" class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
            <div class="card-body">
            <p id="name" value="" class="card-text" style="font-weight: bold;">Name</p>
            <p id="type" value="" class="card-text">Type</p>
            <p id="evolution" value="" class="card-text">Evolution</p>
            <p id="generation" value="" class="card-text">Generation</p>
            </div>
          </div>
          <div id="pokemon" class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
            <div class="card-body">
            <p id="name" value="" class="card-text" style="font-weight: bold;">Name</p>
            <p id="type" value="" class="card-text">Type</p>
            <p id="evolution" value="" class="card-text">Evolution</p>
            <p id="generation" value="" class="card-text">Generation</p>
            </div>
          </div>
        </div>
        <!-- /Card Row 1 -->
        <!-- Card Row 2 -->
        <div id="pokemonRow" class="card-row" style="padding-top: 15px;">
          <div id="pokemon" class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
            <div class="card-body">
            <p id="name" value="" class="card-text" style="font-weight: bold;">Name</p>
            <p id="type" value="" class="card-text">Type</p>
            <p id="evolution" value="" class="card-text">Evolution</p>
            <p id="generation" value="" class="card-text">Generation</p>
            </div>
          </div>
          <div id="pokemon" class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
            <div class="card-body">
            <p id="name" value="" class="card-text" style="font-weight: bold;">Name</p>
            <p id="type" value="" class="card-text">Type</p>
            <p id="evolution" value="" class="card-text">Evolution</p>
            <p id="generation" value="" class="card-text">Generation</p>
            </div>
          </div>
          <div id="pokemon" class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: black; font-weight: bold; color: white;"></div>
            <img class="card-img-top" src="pokemon_imgs/pokemon.jpg" alt="">
            <div class="card-body">
            <p id="name" value="" class="card-text" style="font-weight: bold;">Name</p>
            <p id="type" value="" class="card-text">Type</p>
            <p id="evolution" value="" class="card-text">Evolution</p>
            <p id="generation" value="" class="card-text">Generation</p>
            </div>
          </div>
        </div>
        <!-- /Card Row 2 -->
      </div><!-- /My Team -->
  </div><!-- /Wrapper -->
  <!-- /Page Content -->
  <!-- Footer -->
    <footer class="container">
      <p>&copy; 2020 </p>
    </footer>

<!-- Scripts -->
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <!--  <script src="js/main.js"></script> -->

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>

