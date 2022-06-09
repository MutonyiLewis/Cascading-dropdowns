<?php
include_once("conn/conn.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "select * from subcounties where county_id=$id";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select subcounty</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['subcounty_id'] . '" name="subcounty">' . $row['constituency_name'] . '</option>';
        }
    }
} elseif (!empty($_POST['sid'])) {
    $id = $_POST['sid'];
    $query1 = "select * from station where subcounty_id=$id";
    $result1 = mysqli_query($conn, $query1);
    if ($result1->num_rows > 0) {
        echo '<option value="">Select station</option>';
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['station_id'] . '" name="station">' . $row['ward'] . '</option>';
        }
    }
}
