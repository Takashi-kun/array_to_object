<?php
class testArray {
    public function array_to_object($arr) {
        if (is_array($arr) === true) {
            $obj = new stdClass();
            foreach ($arr as $key => $val) {
                if (is_array($val) === true) {
                    $obj->$key = $this->array_to_object($val);
                } else {
                    $obj->$key = $val;
                }
            }
            return $obj;
        } else {
            return $arr;
        }
    }

    public function confirmer($val) {
        var_dump(is_array($val));
        echo '<br>';
        var_dump(is_object($val));
        echo '<br>';
        var_dump($val);
        echo '<br><br>';
    }
}
$ta = new testArray();
$t1 = array(
    'test1' => 1,
    'test2' => 2,
    'test3' => 3
);
$ret_t1 = $ta->array_to_object($t1);
$ta->confirmer($ret_t1);

$t2 = array(
    't1' => array(
        't11' => 1,
        't12' => 2
    ),
    't2' => 3
);
$ret_t2 = $ta->array_to_object($t2);
$ta->confirmer($ret_t2);

$t3 = array(
    't1' => array(
        't11' => 1,
        't12' => 2
    ),
    't2' => array(
        't21' => array(
            't211' => 211,
            't212' => 212,
            't213' => 'hogehoge',
            't214' => array(
                't2141' => 'hoge',
                't2142' => 'fuga',
                't2143' => array(
                    'ttt' => 'ttttttt',
                    'last_tt' => array(
                        'last_1' => 'LLLL',
                        'last_2' => 'AAAA',
                        'last_3' => array(
                            'last_4' => 'SSSS',
                            'last_5' => 'TTTT'
                        )
                    )
                )
            )
        )
    )
);
$ret_t3 = $ta->array_to_object($t3);
$ta->confirmer($ret_t3);

var_dump($ret_t3->t2->t21->t214->t2143->last_tt->last_3->last_4);







