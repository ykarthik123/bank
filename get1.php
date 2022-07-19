<!DOCTYPE html>
<html>
<body>

<title>
    Displaying-data
</title>
<div class="cust">
    CUSTOMERS-DETAILS
</div>
<div class = "table1">
    <table border = 2 >
        <tr>
            <th>name</th>
            <th>password</th>
            <th>email</th>
            <th>balance</th>
        </tr>
    </div>
<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "test";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Could not connect to the database." .$conn->connect_error);
}

$sql = "SELECT * from trans_display";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
    {
         echo  
         "<tr>
         <td >".$row["name"]."</td> 
         <td>".$row["password"]."</td>        
         <td>".$row["email"]."</td>  
         <td>".$row["balance"]."</td>
         </tr> " ;
    }
$conn -> close()
?>
</tr>
</div>
</table>
</body>
</html>


<style>
    .table1{
        margin-left: 10px;
    }
    table{
        margin-top:40px;
        margin-left: 100px;
        border-collapse: collapse;
        width: 1000px;
        color: black;
        font-size: 25px;
        text-align: left;
    }
    th{
        background-color: yellow;
        color: red;
    }
    .tr1{
        font-size: 30px;
        margin-left:500px;
    }
    .cust{
        margin-left:350px;
        font-size: 50px;
    }
</style>
