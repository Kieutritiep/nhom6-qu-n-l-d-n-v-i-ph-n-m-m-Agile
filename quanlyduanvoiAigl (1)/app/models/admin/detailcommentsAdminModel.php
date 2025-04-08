<?php
class detailCommentAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}