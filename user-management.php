<?php
$pageTitle = 'User Management | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'users';
require_once __DIR__ . '/includes/portal-header.php';
$usersSub = '48 registered users · Manage roles and permissions';
$showJoined = true;
?>
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Users</h1>
<p class="text-xs text-slate-500 mt-1 mb-6">Registered client accounts and system permissions.</p>
<?php require __DIR__ . '/includes/users-card.php'; ?>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
