<?php
include 'XSHOP/admin/model/connect.php';
if (isset($_POST['registerBtn'])) {

    $username = $_POST['user'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $sql = "INSERT INTO guest (`name`,`user`, `pwd`,`role`) VALUES ('$name','$username', '$password',$role)";
    $statement = $connect->prepare($sql);
    $statement->execute();
    echo 'Đăng ký thành công!';
    header('location:index.php');
    // if ($statement_check->rowCount() > 0) {
    //     $error['login'] = 'Đăng nhập thành công';



    //     // header("refresh:5;url=https://www.google.com.vn/");
    // } else {
    //     $error['login'] = 'Tài khoản hoặc mật khẩu không đúng';
    // }


    // if ($pwd != $data_check['pwd']) {
    //     echo "<script>alert('Mật khẩu sai')</script> <a href='javascript: history.go(-1)'>Trở lại</a>";
    // }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="XSHOP/admin/view/layout/css/style.css">

    <style>
        .bg-primary {
            height: 100vh;
            background-color: #4e73df !important;
            background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%) !important;
            background-size: cover !important;
        }

        .login-container {
            background-color: #FFF;
            border-radius: 5px;
            height: 100%;
        }

        .login-input {
            border-radius: 10rem !important;
            line-height: 32px;
            padding: 6 24px !important;
        }

        .button-login {
            cursor: pointer;
            font-size: .8rem;
            border-radius: 10rem;
            padding: 0.75rem 1rem;
            display: block;
            width: 100%;
            background-color: #4e73df;
            border-color: #4e73df;
            color: #fff;
            margin: 24px 0;
        }
    </style>

</head>

<body class="bg-primary">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 p-3 my-5 login-container">
                <div class="">
                    <div class="text-center">
                        <h4>Đăng ký</h4>
                    </div>

                    <?php
                    if (isset($error['login'])) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $error['login']; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($loginSuccess)) {
                    ?>
                        <div class="alert alert-success text-center">
                            <?php echo $loginSuccess; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <form action="#" method="POST">
                        <div class="form-group mt-4">
                            <label for="title" class="form-label px-3">Tên của bạn</label>
                            <input type="text" class="form-control login-input" name="name" placeholder="Tên của bạn...">
                            <span class="text-danger px-3 " style="font-size: 16px"><?php if (isset($error['name'])) echo $error['name'] ?></span>
                        </div>

                        <div class="form-group mt-1">
                            <label for="title" class="form-label px-3">Tên đăng nhập</label>
                            <input type="text" class="form-control login-input" name="user" placeholder="Tài khoản đăng nhập ... ">
                             <span class="text-danger px-3" style="font-size: 16px"><?php if (isset($error['password'])) echo $error['password'] ?></span>
                        </div>
                        <div class="form-group mt-1">
                            <label for="title" class="form-label px-3">Mật khẩu</label>
                            <input type="password" class="form-control login-input" name="password" placeholder="Mật khẩu ...">
                            <span class="text-danger px-3" style="font-size: 16px"><?php if (isset($error['password'])) echo $error['password'] ?></span>
                        </div>
                        <select name="role" class="form-select" id="">Phân quyền
                            
                            <option value="0">Khách</option>
                        </select>
                        <div class="form-group mt-3 text-center">
                            <input type="submit" class="button-login btn btn-praimary" name="registerBtn" value="Đăng ký">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>