<?php

class Level1
{
    var $file = null;
    var $category = array();
    var $key = null;

    function fileRead()
    {
        $this->file = file('input1.txt', FILE_IGNORE_NEW_LINES);
    }

    function loop_search($file, $category)
    {
        foreach ($file as $item => $testcase) {
            if (ctype_upper($testcase)) {
                $this->key = $testcase;
                continue;
            }
            $this->category[$this->key][] = $testcase;
        }
    }

    function view($category)
    {
        for ($i = 0, $size = count($category), $keys = array_keys($category); $i < $size; $i++) {
            $counts = array_count_values($category[$keys[$i]]);
            $category[$keys[$i]] = $counts;
            echo '<pre><h3>' . $keys[$i] . ':</h3></pre>';
            for ($j = 0, $item_k = array_keys($category[$keys[$i]]); $j < count($category[$keys[$i]]); $j++) {
                echo '<pre><h4>' . "&nbsp; -" . $item_k[$j] . ' : ' . $category[$keys[$i]][$item_k[$j]] . '</h4></pre>';
            }
        }

    }
}

$obj = new Level1();
$obj->fileRead();
$obj->loop_search($obj->file, $obj->category);
$obj->view($obj->category);

