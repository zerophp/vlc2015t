<?php
function insertUser($filterdata, $filename)
{
    foreach ($filterdata as $key => $value)
    {
        if(is_array($value))
            $filterdata[$key]=implode(',',$value);
    }
    $filterdata[]=$_FILES['photo']['name'];
    file_put_contents($filename, implode("|",$filterdata)."\n", FILE_APPEND);
    return $filterdata;
}