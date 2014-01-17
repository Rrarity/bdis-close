<?php
function is_login()
{
    ini_set("session.use_trans_sid", true);
    session_start();
    if (isset($_SESSION['id'])) //если сеcсия есть
    {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) { //если cookie есть, то просто обновим время их жизни и вернём true
            SetCookie("login", "", time() - 1, '/');
            SetCookie("password", "", time() - 1, '/');
            setcookie("login", $_COOKIE['login'], time() + 50000, '/');
            setcookie("password", $_COOKIE['password'], time() + 50000, '/');
            return true;
        } else //иначе добавим cookie с логином и паролем, чтобы после перезапуска браузера сессия не слетала
        {
            $rez = mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'"); //запрашиваем строку с искомым id
            if (mysql_num_rows($rez) == 1) { //если получена одна строка
                $row = mysql_fetch_assoc($rez); //записываем её в ассоциативный массив
                setcookie("login", $row['login'], time() + 50000, '/');
                setcookie("password", md5($row['login'] . $row['password']), time() + 50000, '/');

                return true;
            } else
                return false;
        }
    } else //если сессии нет, то проверим существование cookie. Если они существуют, то проверим их валидность по БД
    {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если куки существуют.
        {
            $rez = mysql_query("SELECT * FROM users WHERE login='{$_COOKIE['login']}'"); //запрашиваем строку с искомым логином и паролем
            @$row = mysql_fetch_assoc($rez);
            if (@mysql_num_rows($rez) == 1 && md5($row['login'] . $row['password']) == $_COOKIE['password']) //если логин и пароль нашлись в БД
            {
                $_SESSION['id'] = $row['id']; //записываем в сесиию id

                return true;
            } else //если данные из cookie не подошли, то удаляем эти куки, ибо нахуй они такие нам не нужны
            {
                SetCookie("login", "", time() - 360000, '/');
                SetCookie("password", "", time() - 360000, '/');
                return false;
            }
        } else //если куки не существуют
        {
            return false;
        }
    }
}

function enter($login,$password)
{
    $error = array(); //массив для ошибок
    if ($login != "" && $password != "") //если поля заполнены
    {
        $query = "SELECT * FROM users WHERE login='".$login."'";
        $rez = mysql_query($query); //запрашиваем строку из БД с логином, введённым пользователем
        if (mysql_num_rows($rez) == 1) //
        {
            $row = mysql_fetch_assoc($rez);
            if (md5(md5($password).$row['salt']) == $row['password'])
            {
                setcookie("login", $row['login'], time() + 50000);
                setcookie("password", md5($row['login'] . $row['password']), time() + 50000);
                $_SESSION['id'] = $row['id'];
                return $error;
            } else //если пароли не совпали
            {
                $error[] = "Неверный пароль";
                return $error;
            }
        } else //если такого пользователя не найдено в БД
        {
            $error[] = "Неверный логин и пароль";
            return $error;
        }
    } else {
        $error[] = "Поля не должны быть пустыми!";
        return $error;
    }
}

function out() {
    session_start();
    unset($_SESSION['id']);
    SetCookie("login", "");
    SetCookie("password", "");
    //header('Location: login.html');
}

function is_admin() {
    $id = $_SESSION['id'];
    $rez = mysql_query("SELECT is_admin FROM users WHERE id='$id'");
    if (mysql_num_rows($rez) == 1)
    {
        $is_admin = mysql_result($rez, 0);
        if ($is_admin == 1)
            return true;
        else
            return false;
    }
    else
        return false;
}