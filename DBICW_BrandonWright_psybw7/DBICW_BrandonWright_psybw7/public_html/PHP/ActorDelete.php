<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/SearchForm.css">
    <script src="../JS/validate.js"></script>


  </head>
  <body>
	 
  <div class="back"> <b> <a href="http://avon.cs.nott.ac.uk/~psybw7"> RETURN</a> </b></div>
  <?php $title = basename(__FILE__, '.php'); 
  echo " <div class='header'> <img src='../assets/cozypepe.png'/> <b> ". $title . "</b>  <img src='../assets/cozypepe.png'/> </div>";
  ?>

  <!-- -->
  <form action=" actions/ActorDeleteAction.php" onSubmit="return validate(this)">
      
      <input type="text" name="title" class="inputField" value="Enter actor name here">
      <br/><br/>
      <input type="submit" value="Delete Actor">

  </form>
 

  </body>
</html>