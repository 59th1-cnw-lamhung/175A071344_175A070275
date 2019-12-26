<?php
session_start();

if(isset($_SESSION['TENTAIKHOAN']) && $_SESSION['TENTAIKHOAN'] != NULL){

   //kiểm tra nếu có session tên us thì xóa nó đi
    unset($_SESSION['TENTAIKHOAN']);
    header('Location: index.php');
}

?>