<?php
$ourdata = include("config.php");
session_start();
?>
<php>

<head>
    <title>修改頁面</title>
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
            </div>
        </nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../主頁/yanchengtour.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#article">Posts</a>
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
        <?php
        $id = $_GET['ID'];
        $result = mysqli_query($ourdata, "SELECT * FROM member WHERE ID='$id'");
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="login">
            <h2 class="register">修改<?php echo $row['ID']; ?>號會員</h1>
                <form action="doedit.php" method="post" class="formbox1">
                    <table>
                        <label for="ID" class="account1"></label>
                        <input type="hidden" name="ID" class="texttext" value="<?php echo $row['ID']; ?>">

                        <label for="nickname" class="account1">暱稱</label>
                        <input type="text" name="nickname" class="texttext" value="<?php echo $row['nickname']; ?>">

                        <label for="password" class="account1">密碼</label>
                        <input type="text" name="password" class="texttext" value="<?php echo $row['password']; ?>">

                        <label for="birthday" class="account1">生日</label>
                        <input type="date" name="birthday" class="texttext" value="<?php echo $row['birthday']; ?>">

                        <label for="gender" class="account1">性別</label>
                        <?php if($row['gender'] == "男"){?>
                        <select name="gender" class="texttext" >
                            <option selected="selected" value="男">男</option>
                            <option value="女">女</option>
                        </select>
                        <?php } else{ ?>
                        <select name="gender" class="texttext" >
                            <option value="男">男</option>
                            <option selected="selected" value="女">女</option>
                        </select> 
                        <?php } ?>

                        <label for="address" class="account1">地址</label>
                        <input type="text" name="address" class="texttext" value="<?php echo $row['address']; ?>">
                        
                        <label for="cellphone" class="account1">手機</label>
                        <input type="text" name="cellphone" class="texttext" value="<?php echo $row['cellphone']; ?>">
                       
                        <input name="" type="submit" class="button" value="確認修改" />
                    </table>
                </form>
        </div>
    </main>
</body>

</php>