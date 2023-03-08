<!doctype html>
<html lang="en">
  <?php include "bootstrap.php" ?>
  <body>
    
  
    <?php
    include "header.php";
    include "connexionPDO.php";
    include "fontawesome.php";

    $req = $monPdo->prepare("select * from nationalite");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $lesNationalites = $req->fetchAll();
    ?>

    <div class="container mt-5">
      <div class="row pt-3">
        <div class="col-9"><h1 class= "h1">Liste des nationalités</h1></div> 
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class="btn btn-success">créer une nationalité</a></div>
      </div>  
        <table class="table table-hover">
          <thead>
              <tr class="d-flex">
              <th scope="col" class="col-md-2">Numéro</th>
              <th scope="col" class="col-md-8">libelle</th>
              <th scope="col" class="col-md-2">Actions</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($lesNationalites as $nationalite) {
                echo "<tr class='d-flex'>";
                echo "<td class='col-md-2'>$nationalite->num</td>";
                echo "<td class='col-md-8'>$nationalite->libelle</td>";
                echo "<td class='col-md-2'>
              <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
              <a href='#modalSup' data-bs-toggle='modal' data-bs-target='#modalSup' data-suppression='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='fas fa-trash'></i></a>
              </td>";
                echo "</tr>";
            } ?>
          </tbody>
        </table>
    </div>

  <div class="modal fade" id="modalSup" tabindex="-1" aria-labelledby="ModalSupLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">confiramtion de suppression</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>voules vous supprimer cette nationalité?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ne pas supprimer</button>
          <a href="" type="button" class="btn btn-primary" id="btnSupp">Supprimer</a>
        </div>
      </div>
    </div>
  </div>
        

  </body>
  <footer>
      <?php include "footer.php";?>
  </footer>
</html>
