<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
// đường dẫn vào client
// config/config.php
define('BASE_URL', 'http://localhost/baseDuanpoly/app/'); // Đường dẫn URL của bạn
define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'database_nhom6fpoly');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
