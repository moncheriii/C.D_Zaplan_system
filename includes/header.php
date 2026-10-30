<?php
/*
 * Shared <head> + public navigation.
 * Set these BEFORE including:
 *   $pageTitle        string
 *   $hidePublicHeader true on login / register / admin / dashboard
 *   $isLoggedIn       true to show the "REGISTER + LOGOUT" nav from the Figma
 */
$pageTitle        = $pageTitle        ?? 'C.D. Zaplan Trucking';
$hidePublicHeader = $hidePublicHeader ?? false;
$isLoggedIn       = $isLoggedIn       ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link rel="icon" href="assets/img/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php if (!$hidePublicHeader): ?>
<header class="site-header">
  <div class="site-header__inner">
    <a href="index.php" class="brand">
      <img src="assets/img/logo.png" alt="C.D. Zaplan Trucking logo" class="brand__logo">
      <span class="brand__name">C.D. Zaplan Trucking</span>
    </a>

    <nav class="site-nav">
      <a href="index.php#about">Services</a>
      <a href="index.php#projects">Projects</a>
      <a href="index.php#about">About Us</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="site-header__actions">
      <?php if ($isLoggedIn): ?>
        <a href="register.php" class="btn btn--amber btn--nav">Register</a>
        <a href="login.php" class="btn btn--outline btn--nav">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn btn--outline btn--nav">Log In</a>
        <a href="register.php" class="btn btn--amber btn--nav">Register</a>
      <?php endif; ?>
    </div>

    <button onclick="toggleMenu()" class="menu-toggle" aria-label="Menu">
      <iconify-icon icon="lucide:menu" width="24"></iconify-icon>
    </button>
  </div>

  <!-- Mobile menu -->
  <div id="mobileMenu" class="mobile-menu hidden">
    <div class="mobile-menu__links">
      <a href="index.php#about">Services</a>
      <a href="index.php#projects">Projects</a>
      <a href="index.php#about">About Us</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="mobile-menu__actions">
      <a href="login.php" class="btn btn--outline btn--nav btn--nav-block">Log In</a>
      <a href="register.php" class="btn btn--amber btn--nav btn--nav-block">Register</a>
    </div>
  </div>
</header>
<?php endif; ?>
