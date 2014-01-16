<?php
session_start();
if ($_REQUEST['user'] == "admin" && $_REQUEST['password'] == "admin") {
    $_SESSION['user'] = "admin";
    header("Location: admin.html");
} else
    if ($_REQUEST['user'] == "user" && $_REQUEST['password'] == "user") {
        $_SESSION['user'] = "user";
        header("Location: main.html");
    } else {
        header("Location: login.html");
    }