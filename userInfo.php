<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
$host  = "localhost";
$username = "root";
$password = "root";
$database = "REPLACEWITHYOURDATABASENAME";

try{

    $conn = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into User_test (Name, Email, Address, Age) values ('" . $_POST['Name'] . "','". $_POST['Email'] . "','". $_POST['Address'] ."',". $_POST['Age']. ")";
    $conn->exec($sql);
    echo "User record inserted";
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
}
?>

<html>
<head>
<link href="adminstyle.css" type="text/css" rel="stylesheet">  
</head>
<body>
    <?php
        include('includes/header.php');
    ?>
    <main>
    <h2>New User Form</h2><br>
    <div class="userform">
    <form name='user_test' action="userInfo.php" method="post"> 
        <label for="Name">Name</label>
        <input type="text" name="Name" class="inputfield"></input><br>
        <label for="Email">Email</label>
        <input type="email" name="Email" class="inputfield"></input><br>
        <label for="Address">Address</label>
        <input type="text" name="Address" class="inputfield"></input><br>
        <label for="Age">Age</label>
        <input type="number" name="Age" class="inputfield"></input>
        <button type="submit" class="button">Save</button>
    </form>
    </div>
    </main>
<?php
        include('includes/footer.php');
?>
</body>
</html>
