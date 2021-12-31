# find text

## this document

````
{
  "post_text": "enjoy the mongodb articles on tutorialspoint",
  "tags": ["mongodb", "tutorialspoint"]
}
{
  "post_text" : "writing tutorials on mongodb",
  "tags" : [ "mongodb", "tutorial" ]
}
````
## createIndex
````
db.posts.createIndex({post_text:"text"})
{
  "createdCollectionAutomatically" : true,
  "numIndexesBefore" : 1,
  "numIndexesAfter" : 2,
  "ok" : 1
}
````
## find
````
db.posts.find({$text:{$search:"tutorialspoint"}}).pretty()
{
  "_id" : ObjectId("5dd7ce28f1dd4583e7103fe0"),
  "post_text" : "enjoy the mongodb articles on tutorialspoint",
  "tags" : [
    "mongodb",
    "tutorialspoint"
  ]
}
````
