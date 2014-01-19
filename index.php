<?php
include("lib/connect.php");
include("lib/global.php");

if (is_login()) {
    if (is_admin()) {
        header("Location: admin.php");
    } else {
        header("Location: main.php");
    }
} else {
    header("Location: login.php");
}