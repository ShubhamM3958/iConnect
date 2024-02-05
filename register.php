<?php
//  $servername = "localhost";
//  $username = "root";
//  $password = "root";
//  $database = "iconnect_test";

$servername = "118.139.160.140";
$username = "shubham_poco";
$password = "Shubham#Sql3958";
$database = "iconnect_test";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    $error_message = "Connection Error";
}
?>

<?php
$sql = "SELECT name FROM events";
$result = $conn->query($sql);
$event_names = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $event_names[] = $row["name"];
    }
} else {
    exit('database error(no event found)');
}
//$event_names = ["Exihibition","VISIONathon","GJU Talks","Viz-Wiz","Block Chain Workshop","Shutter Shor","Hudle Race","Workshop","Digikriti 2.0","Elevator Pitch 5.0","Crown for Code","Memory Challenge","Scavenger Hunt","Brain Battles","Near Conclave"];
if (isset($_GET['eventid']) && is_numeric($_GET['eventid']) && $_GET['eventid'] >= 0 && $_GET['eventid'] < count($event_names)) {
    // Retrieve the id value from the URL
    $eventid = $_GET['eventid']+1;
} else {
    $eventid = 1;
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap intialized -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&amp;family=Montserrat:ital@1&amp;family=Sacramento&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat|Baloo+Chettan+2|Tangerine&display=swap"
      rel="stylesheet"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r127/three.min.js"></script>
    <script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script> -->
    <link rel="icon" type="image" href="images/iconnect.jpg" />
    <link rel="stylesheet" href="register_layout.css" />
      <link rel="stylesheet" href="template/nav_style.css"/>
      <link rel="stylesheet" href="template/footer_style.css"/>
    <title><?php
        echo $event_names[$eventid-1];
        ?> Registration(iConnect Society)</title>
  </head>
  <body>
  <?php
  define('key', TRUE);
  ?>

  <?php
  $sql = "SELECT * FROM events WHERE id = " . $eventid;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // Fetch the row as an associative array
      $event = $result->fetch_assoc();
  } else {
      $event=null;
  }

  if (!$event['active']) {
      header("Location: ../");
      exit();
  }

  ?>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Create connection
      $name = isset($_POST["name"]) ? mysqli_real_escape_string($conn, $_POST["name"]) : "";
      $course = isset($_POST["course"]) ? mysqli_real_escape_string($conn, $_POST["course"]) : "";
      $year = isset($_POST["year"]) ? mysqli_real_escape_string($conn, $_POST["year"]) : "";
      $phoneno = isset($_POST["phoneno"]) ? mysqli_real_escape_string($conn, $_POST["phoneno"]) : "";
      $email = isset($_POST["email"]) ? mysqli_real_escape_string($conn, $_POST["email"]) : "";
      $university = isset($_POST["university"]) ? mysqli_real_escape_string($conn, $_POST["university"]) : "";
      $event = $event_names[$eventid-1];
      $event = strtolower($event);
      $event = preg_replace('/[^a-z0-9]+/', '', $event);
      $gender = isset($_POST["gender"]) ? mysqli_real_escape_string($conn, $_POST["gender"]) : "";
      $rollno = isset($_POST["rollno"]) ? mysqli_real_escape_string($conn, $_POST["rollno"]) : "";

      if ($name == '' || $course == '' || $year == '' || $phoneno == '' || $email == '' || $university == '' || $event == '' || $gender == '' || $rollno == '') {
          $error_message = "Error: Please fill in all fields";
      }
      else{
          $sql = "INSERT INTO event_registration (name, email, course, year, rollno, phoneno, university, event, gender) 
            VALUES ('$name', '$email', '$course', '$year', '$rollno', '$phoneno', '$university', '$event', '$gender')";


          if ($conn->query($sql) === TRUE) {
              header("Location: registered.php");
              exit();

          } else {
              $error_message = "Duplicate entry or sql Error";
          }
      }

  }
  $conn->close();
  ?>






  <?php include('template/nav.php'); ?>
  <div style="padding-top: 100px">
      <div>
          <h1 class="heading"><?php
              echo $event['name'];
              ?></h1>

      </div>
      <div class="row justify-content-center pt-5 m-1">
          <div class="col-lg-4 col-md-12 order-1 order-lg-0">
              <div class="mt-5">
                  <div class="hl_pe">
                      <h3 class="sub-heading">About Event</h3>
                  </div>
                  <span
                  >
                      <?php
                        if(isset($event['about'])){
                          echo str_replace("\n", "<br>", $event['about']);
                        }
                        else{
                          echo "null";
                        }

                      ?>
                      </span
                  >
              </div>
              <div class="mt-5">
                  <div class="hl_pe">
                      <h3 class="sub-heading">Time Line</h3>
                  </div>
                  <span
                  ><?php
                      if(isset($event['timeline'])){
                          echo str_replace("\n", "<br>", $event['timeline']);
                      }
                      else{
                          echo "null";
                      }

                      ?></span
                  >
              </div>
              <div class="mt-5">
                  <div class="hl_pe">
                      <h3 class="sub-heading">Rules</h3>
                  </div>
                  <span
                  ><?php
                      if(isset($event['rules'])){
                          echo str_replace("\n", "<br>", $event['rules']);
                      }
                      else{
                          echo "null";
                      }

                      ?></span
                  >
              </div>
          </div>
          <div class="col-lg-4 order-0 order-lg-1">
              <div class="sticky-top z-3">
                  <div class="text-center">

                      <img class="img-fluid" src=<?php
                      if(isset($event['poster'])){
                          echo $event['poster'];
                      }
                      else{
                          echo "images/konark_poster.png";
                      }

                      ?> />
                  </div>
                  <div class="mt-5">
                      <div class="hl_pe">
                          <h3 class="sub-heading">Contact Us</h3>
                      </div>
                      <span>
                      <?php
                      if(isset($event['contact'])){
                          echo str_replace("\n", "<br>", $event['contact']);;
                      }
                      else{
                          echo "null";
                      }

                      ?>
                  </span>
                  </div>
              </div>

          </div>
          <div class="col-lg-4 order-2 pt-md-5 pt-md-5 align-content-center">

              <div class="login-box pt-sm-3">
                  <h2 class="sub-heading">Register for Event</h2>
                  <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
                  <?php if(isset($event) && !$event['link']): ?>
                  <form id="register-form" action="" method="post">
                      <div class="user-box">
                          <input type="text" name="name" required>
                          <label>Name</label>
                      </div>
                      <div class="user-box">
                          <input type="text" name="course" required>
                          <label>Course</label>
                      </div>
                      <div class="user-box">
                          <input type="number" name="year" required>
                          <label>Year Of Passing</label>
                      </div>
                      <div class="user-box">
                          <input type="text" name="rollno" required>
                          <label>Roll No.</label>
                      </div>
                      <div class="user-box">
                          <input type="number" name="phoneno" required>
                          <label>Phone No.</label>
                      </div>
                      <div class="user-box">
                          <input type="text" name="email" required>
                          <label>Email</label>
                      </div>
                      <div class="user-box">
                          <input type="text" name="university" required>
                          <label>University</label>
                      </div>
<!--                      <div class="user-box">-->
<!--                          <input type="text" name="Event" --><?php
//                          if(isset($event_timeline[$eventid])){
//                              echo "value=".ucfirst($event_timeline[$eventid]);
//                          }
//                          ?><!-- disabled required>-->
<!--                          <label>University</label>-->
<!--                      </div>-->
                      <div class="">
                          <input class="p-3" type="radio" name="gender" value="male" required>
                          <label>Male</label>
                          <input class="p-3" type="radio" name="gender" value="female" required>
                          <label>Female</label>
                      </div>
                      <a class="form-link" onclick="document.getElementById('register-form').submit();"
                      ">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          Submit
                      </a>
                  </form>
                  <?php else: ?>
                  <div class="text-center">
                      <p>Catch the action! Register now on Unstop's website for this event!</p>
                      <a href="<?php echo $event['link'] ?>" target="_blank">
                          <button class="btn btn-outline-danger">Register</button>
                      </a>

                  </div>


                  <?php endif;?>
              </div>
          </div>
      </div>
  </div>

  <?php include('template/footer.php'); ?>
    <script src="register_script.js"></script>

  </body>
</html>
