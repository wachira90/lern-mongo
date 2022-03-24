# php insert return ID

## example 1

````
$manager = new MongoDB\Driver\Manager("mongodb://root:example@172.16.1.5:27017");
$query = new MongoDB\Driver\Query([], ['batchSize' => 2]);

$bulk = new MongoDB\Driver\BulkWrite;
$_id = $bulk->insert(['x' => date("Y-m-d H:i:s")]);
// $bulk->insert(['x' => 2]);
// $bulk->insert(['x' => 3]);
$res = $manager->executeBulkWrite('test.test', $bulk);
$cursor = $manager->executeQuery('test.test', $query);
echo '<pre>';
print_r($_id);
````

## example 2
````
$bulk = new MongoDB\Driver\BulkWrite;

$document1 = ['title' => 'one'];
$document2 = ['_id' => 'custom ID', 'title' => 'two'];
$document3 = ['_id' => new MongoDB\BSON\ObjectId, 'title' => 'three'];

$_id1 = $bulk->insert($document1);
$_id2 = $bulk->insert($document2);
$_id3 = $bulk->insert($document3);

var_dump($_id1, $_id2, $_id3);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$result = $manager->executeBulkWrite('db.collection', $bulk);
````
