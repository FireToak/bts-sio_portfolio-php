<?php include 'config.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Bienvenue sur mon portfolio dynamique !</h2>
<p>Heure : 
    <?php 
          date_default_timezone_set('Europe/Paris'); 
          echo date('H:i'); 
    ?>
</p>

<?php include 'includes/footer.php'; ?>