<?php
$pageTitle = 'Fleet Management | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'fleet';
require_once __DIR__ . '/includes/portal-header.php';

$total   = count($fleetUnits);
$trucks  = count(array_filter($fleetUnits, fn($f) => str_contains($f['type'], 'Truck')));
$backhoe = count(array_filter($fleetUnits, fn($f) => $f['type'] === 'Backhoe'));
$stats = [['Total Fleet Units', $total, 'Trucks and backhoes'], ['10-Wheeler Dump Trucks', $trucks, 'Hauling fleet'], ['Backhoes', $backhoe, 'Excavation & site clearing']];
?>
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Fleet Management</h1>
<p class="text-xs text-slate-500 mt-1">Your trucks and backhoes, with the details you track for each unit.</p>

<div class="mt-6 grid sm:grid-cols-3 gap-4">
  <?php foreach ($stats as [$l,$v,$sub]): ?>
  <div class="bg-white border border-slate-200 rounded-2xl p-6">
    <div class="text-xs text-slate-500"><?= $l ?></div>
    <div class="mt-3 text-4xl font-extrabold text-navy"><?= $v ?></div>
    <div class="mt-3 text-xs text-slate-500"><?= $sub ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="mt-6 bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <div class="flex items-center justify-between gap-4 px-6 py-5">
    <h2 class="text-lg font-extrabold text-navy">Equipment</h2>
    <button onclick="alert('Add Equipment form goes here.')" class="btn-amber flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-bold">
      <iconify-icon icon="lucide:plus" width="16"></iconify-icon> Add Equipment
    </button>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[700px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr><th class="px-6 py-3">Asset ID</th><th class="px-6 py-3">Plate Number</th><th class="px-6 py-3">Equipment</th><th class="px-6 py-3">Model &amp; Brand</th><th class="px-6 py-3">Load Capacity / Tonnage</th><th class="px-6 py-3">Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($fleetUnits as $f): ?>
        <tr class="border-t border-slate-200">
          <td class="px-6 py-4 font-bold text-navy"><?= e($f['id']) ?></td>
          <td class="px-6 py-4 text-navy"><?= e($f['plate']) ?></td>
          <td class="px-6 py-4 text-navy"><?= e($f['type']) ?></td>
          <td class="px-6 py-4 text-navy"><?= e($f['model']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($f['capacity']) ?></td>
          <td class="px-6 py-4"><a href="#" class="text-xs font-bold text-navy underline">Edit</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
