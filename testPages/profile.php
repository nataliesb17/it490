<?php 
session_start();
$name = $_SESSION['name'];
$user = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>Fantasy Pokémon - User Profile</title>
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createTeams.php">Create Teams </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Builds/BattleSim.html">Battle Pokémon</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">My Profile <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item my-2 my-lg-0">
            <a class="nav-link" href="signout.php">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  <!-- /Navbar -->
  <div class="container" id="content">

    <!-- User Profile -->
    <div class="row my-2">
      <div class="col-lg-4 order-lg-1 text-center">
      	<img id="avatar" src="img/avatar150.png" class="mx-auto img-fluid img-circle d-block" alt="avatar" height=150 width=150>
		    <br><h6 class="mt-2">Upload a different photo</h6>
		    <div class="custom-file" style="width: 250px;">
           <input id=file type="file" class="custom-file-input">
           <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>

        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                      <label class="col-lg-3 col-form-label form-control-label">Name</label>
                        <div class="col-lg-9"><p><?php echo $_SESSION['name']; ?></p></div>
                      <label class="col-lg-3 col-form-label form-control-label">Username</label>
                        <div class="col-lg-9"><p><?php echo $_SESSION['username']; ?></p></div>
                        <label class="col-lg-3 col-form-label form-control-label"><?php echo $teams; ?></label>
                    </div>
                </div>

                <!-- Edit User Profile -->
                <div class="tab-pane" id="edit">
                    <form role="form" method="POST" action="editProfile.php">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="Name" value="<?php echo $_SESSION['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" placeholder="Email address" value="<?php echo $_SESSION['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="Username" value="<?php echo $_SESSION['username']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" placeholder="Password" value="<?php echo $_SESSION['password']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" placeholder="Confirm Password" value="<?php echo $_SESSION['password']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /User Profile -->

  <!-- Footer -->
    <footer class="container">
      <p>&copy; 2020 </p>
    </footer>

  <script>
        window.addEventListener('load', function() {
                document.querySelector('input[type="file"]').addEventListener('change', function() {
                        if (this.files && this.files[0]) {
                                var img = document.querySelector('img');  // $('img')[0]
                                img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                                //img.onload = imageIsLoaded;
                        }
                });
        });
  </script>

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

