<?php
    session_start();
    $GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => 'LilBump$26112001',
            'db' => 'again',
        ),
        'remember' => array(
            'cookie_name' => 'hash',
            'cookie_expiry' => 86400,
        ),
        'session' => array(
            'session_name' => array('user', 'admin', 'superadmin'),
        ),
    );
    spl_autoload_register(function($class) {
        require_once 'classes/'.$class .'.php';
    });

    require_once 'functions/sanitize.php';
?>