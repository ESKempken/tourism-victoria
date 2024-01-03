<?php

class dbController {

    private $connect;

    //Pull db details from config.php and insert into variables 
    public function __construct ($host,$user,$pass,$db) {
        $this->connect = new mysqli(
            $this->host = $host,
            $this->user = $user,
            $this->pass = $pass,
            $this->db = $db
        );
        if($this->connect->connect_error) {
            exit(
                '<a href="insert_form.php" class="return">Return</a>
                <p>Connection to database failed<br></p>');
        }       //return to form as home page (display_all.php) still requires db connection
    return $this->connect;
    }

    //Execute SQL quary
    public function executeQuery($sqlquery){
        $this->connect->query($sqlquery);

        if($this->connect->error){
            $this->logError($this->connect->error);
            exit();
        } else {
            return true; //Query executed
        }
    }

    //Move upoaded file to folder (images/)         $dest is the same value as $image (passed at bottom of insert.php)
    public function uploadImage($temp,$dest) {
        
        if(move_uploaded_file($temp,$dest)){        //Image succesfully moved
        } else {
            echo '<p>Image not moved<br></p>';
            $this->logError("Image $temp was NOT moved to $dest");
        }
    }

    //Error Log: Record SQL error into file (logs/tv_error.log)
    private function logError($error) {
        error_log("SQL Error: $error".PHP_EOL,3,"logs/tv_error.log");
        exit(
            '<div class="tile"> 
            <h3 class="header">Something went wronge. Return to try again.</h3>
            <a href="insert_form.php" class="return">Return</a>
        </div>' );
    }

    //Server data cleansing functions
    public function cleanUp($value) {
        $value = trim($value);  //removes white space surrounding value
        $value = htmlentities($value);  //convert hamfull symbols '>[}->" into html entities
        $value = $this->connect->real_escape_string($value); //convert injected escape stringes into safe text '...the man's bag...' -> '...the man/'s bag...'
        return $value;
    }




    //End of ass 1.1 scope              (Insert records)
    //Beginning of ass 1.2 scope        (Get records)


    ////THIS FUNCTION IS NOT USE IN MY FINAL WEBSITE, AS IT WAS SUBSTITUTED FOR display_all.php (USED 'LIMIT 1' IN SQL QUERY).
    //IT IS HOWEVER REQUIRED AS PART OF THIS ASSESSMENT (PART C).

    //get ONE record from db and store as result
    // public function getOneRecord($sql) {
    //     $result = $this->connect->query($sql);
    //     //query results to array array - $result to $row
    //     $row = $result->fetch_assoc();

    //     return $row;
    // } 

    //get ALL records and place each inside result inside resultset array
    public function getAllRecords($sql) {
        $result = $this->connect->query($sql);
        //query results to array - $result to $row array
        while ($row = $result->fetch_assoc()){
            //result array to array - $row to $resultset array
            $resultset[] = $row;
        }

        return $resultset;
    }

    //prepare search
    public function prepareSearch($sql, $search, $search2) {
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ss", $search, $search2); 
        $stmt->execute();
        $result = $stmt->get_result(); 
        $resultset = $result->fetch_all(MYSQLI_ASSOC);

        if(!$stmt) {
            //exit ("prepare failed: ".$this->conn->error);
            $this->logError($this->connect->error);
        }

        return $resultset;
    }

}

?>