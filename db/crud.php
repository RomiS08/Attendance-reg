<?php
class crud {
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function insert($fname, $lname, $dob, $email, $telephone, $specialty){
        try {
            $sql = "INSERT INTO attandee (firstname, lastname, dateofbirth, emailaddress, telephone, specialty_id) VALUES (:fname, :lname, :dob, :email, :telephone, :specialty)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':telephone', $telephone);
            $stmt->bindparam(':specialty', $specialty);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function editAttendee($id, $fname, $lname, $dob, $email, $telephone, $specialty){
        try {
            $sql = "UPDATE `attandee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob, `emailaddress`=:email,`telephone`=:telephone,`specialty_id`=:specialty WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':telephone', $telephone);
            $stmt->bindparam(':specialty', $specialty);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function getAttendees(){
        try{

            $sql = "SELECT * FROM `attandee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;

        }catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        
    }

    public function getAttendeeDetails($id){
        try{

            $sql = "SELECT * FROM `attandee` a inner join specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        }catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        
        
    }

    public function getSpecialtyById($specialty_id){
        try{

            $sql = "SELECT * FROM `specialties` WHERE specialty_id = :specialty_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':specialty_id', $specialty_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            
        }catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    
}

    public function deleteAttendee($id){
        try{
            $sql = "delete from attandee WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam (':id', $id);
            $stmt->execute();
            return true;

        } catch (PDOException $e){
            error_log($e->getMessage());
            return false;
        }
    }

    public function getSpecialties(){
        try {

            $sql = "SELECT * FROM `specialties`;";
            $result = $this->db->query($sql);
            return $result;

        }catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        
    }
}


?>