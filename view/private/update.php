<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update du point</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/form.css">
</head>

<body class="bg-dark text-light">

  <?php
  require "menu.php";
  ?>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Modification du point</h1>
    <div class="alert alert-success text-center <?=$displaySuccess?>">Nouveau point modifié avec succés, vous êtes redirigé vers l'accueil</div>
<form method="post" action="" class="row gy-4 <?=$displayForm?>">
  <input id="idloc" type="hidden" name="idLocalisation" value="<?= $OneLocal['id'] ?>">

  <div class="col-md-6">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="nom" name="nom" value="<?= $OneLocal['nom'] ?>" />
  </div>
  <div class="col-md-6">
    <label for="adresse" class="form-label">Adresse</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="adresse" name="adresse" value="<?= $OneLocal['adresse'] ?>" />
  </div>
  <div class="col-md-6">
    <label for="ville" class="form-label">Ville</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="ville" name="ville" value="<?= $OneLocal['ville'] ?>" />
  </div>
  <div class="col-md-6">
    <label for="numero" class="form-label">Numéro</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="numero" name="numero" value="<?= $OneLocal['numero'] ?>" />
  </div>
  <div class="col-md-6">
    <label for="codepostal" class="form-label">Code postal</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="codepostal" name="codepostal" value="<?= $OneLocal['codepostal'] ?>" />
  </div>
  <div class="col-md-3">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="latitude" name="latitude" value="<?= $OneLocal['latitude'] ?>" />
  </div>
  <div class="col-md-3">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" class="form-control form-control-lg bg-dark text-light" id="longitude" name="longitude" value="<?= $OneLocal['longitude'] ?>" />
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-success btn-lg w-100">
      Modifier le point n° <?= $OneLocal['id'] ?>
    </button>
  </div>
</form>
    <?php
    if (isset($errorUpdate)):
    ?>
      <div class="alert alert-danger mt-3 text-center"><?= $errorUpdate ?></div>
    <?php
    endif;
    ?>
  </div>
  <?php require "footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php
  if(isset($jsDirect)):
  ?>
  <?=$jsDirect?>
  <?php
  endif;
  ?>
</body>

</html>