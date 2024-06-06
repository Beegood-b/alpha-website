<?php require('./app/views/partials/head.php'); ?>
<?php require('./app/views/partials/header.php'); ?>
<?php require('./core/mail.php'); ?>

<main class="main" id="home">
  <div class="wrapper hide">
    <!-- Loader -->
    <?php include('./app/views/includes/loader.php'); ?>
    <!-- Swiper -->
    <?php include('./app/views/includes/carousel.php'); ?>
    <!-- Preview -->
    <?php include('./app/views/includes/preview.php'); ?>
    <!-- About us -->
    <?php include('./app/views/includes/about.php'); ?>
    <!-- Job description -->
    <?php include('./app/views/includes/jobdesc.php'); ?>
    <!-- Our works -->
    <?php include('./app/views/includes/gallery.php'); ?>
    <!-- Counter -->
    <?php include('./app/views/includes/counter.php'); ?>
    <!-- Parallax -->
    <?php include('./app/views/includes/parallax.php'); ?>
    <!-- Find us -->
    <?php include('./app/views/includes/location.php'); ?>
    <!-- Contact us -->
    <?php include('./app/views/includes/contact.php'); ?>
  </div>
</main>

<?php require('./app/views/partials/footer.php'); ?>