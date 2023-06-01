// Script pour la page "Panier"

function supprimerProduit(event) {

    var boutonSupprimer = event.target;
    var ligneProduit = boutonSupprimer.parentNode.parentNode;
    ligneProduit.remove();
    calculerTotal();
  }
  
  function calculerTotal() {
    var lignesProduits = document.querySelectorAll("table tbody tr");
    var montantTotal = 0;
    
    lignesProduits.forEach(function(ligne) {
      var prix = parseFloat(ligne.querySelector(".prix").textContent);
      var quantite = parseFloat(ligne.querySelector(".quantite").value);
      var sousTotal = prix * quantite;
      montantTotal += sousTotal;
    });
    
    document.querySelector(".montant-total").textContent = montantTotal.toFixed(2);
  }
  
  var boutonsSupprimer = document.querySelectorAll("button");
  boutonsSupprimer.forEach(function(bouton) {
    bouton.addEventListener("click", supprimerProduit);
  });
  
  var quantitesProduits = document.querySelectorAll(".quantite");
  quantitesProduits.forEach(function(quantite) {
    quantite.addEventListener("change", calculerTotal);
  });
  