<html>
<head>
<link href="adminstyle.css" type="text/css" rel="stylesheet">  
</head>
<body>
    <?php
        include('includes/header.php');
    ?>
<main>
    <h2> Vendor Information </h2>
    <form action="vendorInfo.php" method="post"> 
        <label for="name">Vendor Name</label>
        <input type="text" name="Name" class="inputfield"></input>
        <button type="submit" name="show" value="show" class="button">Show</button>
        <button type="submit" name="fetchAll" value="fetch" class="button">Fetch All</button>
    </form>
<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $host  = "localhost";
    $username = "root";
    $password = "root";
    $database = "KoodeHub_Database";
    $conn = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    if ($_POST['fetchAll']==='fetch') {
        try{
                   
            //$sql = "insert into User_test (Name, Email, Address, Age) values ('" . $_POST['Name'] . "','". $_POST['Email'] . "','". $_POST['Address'] ."',". $_POST['Age']. ")";
            $users = $conn->query("SELECT * FROM User_test")->fetchAll(PDO::FETCH_ASSOC);
            //echo "<pre>";
            //print_r($users);
            //echo "</pre>";
            echo "<table>
                    <thead>
                    <tr>    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>";
                        for ($i=0; $i<count($users); $i++) {
                        echo "<tr><td>" . $users[$i]['Name'] . "</td><td>" . $users[$i]['Email'] ."</td><td>". $users[$i]['Address'] ."</td><td>". $users[$i]['Age']    ."</td></tr> ";
                        }
                    echo "</tbody></table>";
        }
        catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    } // if
    if ($_POST['show']==='show') {
        try {    
                //$conn1 = new PDO("mysql:host=$host;dbname=$database",$username,$password);
                //$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $statement = $conn->prepare("SELECT * FROM User_test WHERE Name = :Name");
                $statement->execute(['Name' => $_POST['Name']]);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $user = $statement->fetch();
                //$user = $conn->query("SELECT * FROM User_test WHERE Name='Pam'")->fetchAll(PDO::FETCH_ASSOC);
                 
                
                //echo "<pre>";e
                //print_r($user);
                //echo "</pre>";
                echo "<table>
                <thead>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Address</th>
                </tr>
                </thead>
                <tbody>";
                    echo "<tr><td>" . $user['Name'] . "</td><td>" . $user['Email'] ."</td><td>". $user['Address'] ."</td><td>". $user['Age']    ."</td></tr> ";
                echo "</tbody></table>";
            
            }
        catch (PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
    
    } // 2nd if
} // POST ends here
?>
</main>
<?php
        include('includes/footer.php');
?>
</body>
</html>
