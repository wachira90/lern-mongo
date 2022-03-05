# Create an Index

````
// Using MongoDB\Driver\Manager

$db = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new \MongoDB\Driver\Query(['createIndex' => ['topic_name' => 1]]);
$db->executeQuery('abi_db.subjects', $query);


// Using PHP Library


$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->abi_db;
$collection = $db->subjects;
$indexName = $collection->createIndex(['topic_name' => 1]);

````


# Create a Unique Index

````
// Using MongoDB\Driver\Manager

$db = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new \MongoDB\Driver\Query(['createIndex' => ['topic_name' => 1], ['unique' => 1]]);
$db->executeQuery('abi_db.subjects', $query);


// Using PHP Library


$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->abi_db;
$collection = $db->subjects;
$indexName = $collection->createIndex(['topic_name' => 1],['unique' => 1]);
````
