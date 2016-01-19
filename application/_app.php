<?php

if (!isset($_GET['module'])) {
    $module = ucfirst(DEFAULT_MODULE);
}else {
    $module = ucfirst($_GET['module']);
}
    $controller = $module . "Controllersec";
    
    new $controller();
