<?php 
  session_start();
  include_once "phyBackend/config.php";
  include_once "../header.php"; 

  //if(isset($_SESSION['id'])){
    //header("location: index.php");
 // }
?>

<?php
                $query="SELECT * FROM physician WHERE phyId='".$_SESSION['phyId']."' "; 
                //$query2="SELECT phone FROM users WHERE id='".$_SESSION['id']."' ";
                //$query3="SELECT RIGHT(phone, 4) FROM users WHERE id='".$_SESSION['id']."' ";
                
                
                if($r = mysqli_query($conn, $query ) ) {
                
                    while ($row=mysqli_fetch_array($r)){

                        $imageURL = $row["image"];
                    ?>

                        <img src="<?php echo $imageURL; ?>" alt="" />
                <?php

                        echo '<div class="col-lg-8">';
                        print "<h3>Name: {$row['name']}</h3>";
                        echo '</div>';
                        echo '</div>';


                        echo '<div class="row row-50">';
                        echo '<div class="col-lg-8">';
                        print "<h3>email: {$row['email']}</h3>";
                        echo '</div>';
                        echo '</div>';

                        echo '<div class="row row-50">';
                        echo '<div class="col-lg-8">';
                        $phNo = substr($row['phone'], 5);
                        print "<h3>phone: ***-***{$phNo}</h3>";
                        echo '</div>';
                        echo '</div>';


                        echo '<div class="row row-50">';
                        echo '<div class="col-lg-8">';
                        $nric = substr($row['nric'], 6);
                        print "<h3>NRIC : ******-**-{$nric}</h3>";
                        echo '</div>';
                        echo '</div>';
                        
                        
                        echo '<div class="row row-50">';
                        echo '<div class="col-md-12">';
                        print" <button class='button-74' role='button'><a href='phyBackend/logout.php?logout_id= {$row['phyId']}' class='logout'>Logout</a></button>";
                        print"</div>";
                        echo '</div>';
                        
                            }
                        
                        
                    }else{
                        print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($conn).
                        '.</p><p>the query being run was : '.$query.'</p>';
                    }
                
                    mysqli_close($conn);
                
                ?>