<?php
spl_autoload_register(function (String $class) {

    $sourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'src';
    $replaceRootPath = str_replace('App', $sourcePath, $class);
    $replaceDirectorySeparator = str_replace('\\', DIRECTORY_SEPARATOR, $replaceRootPath);
    $filePath = $replaceDirectorySeparator . '.php';
    if (file_exists($filePath)) {
        require($filePath);
    }

});
