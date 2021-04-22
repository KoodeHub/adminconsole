<?php?>

<html>
<head>
    <title>Admin Console</title>
    <link href="adminstyle.css" type="text/css" rel="stylesheet">  
</head>
<body>
    <?php
        include('includes/header.php');
    ?>
    <main>
       <h2> Community News</h2>
       <div class = "weather">
       <?php include('Index-WeatherAPI.php')?>
            <p id="para">
           
            
            <img id="image" src='http://openweathermap.org/img/wn/04d@2x.png'><br>
            <section id="report">
            <?php 
            print_r("<br>".$city."<br>");
            print_r($temperature_in_celcius."C"."<br>");
            print_r($current_weather."<br>");
            print_r($current_weather_description."<br>");
            ?>
            <section>
            </p>
       </div>
       <?php include('Index-TwitterAPI.php')?>  
       <?php
            foreach($twitter_output['statuses'] as $tweet){
                $url=$tweet['entities']['urls']['url'];
                $text=$tweet['text'];
                $screen_name=$tweet['user']['screen_name'];
                $profilepic=$tweet['user']['profile_image_url'];
            echo "<p class='tweets'><img id='profile' src='".$profilepic."'> ".$tweet['user']['screen_name']."  says...".$text."</p>";
       }
        ?>
        
    </main>
    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
