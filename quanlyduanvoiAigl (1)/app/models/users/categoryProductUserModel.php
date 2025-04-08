<?php
class categoryProductModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}