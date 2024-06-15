 <!DOCTYPE html>          
 <html lang="en"> 
    <head> 
 	<meta charset="UTF-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">    
 	<title>Brandon Wright - psybw7</title>
	 <link rel="stylesheet" href="css/index.css"> 
    </head> 

 	<script>

 	function submitValidator(data){

			let values = ["None","Movie-add","Movie-delete","Movie-search","Actor-add","Actor-delete","Actor-search"]
			let pages = ["NULL.php","MovieAdd.php","MovieDelete.php","MovieSearch.php","ActorAdd.php","ActorDelete.php","ActorSearch.php"]
			for(i = 0 ; i < values.length; i++){
				if(data.elements[0].value == values[i]){
					location.replace('PHP/' + pages[i]);
				} 
			}
			return false;
			
	 }

	</script>

 <body> 
	 
 			<div class="header"> <img src="assets/cozypepe.png"/> <b> Cinema Lexicon </b>  <img src="assets/cozypepe.png"/> </div>
	 		<form action="PHP/Decision.php" onSubmit="return submitValidator(this)">
				<div class="Options">
				<!-- <a  href="PHP/Add.php"> <button> <b> Add </b> </button> </a>
				<a  href="PHP/Search.php"> <button> <b> Search </b> </button> </a>
				<a  href="PHP/Delete.php"> <button> <b> Delete </b> </button> </a> -->
				<select name="Choose" id="Choose">
					<option value="None">select option</option>
					<option value="Movie-add">Movies - Add</option>
					<option value="Movie-delete">Movies - delete</option>
					<option value="Movie-search">Movies - search</option>
					<option value="None">------------</option>
					<option value="Actor-add">Actor - Add</option>
					<option value="Actor-delete">Actor - delete</option>
					<option value="Actor-search">Actor - search</option>

				</select>

 			<br/>
			<input type="submit" value="Let's go!" name="de">
			</form>


			</div>		
</body>  

</html>                                                        
