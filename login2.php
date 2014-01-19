<!DOCTYPE HTML>
<html>
<head>
    <title>Войти</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/kendo/kendo.common.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/kendo/kendo.bootstrap.min.css"/>
    <script src="js/kendo/jquery.min.js"></script>
    <!--<script src="js/kendo/kendo.web.min.js" ></script>-->
    <!--<script src="js/kendo/cultures/kendo.culture.ru-RU.min.js" ></script>-->
    <script src="js/noty/jquery.noty.js" ></script>
    <!--<script src="js/noty/layouts/top.js" ></script>-->
    <script src="js/noty/layouts/topCenter.js" ></script>
    <!--<script src="js/noty/layouts/center.js" ></script>-->
    <script src="js/noty/themes/default.js" ></script>
    <script src="js/base.js"></script>
    <script src="js/login/login.js"></script>
</head>

<body>
<form class="box login">
    <fieldset class="boxBody">
        <label>Имя пользователя</label>
        <input type="text" name="login" tabindex="1" placeholder="Имя пользователя" autofocus="autofocus" required>
        <label><a href="#" class="rLink" tabindex="5">Напомнить пароль?</a>Пароль</label>
        <input type="password" name="password" placeholder="Пароль" tabindex="2" required>
    </fieldset>
    <footer>
        <!-- <label><input type="checkbox" tabindex="3">Не выходить из системы</label> -->
        <input type="submit" class="k-button" value="Войти" tabindex="4">
    </footer>
</form>
<footer id="main">

</footer>
</body>
</html>
