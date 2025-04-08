<?php
    class listVoucherAdminController{
        public $listVoucher;
        public function __construct(){
            $this->listVoucher = new voucherModel;
        }
        public function listVoucher(){
            $vouchers = $this->listVoucher->getAllVoucher();
            require_once './views/admin/voucher/listVoucher.php';
        }
        public function formAddVoucher(){
            require_once './views/admin/voucher/formAddVoucher.php';
        }
        public function deleteVoucher(){
            $id = $_GET['id'];
            $delete = $this->listVoucher->deleteVoucherModel($id);
            if($delete){
                echo "<script>
                        alert('Xóa voucher thành công');
                        window.location.href = './?act=admin/listVoucher';
                    </script>";
            }
            else {
                echo "<script>
                        alert('Xóa voucher thất bại');
                        window.location.href = './?act=admin/listVoucher';
                    </script>";
            }
        }
        public function addVoucher(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ten_chuongTrinh = $_POST['ten_chuongTrinh'];
                $moTa = $_POST['moTa'];
                $soTienGiamGia = $_POST['soTienGiamGia'];
                $soTienToiThieu = $_POST['soTienToiThieu'];
                $trangThai = (int)$_POST['trangThai']; 
                $ngayBatDau = $_POST['ngayBatDau'];
                $ngayKetThuc = $_POST['ngayKetThuc'];
                if($this->listVoucher->addVoucher($ten_chuongTrinh, $moTa, $soTienGiamGia, $soTienToiThieu, $trangThai, $ngayBatDau, $ngayKetThuc)){
                    echo "<script>
                            alert('Thêm voucher thành công');
                            window.location.href = './?act=admin/listVoucher';
                        </script>";
                }else{
                    echo "<script>
                            alert('Thêm voucher thất bại');
                            window.location.href = './?act=admin/formAddVoucher';
                        </script>";
                }
            }
        }
        public function updateVoucher(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ten_chuongTrinh = $_POST['ten_chuongTrinh'];
                $moTa = $_POST['ma_giamGia'];
                $soTienGiamGia = $_POST['soTienGiamGia'];
                $soTienToiThieu = $_POST['soTienToiThieu'];
                $trangThai = $_POST['soTienToiThieu'];
                $ngayBatDau = $_POST['ngayBatDau'];
                $ngayKetThuc = $_POST['ngayKetThuc'];
                $id_giamGia = $_POST['id_giamGia'];
                // var_dump($_POST);die();
                if($this->listVoucher->updateVoucherModel($id_giamGia,$ten_chuongTrinh, $moTa, $soTienGiamGia, $soTienToiThieu, $trangThai, $ngayBatDau, $ngayKetThuc)){
                    // echo "<script>
                    //         alert('Cập nhật voucher thành công');
                    //         window.location.href = './?act=admin/listVoucher';
                    //     </script>";

                }else{
                    // echo "<script>
                    //         alert('Cập nhật voucher thất bại');
                    //         window.location.href = './?act=admin/listVoucher';
                    //     </script>";
                }
            }
        }
        public function formUpdateVoucher(){
            $id = $_GET['id'];
            $voucher = $this->listVoucher->getVoucherById($id);
            require_once './views/admin/voucher/formUpdateVoucher.php';

        }
    }