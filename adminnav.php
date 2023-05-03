<?php 
$id = $_GET['user'];
?>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- <img src="img/cafebeamlogo.png" height="30"> -->
          <a class="navbar-brand" href="#"> <b>ADMIN PAGE</b> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="registereddriver.php?user=<?php echo $id?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="show_alert()"><button>Log Out</button></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <script>
        function show_alert() {
            var val = confirm("Do you want to Log Out?");
            if (val == true) {
                window.location.href = 'index.php';
            } else {
                alert("You pressed Cancel.");
            }
        }
    </script>