<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
</head>
<body>
<?php
define('key', TRUE);
?>
<?php include('nav.php'); ?>
<?php

// Define a route for /cats
if ($_SERVER['REQUEST_URI'] === '/cats') {
    
    // Assuming you have a cats.php template file
    include('template/cats.php');
}
else{
	include('template/no_cats.php');
}

?>

<?php

echo $_SERVER['REQUEST_URI'];
?>

</body>
</html>