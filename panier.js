$(document).ready(function() {
    function RécupArticles() {
      $.ajax({
        url: 'panier.php',
        dataType: 'json',
        success: function(data) {
          $.each(data, function(index, article) {
            var row = $('<tr></tr>');
  
            row.append('<td>' + article.nom + '</td>');
            row.append('<td>' + article.description + '</td>');
            row.append('<td>' + article.prix + ' €</td>');
            row.append('<td><button>Supprimer</button></td>');
  
            $('#article-body').append(row);
          });
  
          calculerTotal();
        },
        error: function() {
          alert('Une erreur s\'est produite lors de la récupération des articles.');
        }
      });
    }
  
    RécupArticles();
  
    function calculerTotal() {
      var total = 0;
  
      $('table tbody tr').each(function() {
        var price = parseFloat($(this).find('td:eq(2)').text().trim());
        if (!isNaN(price)) {
          total += price;
        }
      });
  
      $('.montant-total').text('Total: ' + total.toFixed(2) + ' €');
    }
  
    $('#btn-commande').click(function() {
      window.location.href = 'paiement.html';
    });
  });
  