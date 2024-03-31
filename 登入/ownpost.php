<?php
include("config.php");
session_start();
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<head>
    <title>您的文章</title>
    <!-- 字體 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Noto+Serif+TC:wght@500&family=PT+Serif&family=Vollkorn&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- css js -->
    <script src="../post/phase2.js" type="text/javascript"></script>
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
                        <label for="searchblank" id="search"><img src="../common img/magnifier.png" id="magnifier"></label>
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
                <a class="mnav-link" href="../post/phase2.php">Posts</a>
            </div>
            <div class="mobilenav-item">
                <a class="mnav-link" href="../內文頁/關於我們/aboutus.php">About Us</a>
            </div>
            <div class="mobilenav-item">
                <a class="mnav-link" href="index.php">Member Area</a>
            </div>
        </div>
    </header>
    <main>
        <div class="ownpost">
            <?php
            $id = $_SESSION['ID'];
            $sql = "SELECT * FROM post WHERE post.Member_Id = $id";
            $ro = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($ro);
            ?>
            <?php do { ?>
                <a href="<?= $row['url'] ?>">
                    <div class="namecard1">
                        <h3><?php echo $row['Title']; ?></h3>
                        <img src="<?= $row['Title_img'] ?>" class="showimg">
                    </div>
                </a>
                <div class="post_option">
                    <a href="../post/postedit2.php?Post_Id=<?= $row['Post_Id'] ?>" class="post_option">修改/ </a>
                    <a href="../post/postdelete.php?Post_Id=<?= $row['Post_Id'] ?>" class="post_option">刪除</a>
                </div>
            <?php } while ($row = mysqli_fetch_assoc($ro)); ?>
            </table>
        </div>
    </main>
</body>

</html>