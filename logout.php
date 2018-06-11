<?php
session_start();
unset($_SESSION["account_name"]);
unset($_SESSION["account_id"]);
unset($_SESSION["role"]);
unset($_SESSION["company_id"]);
session_destroy();
header("location: index.php");
?>