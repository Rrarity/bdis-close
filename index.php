<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == "admin") {
        header("Location: admin.html");
    } else if ($_SESSION['user'] == "user") {
        header("Location: main.html");
    }
} else {
    header("Location: login.html");
}