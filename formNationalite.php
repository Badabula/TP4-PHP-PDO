<!doctype html>
<html lang="en">
  <?php include "bootstrap.php" ; ?>
  <body>
    
  
    <?php include "header.php"; 
    include "fontawesome.php";
    $action=$_GET['action'];
    
    if ($action == "Modifier") {
      include "connexionPDO.php";
      $num=$_GET['num'];
      $req=$monPdo->prepare("select * from nationalite where num= :num");
      $req->setFetchMode(PDO::FETCH_OBJ);
      $req->bindParam(':num', $num);
      $req->execute();
      $laNationalite=$req->fetch();
    }
    ?>

    <div class="container mt-2">
      <h2 class='text-center'><?php echo $action ?> une nationalité</h2>
    <form action="valideFormNationalite.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3">
        <div class="form-group">
            <label for="libelle" class="mb-2">Libellé</label>
            <input type="text" class='form-control' id='libelle' placeholder="Saisir libellé" name='libelle' value="<?php if ($action == "Modifier") {echo $laNationalite->libelle;} ?>">
        </div>
        
        <input type="hidden" id="num" name="num" value="<?php if ($action == "Modifier") {echo $laNationalite->num;} ?>">
    
    <div class="row mt-2">
        <div class="col"><a href="listeNationalites.php" class="btn btn-warning w-100">Revenir a la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success w-100'> <?php echo $action ?></button></div>
    </div>
    </form>
      
          
    

      

       
    
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
          &copy; 2022
    </footer>
    
  </body>
</html>
