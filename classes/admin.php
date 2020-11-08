<?php 
    require 'DB.php';
    
    class Admin extends DB {
        public $_table='admin';
        public  $_query, 
                $_error= false , 
                $_result, 
                $_count = 0;
        public function __construct()
        {
            Parent::getInstance();
        }

        public function query($sql, $params = array()) {
            $this->_error = false;

            if($this->_query = $this->_pdo->prepare($sql)) {
                if(count($params)) {
                    $x = 1;
                    foreach($params as $key) {
                        $this->_query->bindValue($x, $key);
                        $x++;
                    }
                }
            }

            if($this->_query->execute()) {
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }  else {
                $this->_error = true;
            }

            return $this;
        }

        public function action($action, $table, $where = array()) {
            if (count($where) === 3)  {
                $opreators = array('=', '>', '<', '>=', '<=');

                $field      = $where[0];
                $operator   = $where[1];
                $value      = $where[3];

                if(in_array($operator, $opreators)) {
                    $sql = "{$action}  FROM {$table} WHERE {$field} {$operator} ? ";
                    if(!$this->query($sql, array($value))->error()) {
                        return $this;
                    }   
                }
            }
            return false;
        }
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
                if(parent::query($sql, $value)) {
                    return true;
                }
            }
            return false;
        }
        public function first() {
            return $this->result()[0];
        }
    }


?>