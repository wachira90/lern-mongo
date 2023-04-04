# upload gridfs file

## upload *.pdf file

```py
#!python
import os
import datetime
from pymongo import MongoClient
import gridfs

def mongo_conn():
	try:
		conn = MongoClient('mongodb://user:pass@172.16.1.5:27017/?authSource=admin')
		print('MongoDB Connected', conn)
		return conn.gridfs_file
	except Exception as e:
		print('Error in MongoDB Connection: ', e)

db = mongo_conn()		
# name = 'book.pdf'
# file_location = "/tmp/" + name
name = r"book.pdf"

x = datetime.datetime.now()
stamp = x.strftime("%Y-%m-%d_%H-%M-%S_%f")

file_location = name
file_data = open(file_location,"rb")
data = file_data.read()
fs = gridfs.GridFS(db)
# fs.put(data, filename = stamp + '_' + name)
fs.put(data, filename = name)
print('upload complete')


data = db.fs.files.find_one({'filename':name})
my_id = data['_id']
outputdata = fs.get(my_id).read()
# download_location = "/tmp/" + name
# download_location = stamp + "_" + name
download_location = stamp + "_download.pdf"
output = open(download_location, "wb")
output.write(outputdata)
output.close()
print('download complete')
```
