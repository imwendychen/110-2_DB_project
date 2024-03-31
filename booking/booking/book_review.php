 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        error_reporting(0);
        include 'book_function.php';
        if(isset($_POST['btn'])){
            $name = $_POST['name'];
            $sID = $_POST['sID'];
            $person_AMT = $_POST['person_AMT'];
            $bTime = $_POST['bTime'];
            $other = $_POST['other'];
            $period = $_POST['period'];
            $seatNum = $_POST['seatNum'];
            // $enterseat = new UserController(); 
            $enterdata = new Controller();           
        }


        if($person_AMT == '1'||$person_AMT == '2'||$person_AMT == '3'||$person_AMT == '4'||$person_AMT == '5'||$person_AMT == '6'
            ||$person_AMT == '7'||$person_AMT == '8'||$person_AMT == '9'||$person_AMT == '10'||$person_AMT == '11'||$person_AMT == '12'
            ||$person_AMT == '13'||$person_AMT == '14'||$person_AMT == '15'){
            $enterdata -> insertMember($name, $sID, $person_AMT, $bTime,$other, $period);
            echo"
                <div class='card is-half column is-offset-3'>
                    <header class='is-size-100 has-text-weight-bold ml-6 is-centered card-header-title'>
                    Your Reservation Has Been Seen</header>
                    <h1 class='has-text-weight-bold has-text-centered'>Review Order</h1>
                    <div class='card-content'>
                        <p class = 'is-size-8'>Your Name:</p>
                        ".$name."
                        <p class = 'is-size-8'>Store Address:</p>
                        ".$sID."
                        <p class = 'is-size-8'>Person Amount:</p>
                        ".$person_AMT."
                        <p class = 'is-size-8'>Appointment Time:</p>
                        ".$bTime."
                        <p class = 'is-size-8'>Your Wishes:</p>
                        ".$other."
                        <p class = 'is-size-8'>Your Period:</p>
                        ".$period."
                        <p class = 'is-size-8'>Your Seat(s):</p>
                        ".$seatNum."    
                    </div>
                    <a href='\booking\booking.html'>Back Home</a>
                </div>";           
                 
        }

        $splitSeat = explode(",",$seatNum);
        $seats = count($splitSeat);
        for($i = 0; $i < $seats; $i+=1){
            $num = (int)$splitSeat[$i];
            $enterdata -> insertSeat($sID,$period, $num);
        }
        return $enterdata
        ?>
    </body>
</html>
