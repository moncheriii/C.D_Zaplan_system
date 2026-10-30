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
<div class="page-head">
  <div>
    <h1 class="page-title">Operations overview</h1>
    <p class="page-sub">A clear view of your fleet, people, and payroll.</p>
  </div>
  <button class="btn btn--period">
    <iconify-icon icon="lucide:calendar" width="14"></iconify-icon> October 2026 <iconify-icon icon="lucide:chevron-down" width="14"></iconify-icon>
  </button>
</div>

<div class="stat-grid stat-grid--4">
  <?php foreach ($stats as [$label, $value, $sub, $icon]): ?>
  <div class="stat-card">
    <div class="stat-card__head">
      <span><?= $label ?></span><iconify-icon icon="<?= $icon ?>" width="16" class="stat-card__icon"></iconify-icon>
    </div>
    <div class="stat-card__value"><?= $value ?></div>
    <div class="stat-card__sub"><?= $sub ?></div>
  </div>
  <?php endforeach; ?>
</div>

<div class="stack stack--spaced">
  <?php require __DIR__ . '/includes/users-card.php'; ?>
  <?php require __DIR__ . '/includes/payroll-card.php'; ?>
</div>

<p class="page-note">Illustrative operational data and sample people. Last updated October 29, 2026.</p>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
