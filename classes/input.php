<?php
                require '../functions/sanitize.php';

                class Input {
                    public static function exists($type = 'post') {
                        switch($type) {
                            case 'post':
                                return (!empty($_POST)) ? true : false;
                            break;
                            case 'get':
                                return (!empty($_GET)) ? true : false;
                            break;
                            default:
                                return false;
                            break;
                        }
                    }

                    public static function checkLogin($userName, $Password) {
                        $msg = '';
                        if(!empty($userName) && !empty($Password)) {
                            $user1 = clean($userName);
                            $pass1 = clean($Password);
                            return true;
                        } else {
                            $msg = 'Error, try again';
                        }
                        return false;
                    }
                }

?>