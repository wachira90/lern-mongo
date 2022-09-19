INSTALL MONGO UBUNTU 20.04

````
https://www.digitalocean.com/community/tutorials/how-to-install-mongodb-on-ubuntu-20-04

curl -fsSL https://www.mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -

apt-key list

echo "deb [ arch=amd64,arm64 ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/4.4 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.4.list

apt update

apt install mongodb-org
````

````
systemctl start mongod.service

systemctl restart mongod.service

systemctl enable mongod.service

systemctl status mongod.service
````


````
mongo --eval 'db.runCommand({ connectionStatus: 1 })'
````


## FIREWALL
````
https://www.digitalocean.com/community/tutorials/how-to-configure-remote-access-for-mongodb-on-ubuntu-20-04

sudo ufw allow from trusted_machine_ip to any port 27017

sudo ufw status
````

nano /etc/mongod.conf

````
# network interfaces
net:
  port: 27017
  bindIp: 127.0.0.1

````

## shell login 

````
mongo

show dbs

use admin

db.createUser( { 
    user: "accountAdmin01",
    pwd: passwordPrompt(),  // Or  "<cleartext password>"
    customData: { employeeId: 12345 },
    roles: [ { role: "clusterAdmin", db: "admin" },
            { role: "readAnyDatabase", db: "admin" },
            "readWrite"] }, { w: "majority" , wtimeout: 5000 } )
````    
````
use admin

db.createUser(
   {
     user: "root",
     pwd: "Innovisor@123",
     roles: [ "readWrite", "dbAdmin" ],
     mechanisms: [ "SCRAM-SHA-256" ]
   }
)



use reporting
db.createUser(
   {
     user: "reportUser256",
     pwd: passwordPrompt(),   // Or  "<cleartext password>"
     roles: [ { role: "readWrite", db: "reporting" } ],
     mechanisms: [ "SCRAM-SHA-256" ]
   }
)


use reporting
db.createUser(
   {
     user: "root",
     pwd: passwordPrompt(),   // Or  "<cleartext password>"
     roles: [ { role: "readWrite", db: "reporting" } ],
     mechanisms: [ "SCRAM-SHA-256" ]
   }
)
````
  
````  
db.createUser({
user: "root",
pwd: "Innovisor@123",
roles: [ { role: "userAdminAnyDatabase", db: "admin" }, "readWriteAnyDatabase" ]
})

db.createUser({
user: "admininno",
pwd: "Innovisor@123",
roles: [ { role: "userAdminAnyDatabase", db: "admin" }, "readWriteAnyDatabase" ]
})
````  
=======================
````
db.createUser({
user: "admininno",
pwd: passwordPrompt(),
roles: [ { role: "userAdminAnyDatabase", db: "admin" }, "readWriteAnyDatabase" ]
})
````


======CHANGE_PASSWORD==========

mongo

use admin

use products
db.changeUserPassword("root", passwordPrompt())

use admin
db.changeUserPassword("root", "pass1234")

use admin
db.changeUserPassword("admininno", "pass1234")
===============
````
mongo admin -u root -p 'pass1234'
````  
  
  
  
nano /etc/mongod.conf  

````
security
  authorization: enabled
````  

