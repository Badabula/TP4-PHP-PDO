<!doctype html>
<html lang="en">
<?php include "bootstrap.php"; ?>
<body>
    
  <main>

      <?php include "header.php";
      include "connexionPDO.php";
      $num=$_GET['num'];
      
      $req=$monPdo->prepare("delete from nationalite where num = :num");
      $req->bindParam(':num', $num);
      $nb=$req->execute();

      
      
      echo '<div class="container mt-5">';
      

      if($nb == 1){
          echo '<div class="alert alert-success" role="alert">la nationalité a ete bien supprimé</div>';
      }else{
          echo'<div class="alert alert-success" role="alert">la nationalié n\'a pas été supprimé</div>';
      }
      ?>
      <a href="listeNationalites.php" class="btn btn-primary">liste des nationalités</a>
      

      <footer class="pt-3 mt-4 text-muted border-top">
        &copy; 2022
      </footer>
    </div>
  </main>


    
</body>
</html>
