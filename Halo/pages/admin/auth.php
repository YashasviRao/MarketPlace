<?php
    session_start();

    // re-direct
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];

    if (isset($_POST['btn-logout'])) {
        unset($_SESSION['user']);
        unset($_SESSION['is-logged-in']);
        header('Location: '.$uri.'/Website');
        exit;
    } else if (isset($_POST['btn-login'])) {
        if ($_POST['user'] == 'admin' && $_POST['pass'] == 'abc') {
            $_SESSION['is-logged-in'] = true;
            $_SESSION['user'] = $_POST['user'];
        }
        header('Location: '.$uri.'/Website/pages/admin/admin.php');
        exit;
    }
?>