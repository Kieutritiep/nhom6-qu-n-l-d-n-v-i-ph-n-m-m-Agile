<?php
    class detailOrderAdminController{
        public $detaiOrder;
        public function __construct(){
            $this->detaiOrder = new detailOrderAdminModel;
        }
        public function detailOrderAdmin(){
            $idOrder = $_GET['id'];
            $detailOrders = $this->detaiOrder->getDetailOrder($idOrder);
            // var_dump($detailOrders);die();
            // var_dump($orders);die();
            require_once './views/admin/order/detailOderAdmin.php';
        }
        public function updateStatusOrder(){
            $idDonHang = $_POST['idDonHang'];
            $status = $_POST['trangThai'];
            $statusOrder =  $this->detaiOrder->updateStatus($idDonHang,$status);
            // var_dump($statusOrder);die();
            if($statusOrder) {
                echo "<script>
                    alert('Cập nhật trạng thái thành công');
                    window.location.href = './?act=admin/detailOrderAdmin&id=" . $idDonHang . "';
                </script>";
            }
        }
    }