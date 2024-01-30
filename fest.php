<?php 
if ($_SERVER['REQUEST_URI'] === '/konark') {
    
    // Assuming you have a cats.php template file
    include('fests/konark.php');
}
else{
	include('404.php');
}
echo $_SERVER['REQUEST_URI'];
