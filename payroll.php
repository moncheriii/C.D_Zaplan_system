<?php
$pageTitle = 'Payroll | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'payroll';
require_once __DIR__ . '/includes/portal-header.php';
?>
<h1 class="page-title">Payroll</h1>
<p class="page-sub page-sub--spaced">Weekly compensation for heavy equipment operators and drivers.</p>
<?php require __DIR__ . '/includes/payroll-card.php'; ?>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
