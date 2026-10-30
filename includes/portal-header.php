<?php
/*
 * Shared shell for admin + client pages.
 * Set before including:  $portal = 'admin' | 'client';  $active = 'overview' | 'fleet' | ...;  $pageTitle
 */
$hidePublicHeader = true;
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/mock-data.php';

if ($portal === 'admin') {
  $brandSub = 'TRUCKING';
  $menuLabel = 'WORKSPACE';
  $menu = [
    'overview' => ['Overview',         'admin.php',           'lucide:layout-dashboard'],
    'fleet'    => ['Fleet Management', 'fleet.php',           'lucide:truck'],
    'bookings' => ['Rental Bookings',  'booking.php',         'lucide:calendar-days'],
    'inquiries'=> ['Inquiries',        'inquiries.php',       'lucide:message-square-text'],
    'users'    => ['Users',            'user-management.php', 'lucide:users'],
    'payroll'  => ['Payroll',          'payroll.php',         'lucide:wallet'],
    'reports'  => ['Reports',          'reports.php',         'lucide:bar-chart-3'],
  ];
  $card = ['Built on reliability.', 'Your fleet, people, and projects in one place.'];
  $footnote = 'ADMIN WORKSPACE · V1.0';
  $who = ['Carlito Zaplan', 'Administrator'];
  $searchHint = 'Search users, bookings, or fleet...';
} else {
  $brandSub = 'CLIENT PORTAL';
  $menuLabel = 'CLIENT MENU';
  $menu = [
    'bookings' => ['My Bookings',          'dashboard.php',                   'lucide:truck'],
    'new'      => ['New Rental Request',   "javascript:openModal('bookingModal')", 'lucide:plus'],
    'invoices' => ['Invoices & Receipts',  'invoices.php',                               'lucide:file-text'],
    'settings' => ['Account Settings',     'account-settings.php',                               'lucide:settings'],
  ];
  $card = null; // client sidebar has no info card
  $footnote = 'CLIENT PORTAL · V1.0';
  $who = ['Sarah Jenkins', 'Commercial Developer'];
  $searchHint = 'Search bookings or equipment...';
}
?>
<div class="flex min-h-screen bg-[#f4f6fa]">

  <!-- Sidebar (desktop) -->
  <aside class="hidden md:flex w-[220px] shrink-0 bg-navy text-white flex-col px-5 py-6 sticky top-0 h-screen">
    <a href="index.php" class="flex items-center gap-3 mb-10">
      <span class="w-11 h-11 rounded-lg bg-white p-1 shrink-0 flex items-center justify-center"><img src="assets/img/logo.png" alt="C.D. Zaplan Trucking logo" class="w-full h-full object-contain"></span>
      <span>
        <span class="block font-bold text-lg leading-none">C.D. Zaplan</span>
        <span class="block text-[9px] tracking-[.2em] text-white/60 mt-1"><?= $brandSub ?></span>
      </span>
    </a>

    <div class="text-[10px] tracking-[.15em] text-white/50 mb-3"><?= $menuLabel ?></div>
    <nav class="space-y-1.5">
      <?php foreach ($menu as $key => [$label, $href, $icon]): $on = ($key === $active); ?>
      <a href="<?= $href ?>" class="flex items-center gap-3 px-3.5 py-3 rounded-lg text-sm <?= $on ? 'bg-amber text-navy font-bold' : 'text-white/85 font-medium hover:bg-white/10' ?>">
        <iconify-icon icon="<?= $icon ?>" width="18"></iconify-icon> <?= $label ?>
      </a>
      <?php endforeach; ?>
    </nav>

    <?php if ($card): ?>
    <div class="mt-8 rounded-xl bg-white/[.07] p-4">
      <iconify-icon icon="lucide:shield-check" width="18" class="text-amber"></iconify-icon>
      <div class="mt-2 text-xs font-bold"><?= $card[0] ?></div>
      <p class="mt-1 text-[11px] leading-relaxed text-white/60"><?= $card[1] ?></p>
    </div>
    <?php endif; ?>

    <div class="mt-auto text-[10px] tracking-wider text-white/45"><?= $footnote ?></div>
  </aside>

  <div class="flex-1 min-w-0">

    <!-- Top bar -->
    <div class="bg-white border-b border-slate-200 px-5 md:px-8 h-[74px] flex items-center justify-between gap-4">
      <div class="relative w-full max-w-[340px]">
        <iconify-icon icon="lucide:search" width="16" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></iconify-icon>
        <input type="text" placeholder="<?= $searchHint ?>" class="w-full pl-10 pr-4 py-2.5 bg-[#f4f6fa] border border-slate-200 rounded-lg text-sm outline-none focus:border-amber">
      </div>
      <div class="flex items-center gap-4 shrink-0">
        <button class="relative text-navy" aria-label="Notifications">
          <iconify-icon icon="lucide:bell" width="20"></iconify-icon>
          <span class="absolute -top-0.5 -right-0.5 w-2 h-2 rounded-full bg-amber"></span>
        </button>
        <span class="hidden sm:block w-px h-8 bg-slate-200"></span>
        <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-full bg-navy text-white text-xs font-bold flex items-center justify-center"><?= initials($who[0]) ?></span>
          <div class="hidden sm:block leading-tight">
            <div class="text-xs font-bold text-navy"><?= $who[0] ?></div>
            <div class="text-[11px] text-slate-500"><?= $who[1] ?></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile nav pills -->
    <div class="md:hidden flex gap-2 overflow-x-auto px-5 py-3 bg-white border-b border-slate-200">
      <?php foreach ($menu as $key => [$label, $href, $icon]): $on = ($key === $active); ?>
      <a href="<?= $href ?>" class="shrink-0 flex items-center gap-2 px-3.5 py-2 rounded-lg text-xs font-semibold <?= $on ? 'bg-navy text-white' : 'border border-slate-200 text-navy' ?>">
        <iconify-icon icon="<?= $icon ?>" width="14"></iconify-icon> <?= $label ?>
      </a>
      <?php endforeach; ?>
    </div>

    <main class="px-5 md:px-8 py-8">
