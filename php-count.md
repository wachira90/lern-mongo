# php count reccord

````
<?php
$manager = new MongoDB\Driver\Manager("mongodb://root:example@172.16.1.5:27017/");

$db = 'interpoldb';
$collection = 'useradmin';
$db_collection = $db . '.' . $collection;

$Command = new MongoDB\Driver\Command(["count" => "{$collection}"]);

$res = $manager->executeCommand($db, $Command);

echo $res->toArray()[0]->n;

// foreach ($res as $r){
//     print_r($r->n);
// }
````
