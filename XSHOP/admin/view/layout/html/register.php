<?php
include 'admin/model/connect.php';
if (isset($_POST['registerBtn'])){

        $username = $_POST['user'];
        $name = $_POST['name'];
        $password = $_POST['pwd'];
        $role = $_POST['role'];
        $sql ="INSERT INTO guest (`name`,`user`, `pwd`,`role`) VALUES ('$name','$username', '$password',$role)";
        $statement = $connect->prepare($sql);
        $statement->execute();
        echo 'Đăng ký thành công!';
        // header('location:index.php');
        }
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

<div class="div-login my-5 w-25 mx-auto rounded-1 border-success border-5 p-3 h-100">
    <header class="w-100 bg-success"> TÀI KHOẢN </header>
    <form class="w-50 mx-auto my-5" action="<?php ($_SERVER['PHP_SELF'])?>" method="POST">
        <p>Tên  <input type="text" class="form-control" placeholder="Username"
                aria-label="Username" aria-describedby="basic-addon1" name="name"> </p>
        <p>Tên đăng nhập <input type="text" class="form-control" 
                 name="user"> </p>
        <p> Mật khẩu <input type="password" class="form-control" placeholder="password"
                aria-label="Username" name="pwd" aria-describedby="basic-addon1"> </p>
        <select name="role" id="">Phân quyền
        <option value="1">Admin</option>
        <option value="0">Khách</option>
        </select>
        

        <button type="submit" class="button-login btn mt-3 btn-danger" name="registerBtn">Đăng Ký </button>
      
</div>
</body>
</html>