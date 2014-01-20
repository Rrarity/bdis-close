<?php
include("../lib/connect.php");
include("../lib/global.php");

if (!is_login())
    header("Location: login.php");
if (!is_admin()) {
    echo "У вас нет прав для просмотра этой страницы";
    exit;
}

if (isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    if ($id == 0) {
        $query = "SELECT * FROM subdivision";
        $rez = mysql_query($query);
        while ($row = mysql_fetch_assoc($rez)) {
            $response[] = $row;
        }
        echo json_encode($response);
        header('Content-Type: application/json');
        exit;
    }
}