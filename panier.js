$(document).ready(function() {
  function getArticles() {
    $.ajax({
      url: 'panier.php',
      dataType: 'json',
      success: function(data) {
        if (data.length === 0) {
          var emptyRow = $('<tr><td colspan="4">Votre panier est vide</td></tr>');
          $('#article-body').append(emptyRow);
        } else {
          $.each(data, function(index, article) {
            var row = $('<tr></tr>');

            row.append('<td>' + article.nom + '</td>');
            row.append('<td>' + article.description + '</td>');
            row.append('<td>' + article.prix + ' €</td>');
            row.append('<td><button>Supprimer</button></td>');

            $('#article-body').append(row);
          });
        }

        calculateTotal();
      },
      error: function() {
        alert('Une erreur s\'est produite lors de la récupération des articles.');
      }
    });
  }

  getArticles();

  function calculateTotal() {
    var total = 0;

    $('table tbody tr').each(function() {
      var priceText = $(this).find('td:eq(2)').text().trim();
      var price = parseFloat(priceText.replace(' €', ''));
      if (!isNaN(price)) {
        total += price;
      }
    });

    if (total === 0) {
      $('.montant-total').text('Votre panier est vide');
    } else {
      $('.montant-total').text('Total: ' + total.toFixed(2) + ' €');
    }
  }

  $('#btn-commande').click(function() {
    window.location.href = 'paiement.html';
  });
});
