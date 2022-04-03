# php get one id

````
function get_user($_id)
{
  try {
    $filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
    $query = new MongoDB\Driver\Query($filter);
    $result = $this->conn->executeQuery("db.coll", $query);
    foreach ($result as $user) {
      return $user;
    }
    return NULL;
  } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
    show_error('Error while fetching user: ' . $ex->getMessage(), 500);
  }
}
````
