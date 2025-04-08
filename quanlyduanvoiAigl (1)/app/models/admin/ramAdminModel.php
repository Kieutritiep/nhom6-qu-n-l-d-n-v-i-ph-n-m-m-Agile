<?php
class ramAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}