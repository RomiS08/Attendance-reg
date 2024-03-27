

<?php 

    class user{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }


        public function insertUser($username,$password){

            try {
                $result = $this->getUserbyUsername($username);  // if there's any user with similar name (checked with num column) it will return as false
                if($result['num'] > 0){
                    return false;
                
                }else{
                    $new_password = md5($password.$username);  // Password encrypted from plain text to some hashing values combining username and password Using "md5" which is a php build in function 
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $password);
                    $stmt->bindparam(':password', $new_password);  // Use the hashed password
                    $stmt->execute();
                    return true;
                }

                
            } catch(PDOException $e) {
                error_log($e->getMessage());
                return false;
            }

        }

        public function getUser($username,$password){

            try{

                $sql = "SELECT * FROM `users` WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            }catch(PDOException $e) {
                error_log($e->getMessage());
                return false;
            }
        }

    // ---- This Function work for to make sure avoid enter 2 users with same username 
       
        public function getUserbyUsername($username){

            try{

                $sql = "SELECT count(*) as num FROM `users` WHERE username = :username";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e) {
                error_log($e->getMessage());
                return false;
            }
        }

    }
?>