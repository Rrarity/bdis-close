<?php
include("lib/connect.php");
include("lib/global.php");

if (!is_login())
    header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
main <a href="logout.php">Logout</a>
</body>
</html>