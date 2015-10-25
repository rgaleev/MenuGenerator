<?php
/**
 * User: Roman Galeev <romanrgaleev@gmail.com>
 * Date: 25/10/15
 * Time: 02:36
 */

spl_autoload_register(
    function ($class) {

        $prefixMap =[
            'Menu\\' => __DIR__ . '/Menu/',
            'Helpers\\' => __DIR__ . '/Helpers/',
        ];

        foreach ($prefixMap as $prefix => $dir) {
            $len = strlen($prefix);

            if (strncmp($prefix, $class, $len) !== 0) {
                continue;
            }
            $relativeClass = substr($class, $len);
            $file = $dir . str_replace('\\', '/', $relativeClass) . '.php';

            // если файл существует, подключаем его
            if (file_exists($file)) {
                require $file;
                return true;
            }
        }

        return false;
    }
);
