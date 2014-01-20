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

<!--<a href="logout.php">Logout</a>-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Администратор</title>
    <link rel='shortcut icon' href="img/favicon.ico" type='image/x-icon' />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/kendo/kendo.common.min.css">
    <link rel="stylesheet" href="css/kendo/kendo.uniform.min.css">
    <link rel="stylesheet" href="css/base.css" >
    <script src="js/kendo/jquery.min.js" ></script>
    <script src="js/kendo/kendo.web.min.js" ></script>
    <script src="js/kendo/cultures/kendo.culture.ru-RU.min.js" ></script>
    <script src="js/noty/jquery.noty.js" ></script>
    <script src="js/noty/layouts/top.js" ></script>
    <script src="js/noty/layouts/topCenter.js" ></script>
    <script src="js/noty/layouts/center.js" ></script>
    <script src="js/noty/themes/default.js" ></script>
    <script src="js/base.js" ></script>
    <script src="js/admin/admin.js" ></script>
</head>
<body>
    <header>
        <div id="logo"></div>
        <div id="line_top" class="hr_line"></div>
    </header>

    <div id="content">
        <div id="tab_strip">
            <ul>
                <li class="k-state-active">
                    Подразделение
                </li>
                <li>
                    Авторы
                </li>
            </ul>
            <div>
                <div id="subdivision"></div>
            </div>
            <div>

            </div>
        </div>
    </div>

    <footer>
        <div id="line_bottom" class="hr_line"></div>
        <span id="copyright">&#169;2014 СКБ СТУ</span>
    </footer>
</body>
</html>