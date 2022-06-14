<?php
function checkAuth($login, $password) {
    $users = require __DIR__ . '/BD.php';

    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            return true;
        }
    }

    return false;
}

function getLoginCookie() {
    $login_from_cookie = isset($_COOKIE['login']) ? $_COOKIE['login'] : '';
    $password_from_cookie = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';

    if (checkAuth($login_from_cookie, $password_from_cookie)) {
        return $login_from_cookie;
    }

    return null;
}

function checkAcc($login) {
    $users = require __DIR__ . '/BD.php';

    foreach ($users as $user) {
        if ($user['login'] === $login) {
            return false;
        }
    }

    return true;
}

function checkPass($password, $rep_password) {
    $users = require __DIR__ . '/BD.php';

    foreach ($users as $user) {
        if ($password === $rep_password) {
            return true;
        }
    }

    return false;
}