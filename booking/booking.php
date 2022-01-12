<?php
require('../config/db.php');
$sql="SELECT * FROM tour";
$result = mysqli_query($conn,$sql);
    echo"<center>";
    echo "<select>";
    echo "<option>-- Dich vu --</option>";
    while($row=mysqli_fetch_array($result))
    {
        echo"<option>". $row["name"]. "";
    }
    echo"</select>";
    echo"</center>";
    mysqli_close($conn);
?>