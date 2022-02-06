<?php

    class UserSessionConverter{

        public static function convertFromStdClass($data){
            try{

                if(is_array($data)){
                    $userSessionArray = [];

                    for($i = 0; $i < count($data); $i++){
                        if( get_class($data[$i]) == "stdClass"){
                            array_push(
                                $userSessionArray,
                                self::parseToUserSession($data[$i])
                            );

                        } else {
                            throw new Exception("This is not a valid stdClass! - $i");
                        }
                    }

                    return $userSessionArray;

                } else if(get_class($data) == "stdClass"){
                    return self::parseToUserSession($data);

                } else {
                    throw new Exception("This is not a valid stdClass!");
                }

            } catch(Exception $error){
                echo $error->getMessage();
            }
        }

        private static function parseToUserSession(stdClass $stdUserSession) : UserSession{

            
            $newUser = new UserSession(
                $stdUserSession->_id,
                $stdUserSession->username,
                $stdUserSession->password,
                $stdUserSession->userCategory
            );
            return $newUser;
        }
    }