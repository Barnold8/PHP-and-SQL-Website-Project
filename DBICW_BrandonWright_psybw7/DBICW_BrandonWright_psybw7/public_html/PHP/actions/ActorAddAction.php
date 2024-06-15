<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../css/display.css">
    <script src="../../JS/validate.js"></script>

    <?php
        
        function generateAllowed(){

            $x = [];
            for ($i = 0; $i <= 10; $i++) {
                array_push($x,(string)$i);
            }
            for($i = 0; $i < 26; $i++){
                $a = chr($i + 97);
                $b = chr($i + 65);
                array_push($x,(string)$a);
                array_push($x,(string)$b);
            }
            array_push($x," ");
            return $x;
        }


        $title = $_GET['title'];
        echo "<title> Adding Actor: " . $title . "</title>";

        $split = str_split($title);
        $x = generateAllowed();
        $b = true;

        // echo "<h1 class='header'> " . $x . "</h1>";

        foreach ($split as $char){
            
            if(!(in_array($char, $x))){
                echo $char;
                $b = false;
            }

        }
        
        if($b == false){
           echo "<div class='errorDIV'>";
           echo "<img src='../../assets/sadpepe.png' class='errorIMG'>";
           echo "<br/> <p> <h1> ERROR: </h1> <br/> Somehow the link has been altered to allow faulty text. Such text can't be processed in the database. Please return. ";
           echo "<br/> <a href='http://avon.cs.nott.ac.uk/~psybw7'> >>>> Return here <<<< </a>";
           echo "</div>";

           die();
        }
       
        
    ?>

  </head>
  <body>
	 
  <div class="back"> <b> <a href="http://avon.cs.nott.ac.uk/~psybw7"> RETURN</a> </b></div>

  <?php  
        
        $db_host = "mysql.cs.nott.ac.uk"; 
        $db_name = "psybw7_Movies";
        $db_user = "psybw7_Movies";
        $db_pass = "Bloodkill08";
        $headST = "<div class='header'>";
        $headEN = "</div>";

        
        $conn = new mysqli($db_host,$db_user,$db_pass,$db_name);
        if($conn->connect_errno) die("<div class='header'>FAILED TO CONNECT TO DATABASE </div>\n</body></html>");
        
        $sql = "INSERT INTO Actor (actName) VALUES ('$title')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // $stmt->bind_result($actID, $actName);

    ?>

    <script> showAll(1) </script>


    
  </body>
  
</html>