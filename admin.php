<?php
include("lib/connect.php");
include("lib/global.php");

if (!is_login())
    header("Location: login.php");
if (!is_admin()) {
    echo "У вас нет прав для просмотра этой страницы";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
admin <a href="logout.php">Logout</a>
</body>
</html>