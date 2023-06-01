$(document).ready(function() {
  var $carrousel = $("#carrousel"); // on cible le bloc du carrousel
  $img = $("#carrousel img"); // on cible les images contenues dans le carrousel
  indexImg = $img.length - 1; // on définit l'index du dernier élément
  i = 0; // on initialise un compteur
  $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)
  $img.css("display", "none"); // on cache les images
  $currentImg.css("display", "block"); // on affiche seulement l'image courante
  $carrousel.append('<div class="controls"><span class="prev">Precedent</span><span class="next">Suivant</span></div>');

    $(document).on('click', '.next', function() { // image suivante
        i++;
        if (i > indexImg) {
            i = 0;
        }
        $img.css('display', 'none');
        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');
        });

        $(document).on('click', '.prev', function() { // image précédente
        i--;
        if (i < 0) {
            i = indexImg;
        }
        $img.css('display', 'none');
        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');
    });
        
    function slideImg() {
        setTimeout(function() {
          if (i < indexImg) {
            // si le compteur est inférieur au dernier index
            i++; // on l'incrémente
          } else {
            // sinon, on le remet à 0 (première image)
            i = 0;
          }
          $img.css("display", "none");
          $currentImg = $img.eq(i);
          $currentImg.css("display", "block");
          slideImg(); // on oublie pas de relancer la fonction à la fin
        }, 3000); // on définit l'intervalle à 4000 millisecondes (4s)
    }

  slideImg(); // enfin, on lance la fonction une première fois
});