function text(x){
    if(x == 3){
      document.getElementById("mycode1").style.display = "none";
    }else if(x == 2){
      document.getElementById("mycode1").style.display = "block"; 
    }else if(x ==1){
      document.getElementById("mycode").style.display = "none"; 
    }else{
      document.getElementById("mycode").style.display = "block"; 
    }
    return;
  }
  

  function logout(){
    var ans = window.confirm("Are you sure?");
    if(ans){
          window.location = 'index.php';
    }
  }

  function activelist(){
   
    return;
}