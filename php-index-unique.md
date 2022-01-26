# php-index-unique

db = example

collection = testtb

filed = age

````
$this->load->library('mongodb');
$this->conn = $this->mongodb->getConn();

// $db = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new \MongoDB\Driver\Query(['createIndex' => ['age' => 1]]);
$res = $this->conn->executeQuery('example.testtb', $query);
echo '<pre>';
print_r($res);
````
