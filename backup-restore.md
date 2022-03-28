# backup restore mongo

## backup export

````
mongodump --db=testdb --username=root --password="example" --authenticationDatabase=admin --out=/tmp/mongodump-2022-03-28
````

## restore import

````
mongorestore --username=root --password="example" --authenticationDatabase=admin /tmp/mongodump-2022-03-28
````
