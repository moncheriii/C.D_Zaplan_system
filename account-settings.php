<?php
$pageTitle = 'Account Settings | C.D. Zaplan Trucking';
$portal = 'client'; $active = 'settings';
require_once __DIR__ . '/includes/portal-header.php';

$notifications = [
  ['Booking updates',   'Get notified when a booking is confirmed, rescheduled, or completed.', true],
  ['Invoice reminders', 'Receive a reminder before an invoice is due.',                          true],
  ['SMS dispatch alerts','Text messages when equipment is on its way to your site.',             false],
];
?>
<div class="max-w-3xl mx-auto">
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Account Settings</h1>
<p class="text-xs text-slate-500 mt-1">Manage your profile, password, and notifications.</p>

<div class="mt-6 space-y-6">

  <!-- Profile -->
  <section class="bg-white border border-slate-200 rounded-2xl">
    <div class="px-6 py-5 border-b border-slate-200">
      <h2 class="text-lg font-extrabold text-navy">Profile</h2>
      <p class="text-xs text-slate-500 mt-0.5">This information appears on your bookings and invoices.</p>
    </div>
    <form onsubmit="event.preventDefault(); alert('Profile saved.');" class="p-6">
      <div class="flex items-center gap-4 mb-6">
        <span class="w-16 h-16 rounded-full bg-navy text-white text-lg font-bold flex items-center justify-center">SJ</span>
        <div>
          <button type="button" class="px-4 py-2 rounded-lg border-2 border-navy text-navy text-xs font-bold hover:bg-slate-50">Change photo</button>
          <p class="mt-1.5 text-[11px] text-slate-500">JPG or PNG, up to 2 MB.</p>
        </div>
      </div>
      <div class="grid sm:grid-cols-2 gap-5">
        <div><label class="block text-xs font-bold text-navy mb-2">Full Name</label><input type="text" value="Sarah Jenkins" class="field"></div>
        <div><label class="block text-xs font-bold text-navy mb-2">Email</label><input type="email" value="sarah.jenkins@example.com" class="field"></div>
        <div><label class="block text-xs font-bold text-navy mb-2">Phone</label><input type="tel" value="09171234567" class="field"></div>
        <div><label class="block text-xs font-bold text-navy mb-2">Company</label><input type="text" value="Jenkins Commercial Development" class="field"></div>
        <div class="sm:col-span-2"><label class="block text-xs font-bold text-navy mb-2">Billing Address</label><input type="text" value="Dagupan City, Pangasinan" class="field"></div>
      </div>
      <div class="mt-6 flex justify-end"><button type="submit" class="btn-amber px-6 py-3 rounded-lg font-bold text-sm">Save Changes</button></div>
    </form>
  </section>

  <!-- Password -->
  <section class="bg-white border border-slate-200 rounded-2xl">
    <div class="px-6 py-5 border-b border-slate-200">
      <h2 class="text-lg font-extrabold text-navy">Password</h2>
      <p class="text-xs text-slate-500 mt-0.5">Use at least 8 characters.</p>
    </div>
    <form onsubmit="event.preventDefault(); alert('Password updated.');" class="p-6">
      <div class="grid sm:grid-cols-2 gap-5">
        <div class="sm:col-span-2 sm:max-w-[calc(50%-0.625rem)]">
          <label class="block text-xs font-bold text-navy mb-2">Current Password</label>
          <div class="relative"><input type="password" placeholder="Enter current password" class="field pr-12">
            <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Show password"><iconify-icon icon="lucide:eye" width="16"></iconify-icon></button></div>
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2">New Password</label>
          <div class="relative"><input type="password" minlength="8" placeholder="Create a new password" class="field pr-12">
            <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Show password"><iconify-icon icon="lucide:eye" width="16"></iconify-icon></button></div>
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2">Confirm New Password</label>
          <div class="relative"><input type="password" placeholder="Re-enter new password" class="field pr-12">
            <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Show password"><iconify-icon icon="lucide:eye" width="16"></iconify-icon></button></div>
        </div>
      </div>
      <div class="mt-6 flex justify-end"><button type="submit" class="btn-amber px-6 py-3 rounded-lg font-bold text-sm">Update Password</button></div>
    </form>
  </section>

  <!-- Notifications -->
  <section class="bg-white border border-slate-200 rounded-2xl">
    <div class="px-6 py-5 border-b border-slate-200">
      <h2 class="text-lg font-extrabold text-navy">Notifications</h2>
      <p class="text-xs text-slate-500 mt-0.5">Choose how we keep you updated.</p>
    </div>
    <div class="divide-y divide-slate-200">
      <?php foreach ($notifications as [$title, $text, $on]): ?>
      <label class="flex items-center justify-between gap-6 px-6 py-5 cursor-pointer">
        <span>
          <span class="block text-sm font-bold text-navy"><?= $title ?></span>
          <span class="block text-xs text-slate-500 mt-0.5"><?= $text ?></span>
        </span>
        <span class="relative shrink-0">
          <input type="checkbox" class="peer sr-only" <?= $on ? 'checked' : '' ?>>
          <span class="block w-11 h-6 rounded-full bg-slate-300 peer-checked:bg-amber transition-colors"></span>
          <span class="absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white shadow transition-transform peer-checked:translate-x-5"></span>
        </span>
      </label>
      <?php endforeach; ?>
    </div>
  </section>

</div>
</div>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
