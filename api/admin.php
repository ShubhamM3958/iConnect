<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$servername = "118.139.160.140";
$username = "shubham_poco";
$password = "Shubham#Sql3958";
$database = "iconnect_test";
//  $servername = "localhost";
//  $username = "root";
//  $password = "root";
//  $database = "iconnect_test";
$table = "event_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if((isset($_GET['event']) and $_GET['event'] == '') or !isset($_GET['event'])){
    $sql = "SELECT * FROM " . $table;
}
else if (isset($_GET['event'])) {
    //$sql = "SELECT * FROM event_registration WHERE event='exihibition'";\
    $event = preg_replace('/[^a-z0-9]+/', '', strtolower($_GET['event']));
    $sql = "SELECT * FROM event_registration WHERE event='$event'";
}
$data = $conn->query($sql);

$sql = "SELECT name FROM events";
$result = $conn->query($sql);
$event_names = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $event_names[] = preg_replace('/[^a-zA-Z\d\s]/', '', $row["name"]);
    }
} else {
    exit('database error(no event found)');
}
// Close connection
$conn->close();
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="wrapper ">
    <nav
    >
        <h1>Dashboard</h1>
        <ul>
            <li><a>Details</a></li>
            <li><a>Search</a></li>
            <li><a class="link-light link-underline-opacity-0 border-1" href='logout.php'>Logout</a></li>
        </ul>
    </nav>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<!--        <section class="row text-center placeholders">-->
<!--            <div class="col-6 col-sm-3 panel-heading1">-->
<!--                <div class="panel panel-info">-->
<!--                    <div class="panel-heading">Header</div>-->
<!--                    <div class="panel-body">-->
<!--                        <h4>123</h4>-->
<!--                        <p>Data</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-6 col-sm-3 panel-heading2">-->
<!--                <div class="panel panel-success">-->
<!--                    <div class="panel-heading" >Header</div>-->
<!--                    <div class="panel-body">-->
<!--                        <h4>123</h4>-->
<!--                        <p>Data</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-6 col-sm-3 panel-heading3">-->
<!--                <div class="panel panel-warning">-->
<!--                    <div class="panel-heading">Header</div>-->
<!--                    <div class="panel-body">-->
<!--                        <h4>123</h4>-->
<!--                        <p>Data</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-6 col-sm-3 panel-heading4 ">-->
<!--                <div class="panel panel-danger">-->
<!--                    <div class="panel-heading">Header</div>-->
<!--                    <div class="panel-body">-->
<!--                        <h4>123</h4>-->
<!--                        <p>Data</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" method="get">
                        <select name="event" class="form-control">
                            <option value="">All</option>
                            <?php
                            foreach ($event_names as $event_n) {
                                echo "<option value='$event_n'";
                                if ($_GET['event'] == $event_n) {
                                    echo " selected";
                                }
                                echo ">$event_n</option>";
                            }
                            ?>
<!--                            <option value="event1">Event 1</option>-->
<!--                            <option value="event2">Event 2</option>-->
<!--                            <option value="event3">Event 3</option>-->
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>


        <h1 class="sub-header">
            <div class="btn-group pull-right" role="group" >
                <button type="button" class="btn btn-primary">Print</button>
                <button type="button" class="btn btn-primary">Export</button>
        </h1>
        <h1>

            Table
        </h1>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Roll No</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>University</th>
                    <th>Event</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($data->num_rows > 0) {
                    while ($d = $data->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $d["name"] . "</td>";
                        echo "<td>" . $d["Course"] . "</td>";
                        echo "<td>" . $d["year"] . "</td>";
                        echo "<td>" . $d["rollno"] . "</td>";
                        echo "<td>" . $d["phoneno"] . "</td>";
                        echo "<td>" . $d["email"] . "</td>";
                        echo "<td>" . $d["university"] . "</td>";
                        echo "<td>" . $d["event"] . "</td>";
                        echo "<td>" . $d["gender"] . "</td>";
                        echo "</tr>";
                    }
//    echo "<html><head><title>Admin Panel</title></head><body>";
//    echo "<h1>User Data</h1>";
//    echo "<table border='1'>";
//    echo "<tr><th>Name</th><th>Email</th></tr>";

                    // Output data of each row
//    while ($row = $result->fetch_assoc()) {
//        echo "<tr>";
//        echo "<td>" . $row["name"] . "</td>";
//        echo "<td>" . $row["email"] . "</td>";
//        echo "</tr>";
//    }

//    echo "</table>";
//    echo "<p><a href='logout.php'>Logout</a></p>";
//    echo "</body></html>";
                } else {
                    echo "No records found";
                }
                ?>
                </tbody>
            </table>
        </div>



    </div>
</div>
</div>





<script src="" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

