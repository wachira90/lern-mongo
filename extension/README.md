# install extension

## download from 
````
https://pecl.php.net/package/mongodb
````

## php package (Thread Safe)
````
https://pecl.php.net/package/mongodb/1.12.0/windows
````

## php.ini 
````
extension=php_mongodb.dll
````

## test 
````
<?php
$dbhost = 'localhost';
$dbport = '27017';
$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");
print_r($conn);
//MongoDB\Driver\Manager Object ( [uri] => mongodb://localhost:27017 [cluster] => Array ( ) )
?>
````

