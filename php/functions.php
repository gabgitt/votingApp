<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 12/17/15
 * Time: 12:39 PM
 */

function getDepartment($dept){
    $query = "SELECT department_id FROM departments WHERE
          department= '$dept';";
    $result= mysql_query($query);
    $toPrint= mysql_fetch_row($result);
    return $toPrint[0];
}