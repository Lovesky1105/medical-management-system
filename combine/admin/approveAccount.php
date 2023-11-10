<?php
include_once "adminBackend/config.php";
$agreement = "pending";


$query="SELECT * FROM physician WHERE agreement = '{$agreement}' ";

if($r = mysqli_query($conn, $query ) ) {
                
    while ($row=mysqli_fetch_array($r)){
    
        
        print "<p>Name: {$row['name']}</p>";


        print "<p>email: {$row['email']}</p>";

        $phNo = substr($row['phone'], 5);
        print "<p>phone: ***-***{$phNo}</p>";


        $nric = substr($row['nric'], 6);
        print "<p>NRIC : ******-**-{$nric}</p>";

        print "<p>Access Level: {$row['accessLvl']}</p>";
        
        echo '<form action="adminBackend/adminApproveAccount.php" method="POST">';
        echo "<input type='hidden' name='name' value='{$row['name']}'>";
        echo "<input type='hidden' name='email' value='{$row['email']}'>"; 
        
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