<?php
$this->load->library('mongodb');

$collection1 = 'collection1';
$collection2 = 'collection2';
$collection3 = 'collection3';

$join1 = array(
    '$lookup' => array(
        'from' => $collection2,
        'localField' => 'field1',
        'foreignField' => 'field2',
        'as' => 'joined_data'
    )
);

$join2 = array(
    '$lookup' => array(
        'from' => $collection3,
        'localField' => 'field3',
        'foreignField' => 'field4',
        'as' => 'more_joined_data'
    )
);

$result = $this->mongodb->aggregate($collection1, array($join1, $join2));

/*
To join three collections in CodeIgniter with MongoDB, you can use the join() method of the MongoDB library in combination with the $lookup operator.

Here is an example of how you can use join() and $lookup to join three collections in CodeIgniter:

This will perform an inner join between collection1 and collection2 on the field1 and field2 fields, respectively, and the resulting joined data will be stored in the joined_data array. It will also perform an inner join between collection1 and collection3 on the field3 and field4 fields, respectively, and the resulting joined data will be stored in the more_joined_data array.

You can also use the leftJoin() method to perform a left outer join instead of an inner join.
*/
