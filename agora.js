function displayAccueil(content) { 
    document.getElementById("acceuil").innerHTML = content.responseText; 
    console.log("acceuil");
  }

  function displayParcourir(content) {  
    document.getElementById("parcourir").innerHTML = content.responseText; 
    console.log("parcourir");
  }

  function displayNotification(content) {  
    document.getElementById("notification").innerHTML = content.responseText; 
    console.log("notification");
  }

  function displayPanier(content) {  
    document.getElementById("panier").innerHTML = content.responseText; 
    console.log("panier");
  }

  function displayCompte(content) {  
    document.getElementById("compte").innerHTML = content.responseText; 
    console.log("compte");
  }