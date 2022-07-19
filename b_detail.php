<?php
if (isset($_POST['name']) && isset($_POST['password'])&& isset($_POST['email']) )
    {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $balance = 0;
    $conn = mysqli_connect("localhost","root","","test");
    if ($conn->connect_error) 
    {
        die('Could not connect to the database.');
    }
    else
    {
        $Select = "SELECT email FROM trans_display WHERE email = ? LIMIT 1";
        $Insert = "INSERT INTO trans_display(name,password,email,balance) values(?, ? ,?,?)";
        $stmt = $conn->prepare($Select);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($resultEmail);
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum == 0)
        {
            $stmt->close();
            $stmt = $conn->prepare($Insert);
            $stmt->bind_param("ssss",$username, $password, $email,$balance);
            if ($stmt->execute()) 
            {
                echo "Congratulations For Becoming a Memeber in OUR-BANK\n";
                echo" And We Successfully Registered Your Details .";
            }
            else 
            {
                echo "$stmt->error";
            }
        }
        else 
        {
            echo "Someone Already Registered ";
            echo "  ";
            echo " Using This Email so login .....";
        }
        $stmt->close();
        $conn->close();
    }
}
else 
{
    echo "All field are required.";
    die();
}

?>

