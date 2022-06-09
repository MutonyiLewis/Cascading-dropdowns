<?php 
include_once("conn/conn.php");
include_once("response.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Get vaccine</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<body>  

    <div class="container text-center">
        <img class="text-center" src="logo.jpg">
    </div>
    <?php 
    if (isset($_SESSION['registered'])) {
            echo $_SESSION['registered'];
            unset($_SESSION['registered']);
         } ?>
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to register for vaccination</h2>
            <form action="vaccineRegister.php" method="POST" class="vaccine">
                
                <fieldset>
                    <legend>Enter your Details</legend>
                    <div class="vaccine-label">First Name</div>
                    <input type="text" name="firstname" placeholder="Enter your first name" class="input-responsive" required>

                    <div class="vaccine-label">Second Name</div>
                    <input type="text" name="secondname" placeholder="Enter your second name" class="input-responsive" required>

                    <div class="vaccine-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +254 712435678" class="input-responsive" required>

                    <div class="vaccine-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vaccine.gmail.com" class="input-responsive" required>

                    <div class="vaccine-label">Select County to register</div>
                    <!-- county -->
                    <select class="input-dropdown" id="county" name="county">
                        <option value=""> Select County</option>
                            <?php

                            $query = "select * from counties";
                            // $query = mysqli_query($con, $qr);
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <option value="<?php echo $row['county_id']; ?>"><?php echo $row['county_name']; ?></option>
                            <?php
                                }
                            }

                            ?>

                        </select>

                    <!-- sub county-->
                    <select id="Subcounty" name="subcounty" class="input-dropdown" required>
                        <option value="">Select subcounty</option>
                    </select>

                    <!-- station-->
                    <select id="station" class="input-dropdown" name="station" required>
                        <option value="">Select station</option>
                    </select>
                    <br><br><br>

                    <div class="vaccine-label">Select date for vaccination</div>
                    <input type="date" id="start" name="vaccine_date" min="2022-01-01" max="2022-12-31" class="input-responsive"><span class="validity"></span>

                    <input type="submit" name="submit" value="Confirm Registration" class="btn btn-primary" onclick="">

                    
                </fieldset>

            </form>

           

        </div>
    </section>
    
<script>
        $(document).ready(function() {
            $("#county").on('change', function() {
                var county_id = $(this).val();

                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        id: county_id
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#Subcounty").html(data);
                        $("#station").html('<option value="">Select station</option');

                    }
                });
            });
            $("#Subcounty").on('change', function() {
                var subcounty_id = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        sid: subcounty_id
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#station").html(data);

                    }

                });
            });
        });
    </script>
    

</body>
</html>

   