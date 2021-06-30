<?php

$userDefineFile = getcwd() . '/bin/user_define.php';
if (file_exists($userDefineFile)) {
    require_once $userDefineFile;
} else {
    defineData();
}

function defineData() {
    if (! defined('CONFIG_DIR')) {
        define('CONFIG_DIR', getcwd() . '/config');
    }
    
    if (! defined('RESULT_DIR')) {
        define('RESULT_DIR', getcwd() . '/result');
    }
    
    if (! defined('BODY_CONFIG_PATH')) {
        define('BODY_CONFIG_PATH', CONFIG_DIR . '/body.yaml');
    }
    
    if (! defined('HEAD_CONFIG_PATH')) {
        define('HEAD_CONFIG_PATH', CONFIG_DIR . '/head.yaml');
    }
    
    if (! defined('PROVIDER_CONFIG_PATH')) {
        define('PROVIDER_CONFIG_PATH', CONFIG_DIR . '/provider.yaml');
    }
    
    if (! defined('RESULT_DIRECTION')) {
        define('RESULT_DIRECTION', RESULT_DIR . '/result.html');
    }
}