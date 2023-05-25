<?php 
session_start();
error_reporting(0);
//include 'Connect.php';
$conn = mysqli_connect("localhost","root","","baitap");
        mysqli_query($conn,"SET NAMES 'utf8'");


$output='';
if (isset($_POST["export_excel_product"])) {
    $sql="select * from product";
    $kq=mysqli_query($conn,$sql);
    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <td>Mã sản phẩm</td>
                <td>Họ sản phẩm</td>
                <td>Giá sản phẩm</td>
                <td>Khuyến mại</td>
                <td>Category_id</td>
                <td>Màu sắc</td>
                <td>Phản hồi</td>
                
            </tr>';
        while($row = mysqli_fetch_assoc($kq))
        {
            $output.='
            <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['sale'].'</td>
                <td>'.$row['category_id'].'</td>
                <td>'.$row['color'].'</td>
                <td>'.$row['review'].'</td>            
            </tr>
            ';
        }
        $output.='</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }
}



if (isset($_POST["export_excel_account"])) {
    $sql="select * from user";
    $kq=mysqli_query($conn,$sql);

    if (mysqli_num_rows($kq)) {
        $output.='<table class="table" bordered="1">
            <tr>
                <td>Mã người dùng</td>
                <td>Tên người dùng</td>
                <td>Ngày sinh</td>
                <td>Số điện thoại</td>
                <td>Email</td>
                <td>Mật khẩu</td>                
            </tr>';
        while($row = mysqli_fetch_assoc($kq))
        {
            $output.='
            <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['password'].'</td>  
                <td>'.$row['fullname'].'</td>               
                <td>'.$row['dob'].'</td>               
                <td>'.$row['address'].'</td>                   
                <td>'.$row['role'].'</td>
                <td>'.$row['gender'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
            </tr>
            ';
        }
        $output.='</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }
}

?>