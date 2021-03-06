<?php session_start();?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>Fantasy Pokémon - Home</title>
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
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Fantasy Pokémon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createTeams.php">Create Teams </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Builds/BattleSim.html">Battle Pokémon</a>
          </li>
         <?php if(isset($_SESSION['username'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">My Profile <span class="sr-only"></span></a>
          </li>
          <?php endif; ?>
        </ul>
        <?php if(!isset($_SESSION['username'])) : ?>
        <ul class="navbar-nav ml-auto">
                <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" href="signin.php">Sign in</a>
                </li>
        </ul>
        <?php endif; ?>
        <?php if(isset($_SESSION['username'])) : ?>
        <ul class="navbar-nav ml-auto">
                <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link" href="signout.php">Sign out</a>
                </li>
        </ul>
        <?php endif; ?>
      </div>
    </nav>
    <!-- /Navbar -->

  <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Welcome to Fantasy Pokémon!</h1>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Create Teams</h2>
            <p>Create teams of six pokémon to battle against others! Save your all-star teams in your Fantasy Pokémon League.</p>
            <p><a class="btn btn-secondary" href="createTeams.php" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Battle Pokémon</h2>
            <p>Show off your battle skills! Put your teams to the test by battlingother teams in the Fantasy Pokémon League. </p>
            <p><a class="btn btn-secondary" href="/Builds/BattleSim.html" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>View Profile</h2>
            <p>After creating your teams, all of your teams will be saved to your profile. Check them out here!</p>
            <p><a class="btn btn-secondary" href="profile.php" role="button">View details &raquo;</a></p>
          </div>
        </div>
        <hr>
      </div> <!-- /container -->


    </main>

    <footer class="container">
      <p>&copy; 2020 </p>
    </footer>


  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

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
