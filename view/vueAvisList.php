<?php
if (!isset($_SESSION["user"])) {
  session_start();
}

if (!isset($_SESSION["user"])) {
  $titre = "Tous les avis ";
} else {
  $titre = "Vos Avis";
}

include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="container">
    <section>
      <?php if ($allAvis == null) : ?>
        <h3>Aucun Avis n'a été publié</h3>
      <?php else : ?>
        <?php include("tableAvis.php"); ?>
      <?php endif; ?>      
      <?php if (!isset($_SESSION["user"])) : ?>
        <button class="styled"><a href="../view/vueLogUser.php">Ajouter un avis</a></button>
        <button class="styled"><a href="../view/vueLogUser.php">Voir mes avis</a></button>
      <?php else : ?>
        <button class="styled"><a href="../controller/createAvis.php">Ajouter un avis</a></button>
      <?php endif; ?>
    </section>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>