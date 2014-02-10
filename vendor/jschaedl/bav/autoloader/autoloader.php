<?php

return function($class) {
    
    if (substr($class, 0, 3) !== 'Bav') return;
    
    $file = __DIR__ . '\\..\\library\\' . $class . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);

    require_once($file);
    
};