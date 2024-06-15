
function generateAllowed(retType = false){ // retType is used to determine the return type AKA, the actual thing the function returns

    let x = [];
    for(i = 0 ; i < 10; i++){
      x.push(i.toString());
    }
    if(!retType){

      for(i = 0; i < 26; i++){

        x.push(String.fromCharCode(97 + i)); // Using ascii, we can use 97 as a base number and i as an offset for all the lower case characters in the ascii set
        x.push(String.fromCharCode(65 + i)); // Same premise for this line too
      }
      x.push(" ");
    }
   
   return x;
}

function showAll(path){ // This is just used to redirect the user to the full table for their respective table. | Add actor -> redirect to AllActors.php

  if(path == 0)
    window.location.replace("../actions/AllMovies.php");
  else
    window.location.replace("../actions/AllActors.php");
}

function hasLetters(string){ // Returns true is the string contains letters (used for integer sanitisation)

  letters = false;
  let nums = generateAllowed(true);
  for (i = 0; i < string.length; i++) {
    if(!(nums.includes(string[i]))){
      letters = true;
    }

  }
  return letters;

}

function validate(form,multi=false){ // Validates the user input on a general basis across all forms. 
                                    //form is the form used on the webpage. Multi is used to process a form that has multiple submit features.Multi is by default false
                                      // since most of the php forms have 1 entry field.
  let allowStr = generateAllowed();
  let allow = true;
  for(x = 0; x < form.elements.length; x++){
    for(i = 0; i < (form.elements[x].value).length; i++){
      
      if(!(allowStr.includes(form.elements[x].value[i]))){
        allow = false;
        alert("Please only input: letters, numbers and spaces. Thank you.")
        break;
      }

    }
  } 
  
  if(multi){
      if(hasLetters(form.elements[2].value) || hasLetters(form.elements[3].value) || hasLetters(form.elements[1].value)  ){
        allow = false;
        alert("ERROR: Either price or year contains non number characters (This includes spaces). Please try again. ");
      }
    }

  return allow; // Since we are returning a boolean value for the form, we can just return allow, which in itself is a boolean value
}