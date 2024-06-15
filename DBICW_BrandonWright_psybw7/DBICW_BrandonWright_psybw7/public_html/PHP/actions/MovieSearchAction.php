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
        echo "<title> Searching for: " . $title . "</title>";

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
	 
  <div class="back"> <b> <a href="http://avon.cs.nott.ac.uk/~psybw7"> RETURN </a> </b></div>

  <?php  
        
        $db_host = "mysql.cs.nott.ac.uk"; 
        $db_name = "psybw7_Movies";
        $db_user = "psybw7_Movies";
        $db_pass = "Bloodkill08";
        $headST = "<div class='header'>";
        $headEN = "</div>";

            // mvID | mvTitle                 | actID | mvPrice | mvYear | mvGenre
        $conn = new mysqli($db_host,$db_user,$db_pass,$db_name);
        if($conn->connect_errno) die("<div class='header'>FAILED TO CONNECT TO DATABASE </div>\n</body></html>");
        else echo $headST . " <img src='../../assets/cozypepe.png'/ class='img'> <b>". $title . "<img src='../../assets/cozypepe.png'/ class='img'>" .$headEN;
        $sql = "SELECT mvId, mvTitle,mvPrice, mvYear, mvGenre FROM Movie WHERE mvtitle='$title'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($mvId, $mvTitle,$mvPrice, $mvYear, $mvGenre);

    ?>

    <div class="results">
        <table width="750" border="1" cellpadding="1" cellspacing="1">
           
            <tr> 
                <th> mvID </th>
                <th> mvTitle </th>
                <th> mvPrice</th>
                <th> mvYear</th>
                <th> mvGenre</th>
            </tr>

            
    <?php
    
         while($stmt->fetch()){

            echo "<tr>";
            echo "<td>" . htmlentities($mvId) . "</td>";
            echo "<td>" . htmlentities($mvTitle) . "</td>";
            echo "<td>£" . htmlentities($mvPrice) . "</td>";
            echo "<td>" . htmlentities($mvYear) . "</td>";
            echo "<td>" . htmlentities($mvGenre) . "</td>";
            echo "<tr>";
         }
    ?>


            </table>


    </div>
    
    <div class="Centered-button">

        <button type="button" onClick="showAll(0)"> Show All Movies </button>
   
    </div>
  </body>
  
</html>