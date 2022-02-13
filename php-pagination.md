# php pagination

````
$manager = new MongoDB\Driver\Manager("mongodb://root:example@192.168.6.150:27017/");
$db_collection = 'testdb.account';

try {
  $filter = array('products' => new MongoDB\BSON\Regex('Brokerage', 'i'));
  $options = array('sort' => array('OrderBy' => -1), 'limit' => 15, 'skip' => 2);
  //limit 15 = get per page 15 reccord
  //skip 2 = ignore 2 first reccord

  $query = new MongoDB\Driver\Query($filter, $options);
  $res = $manager->executeQuery($db_collection, $query);
  // return $res;

  $i = 0;
  foreach ($res as $val) {
    $i++;
    echo " {$i} |  {$val->account_id}  |  {$val->limit}  |  {} <br>";
  }
} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
  show_error('Error while fetching users: ' . $ex->getMessage(), 500);
}
````    
