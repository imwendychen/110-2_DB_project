<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Restaurant Seat Booking</title>
    <!-- <script src="table.js"></script> -->
</html>
<?php
if (isset($_POST['btn'])) {
    $server = "localhost";         # MySQL/MariaDB 伺服器
    $dbuser = "root";       # 使用者帳號
    $dbpassword = ""; # 使用者密碼
    $dbname = "dbproject";
    $conn = new mysqli($server, $dbuser, $dbpassword, $dbname);
    $period = $_POST['period'];
    $seatNum = $_POST['seatNum'];
    $sql = $conn->query("SELECT * FROM booking ");
    if ($sql->num_rows > 0) {
        $row = $db->query("SELECT `seatNum` FROM reserva_seat WHERE `period` = $period "); 
            foreach($row as $rows){?>
                <script>
                    let seat = <?=$rows[0] ?>
                    let count = 0;
                    for(count = 0;count < 41 ;count++){
                        if(count == seat){
                            element.classList.add("occupied");
                            let seatBusySelec = document.querySelectorAll(".row .seat.occupied");
                            const localStorageSeatsOccupied = [...seatBusySelec].map(seat => {
                            return [...seatNotSelected].indexOf(seat);
                            });
                        localStorage.setItem("occupied", JSON.stringify(localStorageSeatsOccupied));
                        }
                    }
    
                </script>
           <?php }        
    }
}
?>
