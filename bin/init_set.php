<?php

$userDefineFile = getcwd() . '/bin/user_init_set.php';
if (file_exists($userDefineFile)) {
    require_once $userDefineFile;
} else {
    initSet();
}

function initSet() {
    ini_set('display_errors', 1);
    ini_set('memory_limit', '1G');
}
