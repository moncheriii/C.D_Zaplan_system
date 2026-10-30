<?php
$pageTitle = 'Payroll | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'payroll';
require_once __DIR__ . '/includes/portal-header.php';
?>
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Payroll</h1>
<p class="text-xs text-slate-500 mt-1 mb-6">Weekly compensation for heavy equipment operators and drivers.</p>
<?php require __DIR__ . '/includes/payroll-card.php'; ?>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
