<?php
$pageTitle = 'Admin Dashboard | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'overview';
require_once __DIR__ . '/includes/portal-header.php';

$stats = [
  ['Available Trucks', '12',     'Ready for deployment',      'lucide:truck'],
  ['Active Projects',  '5',      'Currently on site',         'lucide:hard-hat'],
  ['Total Users',      '48',     'Clients & administrators',  'lucide:users'],
  ['Monthly Revenue',  '₱1.25M', 'October 2026',              'lucide:banknote'],
];
?>
<div class="flex flex-wrap items-start justify-between gap-4">
  <div>
    <h1 class="text-3xl font-extrabold text-navy tracking-tight">Operations overview</h1>
    <p class="text-xs text-slate-500 mt-1">A clear view of your fleet, people, and payroll.</p>
  </div>
  <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-navy">
    <iconify-icon icon="lucide:calendar" width="14"></iconify-icon> October 2026 <iconify-icon icon="lucide:chevron-down" width="14"></iconify-icon>
  </button>
</div>

<div class="mt-6 grid grid-cols-2 xl:grid-cols-4 gap-4">
  <?php foreach ($stats as [$label, $value, $sub, $icon]): ?>
  <div class="bg-white border border-slate-200 rounded-2xl p-6">
    <div class="flex items-center justify-between text-xs text-slate-500">
      <span><?= $label ?></span><iconify-icon icon="<?= $icon ?>" width="16" class="text-navy"></iconify-icon>
    </div>
    <div class="mt-3 text-4xl font-extrabold text-navy tracking-tight"><?= $value ?></div>
    <div class="mt-4 text-xs text-slate-500"><?= $sub ?></div>
  </div>
  <?php endforeach; ?>
</div>

<div class="mt-6 space-y-6">
  <?php require __DIR__ . '/includes/users-card.php'; ?>
  <?php require __DIR__ . '/includes/payroll-card.php'; ?>
</div>

<p class="mt-6 text-[11px] text-slate-500">Illustrative operational data and sample people. Last updated October 29, 2026.</p>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
