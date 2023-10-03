<?php 
  session_start();
  include_once "phyBackend/config.php";
  include_once "../header.php"; 
  //if(isset($_SESSION['id'])){
    //header("location: index.php");
 // }
?>



<?php
                $query="SELECT * FROM appointment WHERE phyId='".$_SESSION['phyId']."' ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){
                    
                        echo '<form action="phyBackend/approveAppointment.php" method="POST">';
                        $appointmentId = $row['appointmentId'];
                        echo "<input type='hidden' name='appointmentId' value='{$appointmentId}'>";
                        print "<h3>Patient ID: {$row['id']}</h3>";
                        print "<h3>Patient Name: {$row['patientName']}</h3>";
                        print "<h3>Patient NRIC: {$row['patientNRIC']}</h3>";
                        print "<h3>Patient Gender: {$row['patientGender']}</h3>";
                        print "<h3>Patient Email: {$row['patientEmail']}</h3>";
                        print "<h3>Patient Phone: {$row['patientPhone']}</h3>";
                        print "<h3>date : {$row['date']}</h3>";
                        print "<h3>slot : {$row['slot']}</h3>";
                        print "<h3>Message : {$row['msg']}</h3>";
                        
                        echo' <select name="agreement" id="agreement" >
                            <option value="approve">Approve</option>
                            <option value="reject">Reject</option>
                        </select>';
                
                        print" <button type='submit' name='submitted' >
                        Submit
                        </button>";

                        echo '</form>';
                        
                            }
                        
                        
                    }else{
                        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$query.'</p>';
                    }
                
                    mysqli_close($conn);
                
                ?>