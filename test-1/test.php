<?php

require __DIR__ . '/functions/searchCategory.php';

$categories = require __DIR__ . '/resources/categories.php';

if ($argc > 1) {
    unset($argv[0]);
    foreach ($argv as $categoryId) {
        var_dump(searchCategory($categories, $categoryId));
    }
    return;
}

$categoryId = 3;

var_dump(searchCategory($categories, $categoryId));