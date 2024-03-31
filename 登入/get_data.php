<?php
include("config.php");
session_start();
if (isset($_SESSION['email'])) {
    $server = "localhost";         # MySQL/MariaDB 伺服器
    $dbuser = "root";       # 使用者帳號
    $dbpassword = ""; # 使用者密碼
    $dbname = "dbproject";

    $conn = new mysqli($server, $dbuser, $dbpassword, $dbname);

    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['limit']);
    $count = $start + 1;
    $id = $_SESSION['ID'];
    $sql = $conn->query("SELECT * FROM post,member WHERE post.Member_Id = $id LIMIT $start, $limit");

    if ($sql->num_rows > 0) {
        $respones = "";
        $db = new mysqli($server, $dbuser, $dbpassword, $dbname);
        while ($data = $sql->fetch_array()) { ?>
            
                        <?php $response =
                            $index = 1;
                        for (; $index <= 3; $index++) {
                            $row = $db->query("SELECT * FROM post"); ?>
                            <div>
                                <?php
                                foreach ($row as $row) ?>
                                <?php echo $row["Title"]; ?>
                                <?php echo $row["Content"]; ?>
                                <?php $row = $db->query("SELECT * FROM post WHERE post.Member_Id = $id");?>
                            </div>
            <?php
                        };
                    $count++;  
                    }
                    exit($response);
                } else {
                    exit('reachedMax');
                }
            } ?>