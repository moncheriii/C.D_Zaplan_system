<?php
/* The three reports the client asked for: Monthly Rental Revenue, Equipment Availability Logs, Client Booking History */
$pageTitle = 'Reports | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'reports';
require_once __DIR__ . '/includes/portal-header.php';

$revenue = [
  ['Oct 2026', 18, '₱1,250,000.00'], ['Sep 2026', 15, '₱1,080,000.00'],
  ['Aug 2026', 13, '₱960,000.00'],   ['Jul 2026', 12, '₱890,000.00'],
];
$availability = [
  ['Oct 28, 2026', 'TRK-02', '10-Wheeler Dump Truck', 'Deployed',    'Available',   'Returned from Dagupan Site A'],
  ['Oct 26, 2026', 'BKH-01', 'Backhoe',               'Available',   'Deployed',    'Dispatched to San Fabian'],
  ['Oct 22, 2026', 'BKH-02', 'Backhoe',               'Deployed',    'Maintenance', 'Hydraulic hose repair'],
  ['Oct 15, 2026', 'TRK-01', '10-Wheeler Dump Truck', 'Available',   'Deployed',    'Dispatched to Dagupan Site A'],
];
$history = [
  ['Sarah Jenkins',   3, 'Nov 02, 2026', '₱165,000.00'],
  ['Michael Chen',    1, 'Nov 05, 2026', '₱62,000.00'],
  ['Elena Rodriguez', 1, 'Oct 15, 2026', '₱38,000.00'],
];
$th = 'px-6 py-3'; $td = 'px-6 py-4';
?>
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Reports</h1>
<p class="text-xs text-slate-500 mt-1 mb-6">Revenue, equipment availability, and client booking activity.</p>

<div class="space-y-6">

  <section class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="flex items-center justify-between gap-4 px-6 py-5">
      <div><h2 class="text-lg font-extrabold text-navy">Monthly Rental Revenue</h2><p class="text-xs text-slate-500 mt-0.5">Completed and confirmed rentals per month</p></div>
      <button onclick="alert('Export goes here.')" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50 shrink-0"><iconify-icon icon="lucide:download" width="16"></iconify-icon> Export</button>
    </div>
    <div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[480px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold"><tr><th class="<?= $th ?>">Month</th><th class="<?= $th ?>">Bookings</th><th class="<?= $th ?>">Revenue</th></tr></thead>
      <tbody><?php foreach ($revenue as [$m,$n,$r]): ?>
        <tr class="border-t border-slate-200"><td class="<?= $td ?> font-bold text-navy"><?= $m ?></td><td class="<?= $td ?> text-navy"><?= $n ?></td><td class="<?= $td ?> font-bold text-navy"><?= $r ?></td></tr>
      <?php endforeach; ?></tbody>
    </table></div>
  </section>

  <section class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="flex items-center justify-between gap-4 px-6 py-5">
      <div><h2 class="text-lg font-extrabold text-navy">Equipment Availability Logs</h2><p class="text-xs text-slate-500 mt-0.5">Status changes for each truck and backhoe</p></div>
      <button onclick="alert('Export goes here.')" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50 shrink-0"><iconify-icon icon="lucide:download" width="16"></iconify-icon> Export</button>
    </div>
    <div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[760px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold"><tr><th class="<?= $th ?>">Date</th><th class="<?= $th ?>">Unit</th><th class="<?= $th ?>">Equipment</th><th class="<?= $th ?>">From</th><th class="<?= $th ?>">To</th><th class="<?= $th ?>">Note</th></tr></thead>
      <tbody><?php foreach ($availability as [$d,$u,$t,$from,$to,$note]): ?>
        <tr class="border-t border-slate-200"><td class="<?= $td ?> text-slate-500 text-xs"><?= $d ?></td><td class="<?= $td ?> font-bold text-navy"><?= $u ?></td><td class="<?= $td ?> text-navy"><?= $t ?></td><td class="<?= $td ?>"><?= pill($from) ?></td><td class="<?= $td ?>"><?= pill($to) ?></td><td class="<?= $td ?> text-slate-500 text-xs"><?= $note ?></td></tr>
      <?php endforeach; ?></tbody>
    </table></div>
  </section>

  <section class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="flex items-center justify-between gap-4 px-6 py-5">
      <div><h2 class="text-lg font-extrabold text-navy">Client Booking History</h2><p class="text-xs text-slate-500 mt-0.5">Bookings and billing per client</p></div>
      <button onclick="alert('Export goes here.')" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50 shrink-0"><iconify-icon icon="lucide:download" width="16"></iconify-icon> Export</button>
    </div>
    <div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[560px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold"><tr><th class="<?= $th ?>">Client</th><th class="<?= $th ?>">Total Bookings</th><th class="<?= $th ?>">Latest Booking</th><th class="<?= $th ?>">Total Billed</th></tr></thead>
      <tbody><?php foreach ($history as [$c,$n,$l,$t]): ?>
        <tr class="border-t border-slate-200"><td class="<?= $td ?>"><div class="flex items-center gap-3"><span class="w-8 h-8 rounded-full bg-slate-100 text-[10px] font-bold text-navy flex items-center justify-center"><?= initials($c) ?></span><span class="font-bold text-navy"><?= $c ?></span></div></td><td class="<?= $td ?> text-navy"><?= $n ?></td><td class="<?= $td ?> text-slate-500 text-xs"><?= $l ?></td><td class="<?= $td ?> font-bold text-navy"><?= $t ?></td></tr>
      <?php endforeach; ?></tbody>
    </table></div>
  </section>
</div>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
