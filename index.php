<?php
include("lib/connect.php");
include("lib/global.php");

if (is_login()) {
    if (is_admin()) {
        header("Location: admin.html");
    } else {
        header("Location: main.html");
    }
} else {
    header("Location: login.html");
}