<?php
$pageTitle = 'Log In | C.D. Zaplan Trucking';
$hidePublicHeader = true;
$panelHeadline = 'Ready for<br>the next job.';
require_once __DIR__ . '/includes/header.php';
?>
<div class="max-w-6xl mx-auto px-6 py-8 min-h-screen flex flex-col">
  <div class="flex items-center justify-between">
    <a href="index.php" class="flex items-center gap-3">
      <img src="assets/img/logo.png" alt="C.D. Zaplan Trucking logo" class="h-11 w-auto">
      <span class="font-bold text-xl text-navy tracking-tight">C.D. Zaplan Trucking</span>
    </a>
    <a href="index.php" class="text-xs font-bold text-navy hover:text-amber">← Back to homepage</a>
  </div>

  <div class="grid md:grid-cols-2 gap-10 md:gap-16 mt-8 items-center flex-1">
    <?php require __DIR__ . '/includes/auth-panel.php'; ?>

    <div class="w-full max-w-md md:mx-auto">
      <div class="eyebrow text-slate-500">Your projects. One account.</div>
      <h1 class="mt-3 text-4xl font-extrabold text-navy">Welcome .</h1>
      <p class="mt-2 text-sm text-slate-500">Log in to manage your rentals, projects, and account.</p>

      <form onsubmit="handleLogin(event)" class="mt-8 space-y-5">
        <div>
          <label class="block text-xs font-bold text-navy mb-2">Email</label>
          <input type="email" required placeholder="you@example.com" class="field">
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2">Password</label>
          <div class="relative">
            <input type="password" required placeholder="Enter your password" class="field pr-12">
            <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Show password">
              <iconify-icon icon="lucide:eye" width="16"></iconify-icon>
            </button>
          </div>
        </div>
        <div class="flex items-center justify-between text-xs">
          <label class="flex items-center gap-2 text-slate-600">
            <input type="checkbox" class="w-4 h-4 rounded border-slate-300 accent-amber"> Remember Me
          </label>
          <a href="#" class="font-bold text-navy underline">Forgot password?</a>
        </div>
        <button type="submit" class="btn-amber w-full py-3.5 rounded-lg font-bold text-sm">Log In</button>
      </form>

      <p class="text-center text-xs text-slate-500 mt-6">
        New to C.D. Zaplan? <a href="register.php" class="font-bold text-navy underline">Register</a>
      </p>
    </div>
  </div>

  <div class="mt-8 text-[11px] text-slate-500">
    <div>© 2026 C.D. Zaplan Trucking. All rights reserved.</div>
    <div class="mt-1"><a href="#" class="hover:underline">Privacy Policy</a> &nbsp;·&nbsp; <a href="#" class="hover:underline">Terms of Service</a></div>
  </div>
</div>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
