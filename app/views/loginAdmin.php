<?php
$base_url = Flight::app()->get('flight.base_url');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="<?= $base_url ?>/public/assets/admin/css/bootstrap-login-form.min.css" />
</head>

<body>
  <!-- Start your project here-->
  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">ADMIN</h3>
              <form id="loginForm" method="post">
                <div class="form-outline mb-4">
                  <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">Email</label>
                </div>
                <div class="form-outline mb-4">
                  <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX-2">Password</label>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->
   
  <!-- MDB -->
  <script type="text/javascript" src="<?= $base_url ?>/public/assets/admin/js/mdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        const submitButton = $(this).find('button[type="submit"]');
        const originalText = submitButton.text(); // Sauvegarde le texte original du bouton
        // Change le texte du bouton pendant le chargement
        submitButton.text('Connexion en cours...').prop('disabled', true);
        $.ajax({
          url: '<?= $base_url ?>/traitement/login', // URL de l'action PHP
          type: 'POST',
          data: $(this).serialize(), // Sérialise les données du formulaire
          success: function(response) {
            if (response.con == 1) {
              // // Attend 3 secondes avant de rediriger
              setTimeout(function() {
                window.location.href = '<?= $base_url ?>/hello'; // Exemple de redirection
              }, 3000); // 3000 ms = 3 secondes
            } else {
              // Affiche un message d'erreur
              alert('Email ou mot de passe incorrect');
              submitButton.text(originalText).prop('disabled', false); // Rétablit le texte du bouton
            }
          },
          error: function(xhr, status, error) {
            // Gérez les erreurs de la requête AJAX
            console.error(xhr.responseText);
            alert('Une erreur s\'est produite lors de la connexion.');
            submitButton.text(originalText).prop('disabled', false); // Rétablit le texte du bouton
          }
        });
      });
    });
  </script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>