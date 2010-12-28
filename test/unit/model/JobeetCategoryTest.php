<?php

include(dirname(__FILE__) . '/../../bootstrap/Doctrine.php');

$t = new lime_test(1);

$t->comment('->save()');
$category = new JobeetCategory();
$category->fromArray(array('name' => 'Billing'));
$category->save();
$t->is($category->getSlug(), 'billing', '->save() auto slug the name');
?>
