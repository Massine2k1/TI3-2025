<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Administration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/admin.css">
<body class="bg-dark text-light">

  <?php require "menu.php"; ?>

  <div class="container mt-5">
    <h1 class="mb-5 text-center">Tableau des localisations </h1>
    <?php
    if (!empty($localisations)):
      $nbloc = count($localisations);
      $nbloc > 1 ? $pluriel = "x" : $pluriel = "";
    ?>
      <div class="d-flex flex-column align-items-center flex-sm-row justify-content-between g-5 mb-4">
        <h2 class="mb-3">Il y a <?= $nbloc ?> lieu<?= $pluriel ?> <i class="bi bi-arrow-down-square"></i></h2>
        <input type="text" class="form-control w-25" id="input" placeholder="Rechercher par nom...">
      </div>
      <div class="table-responsive shadow-lg rounded mb-5">
        <table class="table table-dark table-hover align-middle">
          <thead>
            <tr>
              <th>id</th>
              <th>nom</th>
              <th>adresse</th>
              <th>numero</th>
              <th>ville</th>
              <th>codepostal</th>
              <th>latitude</th>
              <th>longitude</th>
              <th>Supprimer</th>
              <th>Modifier</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($localisations as $l):
            ?>
              <tr>
                <td><?= $l['id'] ?></td>
                <td class="nom"><?= $l['nom'] ?></td>
                <td><?= $l['adresse'] ?></td>
                <td><?= $l['numero'] ?></td>
                <td><?= $l['ville'] ?></td>
                <td><?= $l['codepostal'] ?></td>
                <td><?= $l['latitude'] ?></td>
                <td><?= $l['longitude'] ?></td>
                <td>
                  <a onclick="if(confirm('Voulez-vous vraiment supprimer l\'article : <?= addslashes(html_entity_decode($l['nom'])); ?> ?')){window.location.href='./?pg=delete&idLocalisation=<?= $l['id'] ?>';}" class="btn btn-danger btn-sm rounded-3">
                    Supprimer
                  </a>
                </td>
                <td>
                  <a href="./?pg=update&idLocalisation=<?= $l['id'] ?>" class="btn btn-success btn-sm rounded-3">
                    Modifier
                  </a>
                </td>
              </tr>
            <?php
            endforeach;
          else:
            ?>
            <tr>
              <td colspan="10" class="text-center align-middle">
                <strong><i class="bi bi-info-circle-fill me-2"></i> Pas encore de Lieux</strong>
              </td>
            </tr>
          <?php
          endif;
          ?>
          </tbody>
        </table>
      </div>
      <?php
      foreach ($localisations as $l):
      ?>
      <div class="card text-bg-secondary bg-opacity-25 mb-3">
        <div class="card-header bg-secondary bg-opacity-25">
          <strong>Nom</strong> : <span class="nom"><?=$l['nom']?></span>
        </div>
        <div class="card-body">
          <card class="card-text">
            <strong>Adresse :</strong> <?=$l['adresse']?><?= $l['numero'] ?>
          </card>
          <div class="card-text">
            <strong>Ville</strong> : <?=$l['codepostal']?> <?= $l['ville'] ?>
          </div>
          <div class="card-text mb-3">
            <strong>latitude : </strong> <?=$l['latitude']?> | <strong>longitude :</strong> <?=$l['longitude']?>
          </div>
          <div class="row">
            <div class="col-6">
              <a onclick="if(confirm('Voulez-vous vraiment supprimer l\'article : <?= addslashes(html_entity_decode($l['nom'])); ?> ?')){window.location.href='./?pg=delete&idLocalisation=<?= $l['id'] ?>';}" class="btn btn-danger btn-sm rounded-3 w-100">
                Supprimer
              </a>
            </div>
            <div class="col-6">
              <a href="./?pg=update&idLocalisation=<?= $l['id'] ?>" class="btn btn-success btn-sm rounded-3 w-100">
                    Modifier
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php
      endforeach;
      ?>
  </div>
     <?php require "footer.php"; ?>
     
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {

        const search = document.getElementById('input');
        const tableRows = document.querySelectorAll('tbody tr');
        const card = document.querySelectorAll('.card');
        
        search.addEventListener('input', function() {
          const searchValue = search.value.trim().toLowerCase();
          
          tableRows.forEach(row => {
            const nomCell = row.querySelector('.nom'); 
            const nomText = nomCell.textContent.toLowerCase();
            
            if (nomText.startsWith(searchValue)) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          });

          card.forEach(element=>{
            const divName = element.querySelector('.nom');
            const NameContent = divName.textContent.toLowerCase();

            if(NameContent.startsWith(searchValue)){
              element.style.display = '';
            }else{
              element.style.display = 'none';
            }
          })
                

        });
      });
</script>
</body>

</html>