<?php

include 'book_conn.php';

class Controller extends Model{
    public function insertMember($name, $sID, $person_AMT, $bTime,$other,$period){
        $sql_statement="INSERT INTO booking( name, sID, person_AMT, bTime,other,period)Values(?,?,?,?,?,?)";
        $query = $this->connect()->prepare($sql_statement);
        $query->execute ([$name, $sID, $person_AMT, $bTime,$other,$period]);    
    }

    public function allCustomer(){
        $sql_statement = "SELECT * FROM booking ORDER BY person_AMT";
        $query = $this->connect()->prepare($sql_statement);
        $query->execute();
        $users = $query->fetchAll();
        $output = '';

        $output .="
            <div class='table-container'>
                <table class='table is-bordered is-striped is-hoverable is-fullwidth'>
                    <tr>
                        <th>Customer Name</th>
                        <th>Person_AMT</th>
                        <th>Reservation Time</th>
                        <th>Other Wishes</th>
                        <th>Your Period</th>   
                 
                    </tr>";
            if($query->rowCount()>0){
                foreach($users as $key => $value){
                $output .="
                    <tr>
                        <td>".$value['name']."</td>
                        <td>".$value['person_AMT']."</td>
                        <td>".$value['bTime']."</td>
                        <td>".$value['other']."</td>
                        <td>".$value['period']."</td>
                
                    </tr>
                </div>";
                }
                $output .='</table>';
                echo $output;
            }
    }

    public function findCustomer($findName){
        $findName;
        $sql_statement = "SELECT * FROM booking WHERE name REGEXP ?";
        $query = $this->connect()->prepare($sql_statement);
        $query->execute([$findName]);
        $data_fetch = $query->fetchAll();
        $output = '';

        $output .="
            <div class='table-container'>
                <table class='table is-bordered is-striped is-hoverable is-fullwidth'>
                    <tr>
                        <th>Customer Name</th>
                        <th>Person_AMT</th>
                        <th>Reservation Time</th>
                        <th>Other Wishes</th>
              
                    </tr>";
            if($query->rowCount()>0){
                foreach($data_fetch as $key => $value){
                $output .="
                    <tr>
                        <td>".$value['name']."</td>
                        <td>".$value['person_AMT']."</td>
                        <td>".$value['bTime']."</td>
                        <td>".$value['other']."</td>
               
                    </tr>
                </div>";
                }
                $output .='</table>';
                echo $output;
            }else{
                echo"<div class='notification is-warning'>
                        <header class='is-size-4 has-text-weight-bold ml-6'>This Customer Info Does Not Exist</header>
                    </div>";
            }
    }

    public function insertSeat($sID,$period,$seatNum){
        $sql_statement="INSERT INTO reserva_seat(sID,period,seatNum)Values(?,?,?)";
        $query = $this->connect()->prepare($sql_statement);
        $query->execute ([$sID,$period,$seatNum]);  
    }
}

?>
