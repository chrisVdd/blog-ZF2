<?php
// This file is use for merging all config files in different modules

/** @var array $config */
$config = [];

foreach (glob(__DIR__ . '/autoload/*{,.local}.php', GLOB_BRACE) as $file) {

    $config = array_merge_recursive($config, include $file);
}

return $config;

