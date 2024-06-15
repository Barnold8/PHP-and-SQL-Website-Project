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

        // Movie
        // Actor
        // Price
        // Genre
        $title = $_GET['Movie'];
        $Actor = $_GET['Actor'];
        $Price = $_GET['Price'];
        $Year = $_GET['Year'];
        $Genre = $_GET['Genre'];
        echo "<title> Adding Movie: " . $title . "</title>";

        $x = generateAllowed();
        $link_parts = [$title,$Actor,$Price,$Genre];

        // echo "<h1 class='header'> " . $x . "</h1>";

        function parseLink($link,$x){

            $b = true;
            foreach ($link as $elem){

                $split = str_split($elem);
                foreach ($split as $char){
            
                    if(!(in_array($char, $x))){
                        echo $char;
                        $b = false;
                    }
        
                }

            }
            return $b;
        }
        $b = parseLink($link_parts,$x);
       
        
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
        

        //
        $sql = "INSERT INTO Movie ( mvTitle,actID,mvPrice,mvYear,mvGenre) VALUES ('$title',$Actor, $Price,$Year,'$Genre');";
        // echo "<div class='header'>" . $title ."<br/>" .$Actor  ."<br/>". $Price  ."<br/>".$Year  ."<br/>".$Genre  ."<br/>". "</div>"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        


        // ;
        

    ?>

    <script> showAll(0) </script>

    <?php  ?>
    
  </body>
  
</html>