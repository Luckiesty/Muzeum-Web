<?php 
    class DB_Kontroller
    {
        private $DB_servername = "localhost";
        private $DB_username = "root";
        private $DB_password = "";
        private $DB_name = "darkbluemoon";
        private $conn;

        function __construct()
        {
            $this->conn = $this->connect_DB();
        }
        function connect_DB()
        {
            $conn = mysqli_connect($this->DB_servername,$this->DB_username,$this->DB_password,$this->DB_name);
            return $conn;
        }
        function runQuery($query)
        {
            $result = mysqli_query($this->conn, $query);
            while($row=mysqli_fetch_assoc($result))
            {
                $resultSet[] = $row;
            }
            if(!empty($resultSet))
            {
                return $resultSet;
            }
        }

        function numRows($query)
        {
            $result = mysqli_query($this->conn, $query);
            $rowcount = mysqli_num_rows($result);
            return $rowcount;
        }
    }

    
    
?>