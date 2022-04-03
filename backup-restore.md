# backup restore mongo

## backup export

````
mongodump --db=testdb --username=root --password="example" --authenticationDatabase=admin --out=/tmp/mongodump-2022-03-28
````

## restore import

````
mongorestore --username=root --password="example" --authenticationDatabase=admin /tmp/mongodump-2022-03-28
````

## backup export docker

````
docker exec mongo1_mongo_1 mongodump \
	--db=interpoldb \
	--username=root --password="example" \
	--authenticationDatabase=admin \
	--out=/data/mongodump-2022-04-03
````

## restore import docker

````
docker exec mongo1_mongo_1 mongorestore \
	--username=root --password="example" \
	--authenticationDatabase=admin /tmp/mongodump-2022-04-03
````
