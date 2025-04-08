<?php
class capacityAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}