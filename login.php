<?php
include("lib/connect.php");
include("lib/global.php");

if (is_login()) {
    if (is_admin()) {
        header("Location: admin.html");
    } else {
        header("Location: main.html");
    }
}

if ($_REQUEST['login'] != "" && $_REQUEST['password'] != "") {
    $err = enter($_REQUEST['login'], $_REQUEST['password']);
    if (count($err) > 0) {
        echo json_encode($err);
        //header('Content-Type: application/json');
    } else {
        if (is_admin()) {
            header("Location: admin.html");
        } else {
            header("Location: main.html");
        }
    }
}