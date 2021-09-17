<?php

use Box\Box;
use Box\Repository\DbBox;
use Box\Repository\FileBox;

require __DIR__ . '/vendor/autoload.php';

// file
FileBox::create([
    'dir' => __DIR__ . '/storage/box',
]);

Box::setRepostitory(FileBox::class);

testBox();

// database
DbBox::create([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'box',
    'username' => 'mysql',
    'password' => 'mysql',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

Box::setRepostitory(DbBox::class);

testBox();

// util
function testBox() {
    /** static */
    Box::setData('key1', 'value1');
    var_dump(Box::getData('key1')); // value1

    Box::setData('key2', [1, 2, 3]);
    Box::save();
    Box::clearData();
    var_dump(Box::getData('key2')); // null

    Box::load();
    var_dump(Box::getData('key2')); // value2

    /** instance */
    $box = new Box;
    $box->setData('key1', 'value1');
    var_dump($box->getData('key1')); // value1

    $box->setData('key2', [1, 2, 3]);
    $box->save();
    $box->clearData();
    var_dump($box->getData('key2')); // null

    $box->load();
    var_dump($box->getData('key2')); // value2

    /** clone */
    $boxClone = clone $box;
    $boxClone->setData('key1', 'value1');
    var_dump($boxClone->getData('key1')); // value1

    $boxClone->setData('key2', [1, 2, 3]);
    $boxClone->save();
    $boxClone->clearData();
    var_dump($boxClone->getData('key2')); // null

    $boxClone->load();
    var_dump($boxClone->getData('key2')); // value2

    Box::clearData();
}

