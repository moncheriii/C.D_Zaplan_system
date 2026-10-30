<?php
$pageTitle = 'Log In | C.D. Zaplan Trucking';
$hidePublicHeader = true;
$panelHeadline = 'Ready for<br>the next job.';
require_once __DIR__ . '/includes/header.php';
?>
<div class="auth">
  <div class="auth__top">
    <a href="index.php" class="brand">
      <img src="assets/img/logo.png" alt="C.D. Zaplan Trucking logo" class="brand__logo">
      <span class="brand__name">C.D. Zaplan Trucking</span>
    </a>
    <a href="index.php" class="back-link">← Back to homepage</a>
  </div>

  <div class="auth__body">
    <?php require __DIR__ . '/includes/auth-panel.php'; ?>

    <div class="auth__form">
      <div class="eyebrow eyebrow--muted">Your projects. One account.</div>
      <h1 class="auth__title">Welcome .</h1>
      <p class="auth__sub">Log in to manage your rentals, projects, and account.</p>

      <form onsubmit="handleLogin(event)" class="form form--auth">
        <div>
          <label class="label">Email</label>
          <input type="email" required placeholder="you@example.com" class="field">
        </div>
        <div>
          <label class="label">Password</label>
          <div class="field-wrap">
            <input type="password" required placeholder="Enter your password" class="field field--password">
            <button type="button" onclick="togglePassword(this)" class="password-toggle" aria-label="Show password">
              <iconify-icon icon="lucide:eye" width="16"></iconify-icon>
            </button>
          </div>
        </div>
        <div class="form-meta">
          <label class="check">
            <input type="checkbox"> Remember Me
          </label>
          <a href="#" class="link-underline">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn--amber btn--block">Log In</button>
      </form>

      <p class="auth__switch">
        New to C.D. Zaplan? <a href="register.php" class="link-underline">Register</a>
      </p>
    </div>
  </div>

  <div class="auth__footer">
    <div>© 2026 C.D. Zaplan Trucking. All rights reserved.</div>
    <div class="auth__footer-links"><a href="#">Privacy Policy</a> &nbsp;·&nbsp; <a href="#">Terms of Service</a></div>
  </div>
</div>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
