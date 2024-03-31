<?php
$ourdata = include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM member WHERE email ='$email'";
    $result = mysqli_query($ourdata, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1 && $password == $row['password']) {
        session_start();
        $_SESSION['ID'] = $row['ID'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['nickname'] = $row['nickname'];
        $_SESSION['birthday'] = $row['birthday'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['cellphone'] = $row['cellphone'];
        $_SESSION['level'] = $row['level'];

        login_success("登入成功");
    } else {
        function_error("帳號或密碼錯誤");
    }
}

function login_success($message)
{
    echo "<script>alert('$message');
     window.location.href='../主頁/yanchengtour.php';
    </script>";
}

function function_error($message)
{
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>";
}
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<head>
    <title>登入頁面</title>
    <!-- 字體 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Noto+Serif+TC:wght@500&family=PT+Serif&family=Vollkorn&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- css js -->
    <link rel="stylesheet" href="index.css">
    <link href="../menunav.css" rel="stylesheet" />
    <link href="../內文頁/兜兜圈/doughnut.css" rel="stylesheet" />
    <link rel="stylesheet" href="../內文頁/兜兜圈/doughnut_screen.css" />
    <script src="../common.js"></script>
    <link rel="icon" type="image/x-icon" href="../common img/titleicon.png" />
</head>

<body id="body">
    <header>
        <nav class="navbarr navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../主頁/yanchengtour.php">
                    <img src="../common img/titleicon.png" alt="" width="65" height="65" class="d-inline-block align-text-top" />
                    <div id="brandname">Hola Foodie</div>
                </a>
                <button id="mobile-menu">
                    <img src="../common img/more.png" alt="" class="menuicon" />
                </button>
                <form action="/action.php" id="form">
                    <a href="../搜尋/index.php">
                        <label for="searchblank" id="search"><img src="../common img/magnifier.png"
                                id="magnifier"></label>
                        <input type="text" id="searchkey" name="searchblank">
                    </a>
                </form>
            </div>
        </nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../主頁/yanchengtour.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../post/phase2.php">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../內文頁/關於我們/aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Member Area</a>
            </li>
        </ul>
        <div id="mobilenavbar">
            <div class="mobilenav-item">
                <a class="mnav-link" href="../主頁/yanchengtour.php">Home</a>
            </div>
            <div class="mobilenav-item">
                <a class="mnav-link" href="#article">Posts</a>
            </div>
            <div class="mobilenav-item">
                <a class="mnav-link" href="../內文頁/關於我們/aboutus.php">About Us</a>
            </div>
        </div>
    </header>
    <main>
        <div class="login">
            <h1 class="register2">登入會員</h1>
            <div class="formbox">
                <form method="post" action="login.php" class="indexform">
                    <label for="email" class="account">電子信箱</label>
                    <br><input type="text" name="email" class="texttext"><br><br>
                    <label for="password" class="account">密碼</label>
                    <br><input type="password" name="password" class="texttext"><br><br>
                    <div class="welcome">沒有帳號嗎？歡迎<a href="register.php">註冊</a></div><br><br>
                    <button type="submit" class="button">登入</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>