<?php

class Level2 extends Level1
{
    var $file = null;
    var $category = array();
    var $key = null;

    function fileRead()
    {
        $this->file = file('input2.txt', FILE_IGNORE_NEW_LINES);
    }

    function searchCars($file)
    {
        if (in_array('CARS', $file)) {
            $item = array_search('CARS', $file) + 1;
            while ($item < count($file)) {
                $this->file[$item] = strtolower($file[$item]) . '(' . md5(strtolower($file[$item])) . ')';
                $item++;
            }
        }
    }

    function reverseCars($category)
    {
        $this->category["CARS"] = array_reverse($category['CARS']);
    }

}

$obj = new Level2();
$obj->fileRead();
$obj->searchCars($obj->file);
$obj->loop_search($obj->file, $obj->category);
$obj->reverseCars($obj->category);
$obj->view($obj->category);

