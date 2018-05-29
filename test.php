<?php
include("autoloader.php");
$account = new Manager();
$test = $account -> register(
'jonesy6769','email4@example.com','password',3,18
);
print_r( $account -> errors );


?>