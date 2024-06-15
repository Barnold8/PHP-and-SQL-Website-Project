<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/MVADD.css">
    <script src="../JS/validate.js"></script>


  </head>
  <body>
	 
  <div class="back"> <b> <a href="http://avon.cs.nott.ac.uk/~psybw7"> RETURN</a> </b></div>
  <?php $title = basename(__FILE__, '.php'); 
  echo " <div class='header'> <img src='../assets/cozypepe.png'/> <b> ". $title . "</b>  <img src='../assets/cozypepe.png'/> </div>";
  ?>

   <!-- mvID | mvTitle                 | actID | mvPrice | mvYear | mvGenre -->
  <form action=" actions/MovieAddAction.php" onSubmit="return validate(this,true)">
      
      <input type="text" name="Movie" class="inputField" value="Enter Movie name here">
    
      <input type="text" name="Actor" class="inputField" value="Enter actor ID here">

      <input type="text" name="Price" class="inputField" value="Enter the price here">
  
      <input type="text" name="Year" class="inputField" value="Enter the Year here">

      <input type="text" name="Genre" class="inputField" value="Enter genre here">

      <input type="submit" value="Add Movie">

  </form>
 

  </body>
</html>