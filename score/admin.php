<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Are You Smarter Than A 5th Grader? | Game Night by Sam Carne | samcarne.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	  <a class="navbar-brand" href="#">GAME NIGHT</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link active" href="<?php BASEURL; ?>/fifthgrader/index.php">AYSTA5G?</a>
	      <a class="nav-item nav-link active" href="<?php BASEURL; ?>/jeopardy/jeopardy/index.php">JEOPARDY!</a>
	    </div>
	  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8">

	<div class="img">
        <img src="../img/apple.png" height='150'>
      </div>
    </div>

	<div class="col-sm-2 sidenav">

    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title upper" id="exampleModalLongTitle">
			<!-- admin - grade and subject -->
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  	<!-- QUESTION -->
	  	<!-- ANSWER -->
	  
      </div>
      <div class="modal-footer">
	      
	      <!-- POINT VALUE -->
		  <!-- give to team 1 -->
		  <!-- give to team 2 -->
		  <!-- no points -->
	      
	      
<!--
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary">Reveal Answer</button>
-->
      </div>
    </div>
  </div>
</div>



<footer class="container-fluid text-center">
  <p>Copyrights © 2020 Sam Carne. All Rights Reserved.</p>
</footer>

</body>
</html>