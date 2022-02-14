# search and or

## AND
````
try {

  $filter = array(
    '$and' => array(
      array('n_fname' => new MongoDB\BSON\Regex('ดล', 'i')),
      array('n_lname' => new MongoDB\BSON\Regex('บาร', 'i'))
    )
  );

  // $options = array('sort' => array('tst' => -1));
  // $options = array('sort' => array('OrderBy' => -1));
  $options = array('sort' => array('OrderBy' => -1), 'limit' => 15, 'skip' => 0);
  $query = new MongoDB\Driver\Query($filter, $options);
  $result = $this->conn->executeQuery("testdb.collection", $query);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result->toArray());

} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
  show_error('Error while fetching : ' . $ex->getMessage(), 500);
}
````    

## OR
````    
try {

  $filter = array(
    '$or' => array(
      array('n_fname' => new MongoDB\BSON\Regex('ดล', 'i')),
      array('n_lname' => new MongoDB\BSON\Regex('ดล', 'i'))
    )
  );

  // $options = array('sort' => array('tst' => -1));
  // $options = array('sort' => array('OrderBy' => -1));
  $options = array('sort' => array('OrderBy' => -1), 'limit' => 15, 'skip' => 0);
  $query = new MongoDB\Driver\Query($filter, $options);

  $result = $this->conn->executeQuery("interpoldb.rename", $query);

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($result->toArray());

} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
  show_error('Error while fetching : ' . $ex->getMessage(), 500);
}
````        
