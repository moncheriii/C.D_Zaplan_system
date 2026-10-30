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

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: {
        colors: { navy: '#15233e', amber: { DEFAULT: '#f5a623', hover: '#e09216' } },
        fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] }
      } }
    }
  </script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link rel="icon" href="assets/img/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="antialiased">

<?php if (!$hidePublicHeader): ?>
<header class="sticky top-0 z-50 bg-white border-b border-slate-200">
  <div class="max-w-6xl mx-auto px-6 h-[72px] flex items-center justify-between">
    <a href="index.php" class="flex items-center gap-3">
      <img src="assets/img/logo.png" alt="C.D. Zaplan Trucking logo" class="h-11 w-auto">
      <span class="font-bold text-xl text-navy tracking-tight">C.D. Zaplan Trucking</span>
    </a>

    <nav class="hidden md:flex items-center gap-9 text-sm font-medium text-navy">
      <a href="index.php#about"    class="hover:text-amber">Services</a>
      <a href="index.php#projects" class="hover:text-amber">Projects</a>
      <a href="index.php#about"    class="hover:text-amber">About Us</a>
      <a href="#contact"           class="hover:text-amber">Contact</a>
    </nav>

    <div class="hidden md:flex items-center gap-3">
      <?php if ($isLoggedIn): ?>
        <a href="register.php" class="btn-amber btn-label text-[11px] px-5 py-2.5 rounded-lg">Register</a>
        <a href="login.php" class="btn-label text-[11px] px-5 py-2.5 rounded-lg border-2 border-navy text-navy hover:bg-slate-50">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn-label text-[11px] px-5 py-2.5 rounded-lg border-2 border-navy text-navy hover:bg-slate-50">Log In</a>
        <a href="register.php" class="btn-amber btn-label text-[11px] px-5 py-2.5 rounded-lg">Register</a>
      <?php endif; ?>
    </div>

    <button onclick="toggleMenu()" class="md:hidden p-2 text-navy" aria-label="Menu">
      <iconify-icon icon="lucide:menu" width="24"></iconify-icon>
    </button>
  </div>

  <!-- Mobile menu -->
  <div id="mobileMenu" class="hidden md:hidden border-t border-slate-200 px-6 py-4 space-y-4 bg-white">
    <div class="flex gap-6 text-sm font-medium">
      <a href="index.php#about">Services</a>
      <a href="index.php#projects">Projects</a>
      <a href="index.php#about">About Us</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="grid grid-cols-2 gap-3">
      <a href="login.php" class="btn-label text-[11px] text-center py-3 rounded-lg border-2 border-navy text-navy">Log In</a>
      <a href="register.php" class="btn-amber btn-label text-[11px] text-center py-3 rounded-lg">Register</a>
    </div>
  </div>
</header>
<?php endif; ?>
