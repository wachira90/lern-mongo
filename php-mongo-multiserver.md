# php mongo multiserver

````
$managers = [
    new MongoDB\Driver\Manager('mongodb://127.0.0.1'),
    new MongoDB\Driver\Manager('mongodb://127.0.0.1'),
    new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017'),
    new MongoDB\Driver\Manager('mongodb://rs1.example.com,rs2.example.com/', ['replicaSet' => 'myReplicaSet']),
];
foreach ($managers as $manager) {
    $manager->executeCommand('test', new MongoDB\Driver\Command(['ping' => 1]));
}
````
