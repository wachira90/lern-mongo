# php search

## code

````
$manager = new MongoDB\Driver\Manager("mongodb://root:example@172.16.1.5:27017/");

$db = 'testdb';
$collection = 'test1';
$db_collection = $db . '.' . $collection;

try {
    $filter = array('city' => new MongoDB\BSON\Regex('NCE', 'i'));
    $options = array('sort' => array('OrderBy' => -1),'limit'=>2);
    // $options = ['sort'=>array('_id'=>-1),'limit'=>100];
    
    $query = new MongoDB\Driver\Query($filter, $options);
    $res = $manager->executeQuery($db_collection, $query);
    // return $res;

    $i = 0;
    foreach ($res as $val) {
        $i++;
        echo " {$i} |  {$val->city}  |  {$val->loc}  |  {$val->pop} <br>";
    }
} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
    show_error('Error while fetching users: ' . $ex->getMessage(), 500);
}

````

## example data

````
{
    _id: ObjectId('61f01df4c9d8830007252e9a'),
    city: 'FLORENCE',
    loc: [
        -72.654245,
        42.324662
    ],
    pop: 27939,
    state: 'MA'
}
{
    _id: ObjectId('61f01df4c9d8830007252f17'),
    city: 'PRINCETON',
    loc: [
        -71.876245,
        42.450812
    ],
    pop: 3189,
    state: 'MA'
}
````
