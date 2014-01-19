<?php
session_start();

function is_login() {
    if (isset($_SESSION['id'])) { //если сеcсия есть
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) { //если cookie есть, то просто обновим время их жизни и вернём true
            $query = "SELECT * FROM users WHERE login='".$_COOKIE['login']."'";
            $rez = mysql_query($query); //запрашиваем строку из БД с логином из куки
            if (mysql_num_rows($rez) == 1) {
                $row = mysql_fetch_assoc($rez);
                if ($_COOKIE['password'] == md5($row['login'].$row['password']) && $_SESSION['id'] == $row['id']) {
                    SetCookie("login", "", time() - 1, '/');
                    SetCookie("password", "", time() - 1, '/');
                    SetCookie("login", $_COOKIE['login'], time() + 50000, '/'); //TODO: переправить на 8 часов
                    SetCookie("password", $_COOKIE['password'], time() + 50000, '/');
                    return true;
                } else {
                    return false; //id куков не совпадает с id сессии
                }
            } else {
                SetCookie("login", "", time() - 1, '/'); //левые куки
                SetCookie("password", "", time() - 1, '/');
                return false;
            }
        } else {
            unset($_SESSION['id']); // сессия без куков
            return false;
        }
    } else { //если сессии нет, то проверим существование cookie
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) { //если куки существуют, то удаляем их
                SetCookie("login", "", time() - 360000, '/');
                SetCookie("password", "", time() - 360000, '/');
                return false;
            } else {//если куки не существуют
                return false;
            }
    }
}

function enter($login,$password) {
    $error = array(); //массив для ошибок
    if ($login != "" && $password != "") { //если поля заполнены
        $query = "SELECT * FROM users WHERE login='".$login."'";
        $rez = mysql_query($query); //запрашиваем строку из БД с логином, введённым пользователем
        if (mysql_num_rows($rez) == 1) {
            $row = mysql_fetch_assoc($rez);
            if (md5(md5($password).$row['salt']) == $row['password']) {
                setcookie("login", $row['login'], time() + 50000); //TODO: переправить на 8 часов
                setcookie("password", md5($row['login'].$row['password']), time() + 50000);
                $_SESSION['id'] = $row['id'];
                return $error;
            } else { //если пароли не совпали
                $error[] = "Неверный пароль";
                return $error;
            }
        } else { //если такого пользователя не найдено в БД
            $error[] = "Неверный логин и пароль";
            return $error;
        }
    } else {
        $error[] = "Поля не должны быть пустыми!";
        return $error;
    }
}

function out() {
    unset($_SESSION['id']);
    SetCookie("login", "", time() - 1, '/');
    SetCookie("password", "", time() - 1, '/');
    header('Location: login.php');
}

function is_admin() {
    $id = $_SESSION['id'];
    $rez = mysql_query("SELECT is_admin FROM users WHERE id='$id'");
    if (mysql_num_rows($rez) == 1) {
        $is_admin = mysql_result($rez, 0);
        if ($is_admin == 1)
            return true;
        else
            return false;
    } else {
        return false;
    }
}