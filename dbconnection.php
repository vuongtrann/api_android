<?php
class DBConnection{
    private $host =  "localhost";
    private $db_name = "dbsinhvien";
    private $username = "root";
    private $password = "Quocvuong2712";
    private $conn;
    /** khởi taoh - mở kết nối database
     */
    public  function __construct()
    {
        $this->conn=new mysqli($this->host,$this->username,$this->password,$this->db_name);
    }

    /** Huỷ kết nối- đóng kết nối */
    public function __destruct()
    {
        $this->conn->close();
    }

    /** Get connection */
    public function getConnection(){
        return $this->conn;
    }
}

?>