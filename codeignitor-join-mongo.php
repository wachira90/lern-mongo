<?php
$this->load->library('mongodb');

$collection1 = 'collection1';
$collection2 = 'collection2';

$join = array(
    '$join' => array(
        'from' => $collection2,
        'localField' => 'field1',
        'foreignField' => 'field2',
        'as' => 'joined_data'
    )
);

$result = $this->mongodb->aggregate($collection1, array($join));
/*
To join two tables in CodeIgniter with MongoDB, you can use the join() method of the MongoDB library.

Here is an example of how you can use join() to join two tables in CodeIgniter:

This will perform an inner join between collection1 and collection2 on the field1 and field2 fields, respectively. The resulting joined data will be stored in the joined_data array.

You can also use the leftJoin() method to perform a left outer join.
*/
