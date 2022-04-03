## agregate join collection

````
<?php
$manager = new \MongoDB\Driver\Manager('mongodb://root:pass@192.168.6.150:27017');

$command = new MongoDB\Driver\Command([
    'aggregate' => 'user',
    'pipeline' => [
        [
            '$lookup' =>
            [
                'from' => 'rename',
                'localField' => 'n_fname',
                'foreignField' => 'rename.user_id',
                'as' => 'aaaa'
            ]
        ],
    ],
    'cursor' => new stdClass,
]);

$res =  $manager->executeCommand('interpoldb', $command);
$r = $res->toArray();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($r);
````
