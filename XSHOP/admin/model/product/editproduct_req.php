<?php
    include '../connect.php';
    include '../loadProduct.php';
    
    $id = isset($_POST['id_product']) ? $_POST['id_product'] : '';

    $name = isset($_POST['prd_name']) ? $_POST['prd_name'] : '';


    $sql_product = "SELECT * FROM products WHERE id_product = $id";
    $statement_product= $connect->prepare($sql_product);
    $statement_product->execute();
    $data_1product = $statement_product->fetch();
    
    if ($_FILES['img']['name'] == '') {
        # code...
        $img=$data_1product['img'];
    }else{
        $img=$_FILES['img']['name'];
        $img_tmp=$_FILES['img']['tmp_name'];
        move_uploaded_file($img_tmp,'../../public/Admin/image/'.$img);
    }
   
    
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $disc = isset($_POST['disc']) ? $_POST['disc'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $view = isset($_POST['view']) ? $_POST['view'] : '';
    $discount = isset($_POST['discount']) ? $_POST['discount'] : '';
    $id_type = isset($_POST['id_type']) ? $_POST['id_type'] : '';
    $sql_update = "UPDATE `products` SET `prd_name` = '$name',`img` = '$img',`price` = '$price',`disc` = '$disc',`status` = '$status',`view` = '$view' ,`id_type` = '$id_type' WHERE `id_product`='$id'";
 
    $statement_update = $connect->prepare($sql_update);
        $statement_update->execute();
        move_uploaded_file($img_tmp,'../../public/Admin/image/'.$img);
    header('location:../../public/Admin/html/index.php?act=product');
?>