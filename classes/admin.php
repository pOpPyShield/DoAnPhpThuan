<?php 
    require 'DB.php';
    
    class Admin extends DB {
        public $_table='admin';

        public static function login($action,$fields = array()) {
            global $_table;
            if(count($fields) === 6) {
                $operator = '=';
                $field = $fields[0];
                $field1 = $fields[1];
                $field2 = $fields[2];
                $field3 = $fields[3];
                $value = array($fields[4], $fields[5]);
                        //SELECT * FROM admin       WHERE   username       =     ?   AND      Password      =       ?
                $sql = "{$action} * FROM {$_table} {$field} {$field1} {$operator} ? {$field3}  {$field2} {$operator} ?";
                echo $sql;
                /*if(!parent::query($sql, $value)->error()) {
                    return true;
                }*/
            }
            //return false;
        }
    }


?>