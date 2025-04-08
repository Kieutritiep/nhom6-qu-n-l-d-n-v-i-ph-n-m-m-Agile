<?php
class homeAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}