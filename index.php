<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Are You Smarter Than A 5th Grader? | Game Night by Sam Carne | samcarne.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
	    </div>
	  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8">
      <h1>ARE YOU SMARTER THAN A 5TH GRADER?</h1>

			<?php

				$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
        $tablename = TABLENAME;
				$sql = "SELECT DISTINCT grade FROM $tablename";
				$result = mysqli_query($conn, $sql);
				$grade = array();
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						array_push($grade, $row['grade']);
					}
				} else {
					echo "0 results";
				}

				echo '<section class="gameplay">';

				$i = 0;
				foreach($grade as $key=>$value) {
						$sql = "SELECT ID, grade, subject, played FROM $tablename WHERE grade='$value'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_array($result)) {
                echo '<div class="halfCont">';
								echo '<div class="half btn' . $row['grade'] . ' btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-id="' . $row['ID'] . '" data-foo="">';
								echo '<div>';
								echo $row['grade'];
								if ($row['grade'] == "1") {
									 echo 'ST';
								} else if ($row['grade'] == "2") {
									echo 'ND';
								} else if ($row['grade'] == "3") {
									echo 'RD';
								} else {
									echo 'TH';
								}
								echo ' GRADE ';
								echo '<span class="upper">' . $row['subject'] . '</span>';
							  echo '</div>';
								echo '</div>';
                echo '</div>';
							}
						} else {
							echo "0 results";
						}

						$i++;
				}
				mysqli_close($conn);

				echo '</section>';

			?>
      <div class="img">
        <img src="img/apple.png" height='150'>
      </div>
    </div>
    <div class="col-sm-2 sidenav">

    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Copyrights © 2020 Sam Carne. All Rights Reserved.</p>
</footer>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title upper" id="exampleModalLongTitle">

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary">Reveal Answer</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $.ajax({
    url: "ajax/updatedbfreshgame.php",
    context: document.body//,
  });

  $(".btn.half").click(function () {
    var id = $(this).data("id");
    $(this).data('foo', id);
    $(this).hide();
    $.ajax({
      type: "GET",
      url: "ajax/modal.php",
      data: {'id': id},
      success: function(result) {
        var results = JSON.parse(result);

        $(".modal .modal-body").empty();
        $(".modal .modal-title").empty();
        $(".modal .modal-body").html((results[0]["question"]));
        $(".modal .modal-title").append((results[0]["grade"]));
        if (results[0]["grade"] == "1") {
            $(".modal .modal-title").append('ST ');
        } else if (results[0]["grade"] == "2") {
          $(".modal .modal-title").append('ND ');
        } else if (results[0]["grade"] == "3") {
          $(".modal .modal-title").append('RD ');
        } else {
          $(".modal .modal-title").append('TH ');
        }
        $(".modal .modal-title").append("GRADE ");
        $(".modal .modal-title").append((results[0]["subject"]));

        $(".btn-secondary").click(function() {
          $(".modal .modal-body").html(results[0]["question"] + '<br><br>' + results[0]["answer"]);
          $(".btn-primary, .close").click(function() {
            $(".modal .modal-body").empty();
            $(".modal .modal-title").empty();
          });
        });

        $(".btn-primary, .close").click(function() {
          $(".modal .modal-body").empty();
          $(".modal .modal-title").empty();
        });
        $(".btn-secondary").click(function() {
          var id = results[0]['ID'];
          $.ajax({
            type: "GET",
            url: "ajax/updateanswered.php",
            data: {'id': id},
            context: document.body,
            success: function(result) {
            }
          });
        });


      }
    });
  });

});


</script>

</body>
</html>
