<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  echo '<link href="assets/css/output.css" rel="stylesheet" />';
  echo '<link href="assets/css/styles.css" rel="stylesheet" />';
  ?>
  <title>Lesson Template</title>
</head>

<body>
    <!-- Header -->
  <?php require_once "header.php"; ?>

    <!-- Hero Section -->
    <?php require_once "sections/hero.php"; ?>

    <!-- Courses Section -->
    <?php require_once "sections/courses.php"; ?>

    <!-- Testimonial Section -->
    <?php require_once "sections/testimonial.php"; ?>

    <!-- Features Section -->
    <?php require_once "sections/features.php"; ?>

    <!-- CTA Section -->
    <?php require_once "sections/cta.php"; ?>

    <!-- Blog Section -->
    <?php require_once "sections/blog.php"; ?>

    <!-- Footer -->
    <?php require_once "footer.php"; ?>
</body>

</html>



