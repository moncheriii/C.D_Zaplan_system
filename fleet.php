<?php
$pageTitle = 'Fleet Management | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'fleet';
require_once __DIR__ . '/includes/portal-header.php';

$total   = count($fleetUnits);
$trucks  = count(array_filter($fleetUnits, fn($f) => str_contains($f['type'], 'Truck')));
$backhoe = count(array_filter($fleetUnits, fn($f) => $f['type'] === 'Backhoe'));
$stats = [['Total Fleet Units', $total, 'Trucks and backhoes'], ['10-Wheeler Dump Trucks', $trucks, 'Hauling fleet'], ['Backhoes', $backhoe, 'Excavation & site clearing']];
?>
<h1 class="page-title">Fleet Management</h1>
<p class="page-sub">Your trucks and backhoes, with the details you track for each unit.</p>

<div class="stat-grid">
  <?php foreach ($stats as [$l,$v,$sub]): ?>
  <div class="stat-card">
    <div class="stat-card__head"><span><?= $l ?></span></div>
    <div class="stat-card__value"><?= $v ?></div>
    <div class="stat-card__sub stat-card__sub--tight"><?= $sub ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="card card--spaced">
  <div class="card__head">
    <h2 class="card__title">Equipment</h2>
    <button onclick="alert('Add Equipment form goes here.')" class="btn btn--amber">
      <iconify-icon icon="lucide:plus" width="16"></iconify-icon> Add Equipment
    </button>
  </div>
  <div class="table-wrap">
    <table class="table table--min-700">
      <thead>
        <tr><th>Asset ID</th><th>Plate Number</th><th>Equipment</th><th>Model &amp; Brand</th><th>Load Capacity / Tonnage</th><th>Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($fleetUnits as $f): ?>
        <tr>
          <td class="td-strong"><?= e($f['id']) ?></td>
          <td><?= e($f['plate']) ?></td>
          <td><?= e($f['type']) ?></td>
          <td><?= e($f['model']) ?></td>
          <td class="td-muted"><?= e($f['capacity']) ?></td>
          <td><a href="#" class="link-underline">Edit</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
