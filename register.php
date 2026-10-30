<?php
$pageTitle = 'Create Account | C.D. Zaplan Trucking';
$hidePublicHeader = true;
$panelHeadline = 'Build your next<br>project right.';
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
      <h1 class="auth__title">Create your account</h1>
      <p class="auth__sub">Get started with reliable equipment and a crew you can count on.</p>

      <form onsubmit="handleRegister(event)" class="form form--auth">
        <div>
          <label class="label">Full Name</label>
          <input type="text" required placeholder="Enter your full name" class="field">
        </div>
        <div>
          <label class="label">Email</label>
          <input type="email" required placeholder="you@example.com" class="field">
        </div>
        <div>
          <label class="label">Password</label>
          <div class="field-wrap">
            <input type="password" required minlength="8" placeholder="Create a password" class="field field--password">
            <button type="button" onclick="togglePassword(this)" class="password-toggle" aria-label="Show password">
              <iconify-icon icon="lucide:eye" width="16"></iconify-icon>
            </button>
          </div>
          <p class="form-hint">Use at least 8 characters.</p>
        </div>
        <div>
          <label class="label">Confirm Password</label>
          <div class="field-wrap">
            <input type="password" required placeholder="Re-enter your password" class="field field--password">
            <button type="button" onclick="togglePassword(this)" class="password-toggle" aria-label="Show password">
              <iconify-icon icon="lucide:eye" width="16"></iconify-icon>
            </button>
          </div>
        </div>
        <button type="submit" class="btn btn--amber btn--block">Create Account</button>
      </form>

      <p class="auth__switch">
        Already have an account? <a href="login.php" class="link-underline">Log In</a>
      </p>
      <p class="auth__legal">
        By creating an account, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
      </p>
    </div>
  </div>

  <div class="auth__footer">
    <div>© 2026 C.D. Zaplan Trucking. All rights reserved.</div>
    <div class="auth__footer-links"><a href="#">Privacy Policy</a> &nbsp;·&nbsp; <a href="#">Terms of Service</a></div>
  </div>
</div>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
