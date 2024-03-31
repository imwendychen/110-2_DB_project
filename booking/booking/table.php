<!DOCTYPE html>
    <html lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://cdn.staticfile.org/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <title>Restaurant Seat Booking</title>
        <link type="text/css" rel="stylesheet" href="table.css">
    </html>
    <body>
        <form>
            <div class="movie-container">
                <label>Pick Your Time</label>
                <select id="movie" name="period">
                    <option value="9:30-11:00">9:30-11:00</option>
                    <option value="11:00-12:30">11:00-12:30</option>
                    <option value="12:30-14:00">12:30-14:00</option>
                    <option value="17:00-18:30">17:00-18:30</option>
                    <option value="18:30-20:00">18:30-20:00</option>
                    <option value="20:00-21:30">20:00-21:30</option>
                </select>
            </div>

            <ul class="showcase">
                <li>
                    <div class="seat1"></div>
                    <small>N/A</small>
                </li>
                <li>
                    <div class="seat selected1"></div>
                    <small>Selected</small>
                </li>
                <li>
                    <div class="seat occupied"></div>
                    <small>Occupied</small>
                </li>
            </ul>

            <div class="container">
                <div class="screen"></div>
                <div class="row" id="1" id="ROW">
                    <div class="rowNumb" id="1"></div>
                    <div class="seat" id="2"></div>
                    <div class="seat" id="3"></div>
                    <div class="seat" id="4"></div>
                    <div class="seat" id="5"></div>
                    <div class="seat" id="6"></div>
                    <div class="seat" id="7"></div>
                    <div class="seat" id="8"></div>
                    <div class="seat" id="9"></div>
                </div>

                <div class="row" id="2">
                    <div class="rowNumb" id="2"></div>
                    <div class="seat" id="10"></div>
                    <div class="seat" id="11"></div>
                    <div class="seat" id="12"></div>
                    <div class="seat" id="13"></div>
                    <div class="seat" id="14"></div>
                    <div class="seat" id="15"></div>
                    <div class="seat" id="16"></div>
                    <div class="seat" id="17"></div>
                </div>

                <div class="row" id="3">
                    <div class="rowNumb" id="3"></div>
                    <div class="seat" id="18"></div>
                    <div class="seat" id="19"></div>
                    <div class="seat" id="20"></div>
                    <div class="seat" id="21"></div>
                    <div class="seat" id="22"></div>
                    <div class="seat" id="23"></div>
                    <div class="seat" id="24"></div>
                    <div class="seat" id="25"></div>
                </div>

                <div class="row" id="4">
                    <div class="rowNumb" id="4"></div>
                    <div class="seat" id="26"></div>
                    <div class="seat" id="27"></div>
                    <div class="seat" id="28"></div>
                    <div class="seat" id="29"></div>
                    <div class="seat" id="30"></div>
                    <div class="seat" id="31"></div>
                    <div class="seat" id="32"></div>
                    <div class="seat" id="33"></div>
                </div>

                <div class="row" id="5">
                    <div class="rowNumb" id="5"></div>
                    <div class="seat" id="34"></div>
                    <div class="seat" id="35"></div>
                    <div class="seat" id="36"></div>
                    <div class="seat" id="37"></div>
                    <div class="seat" id="38"></div>
                    <div class="seat" id="39"></div>
                    <div class="seat" id="40"></div>
                    <div class="seat" id="41"></div>
                </div>
            </div>

        <p>You Can Select <span id="person_tol"></span> seats</p>
            <span> Posto (S/F):</span>
            <div class="postoS" name="seatNum" id="seatNum"></div><br>
            <p class="text">
                You have selected <span id="count">0</span> seats  and left <span id="total">0</span> seat(s)
            </p>  
            <!-- <input type="button" value="CLICK" class="button"> -->
            <input type="button" value="Back to Booking Page" class="back"/>
        </form>
        <script src="table.js"></script>
        <script>
            var times = $("#movie").val();
            $(document).ready(function(){
             $.cookie("period", times);
            })
            $("#movie").bind("input propertychange", function(){
               
                $.cookie("period", times);
                // console.log($.cookie("period"));
            })
        </script>
        <?php
            $server = "localhost";         # MySQL/MariaDB 伺服器
            $dbuser = "root";       # 使用者帳號
            $dbpassword = ""; # 使用者密碼
            $dbname = "dbproject";
            // $dsn = 'mysql:host='.$this->server.';dbname='.$this->dbname;
            $pdo = new PDO('mysql:dbname=dbproject;host=localhost',$dbuser,$dbpassword);
            // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);  
            $period = $_COOKIE['period'];
            $row = $pdo->query("SELECT seatNum FROM reserva_seat WHERE period = '$period' ");?> 
                    <script>
                     var seat = 0;
                     let count1 = 0;
                     </script>
                     <?php
                        foreach($row as $rows){?>
                    <script>
                            seat = <?=$rows[0]?>;
                            for(count1 = 0;count1 < 41 ;count1++){
                                if(count1 == seat){
                                    $("#<?= $rows[0]?>").addClass("occupied");
                                }
                            }
                    </script>
                <?php }        
        ?>
    </body>
</html>




