<?php
     if(isset($_POST["submit"])){
          if(empty($_POST["city"])){
               echo "Enter city name";
          }else{
               $city = $_POST["city"];
               $api_key="1cba2f4584c7bcd435cdfa1bebf77b20";
               $api= "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key";
               $api_data= file_get_contents($api);
               //print_r($api_data);

               $weather=json_decode($api_data,true);
               //print_r($weather);
               $celcius = $weather["main"]["temp"] -273;

               



          }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Weather App</title>
</head>
<body>
     <section>
          <form method="post">
               <h1>The Weather App</h1>
               <input type="text" name="city" id="">
               <input name="submit" type="submit" value="Check weather">
          </form>
          <?php
               echo $weather["weather"][0]["description"];
               echo "<br>";
               echo $celcius." celcius degrees";

          ?>
     </section>
</body>
</html>