<?php

$pageTitle = 'Client Dashboard | C.D. Zaplan Trucking';
$portal = 'client'; $active = 'bookings';
require_once __DIR__ . '/includes/portal-header.php';

$userBookings = [
  ['id' => 'BK-1082', 'equipment' => '10-Wheeler Dump Truck', 'location' => 'Dagupan Site A',              'dates' => 'Nov 02 - Nov 10, 2026', 'status' => 'Confirmed',      'cost' => '₱45,000.00'],
  ['id' => 'BK-1045', 'equipment' => 'Backhoe Loader',            'location' => 'San Fabian Commercial Build', 'dates' => 'Oct 12 - Oct 28, 2026', 'status' => 'Completed',      'cost' => '₱88,000.00'],
  ['id' => 'BK-1099', 'equipment' => 'Backhoe',                  'location' => 'Urdaneta Bypass Site',        'dates' => 'Nov 15 - Nov 20, 2026', 'status' => 'Pending Review', 'cost' => '₱32,000.00'],
];
$stats = [
  ['Active Projects',    '1',      'Dagupan Site A · On schedule',  'lucide:truck'],
  ['Pending Inquiries',  '1',      'Awaiting admin review',         'lucide:clock'],
  ['Total Spent',        '₱165K',  'Across 3 bookings',             'lucide:banknote'],
];
?>
<div class="flex flex-wrap items-start justify-between gap-4">
  <div>
    <h1 class="text-3xl font-extrabold text-navy tracking-tight">Welcome back, Sarah!</h1>
    <p class="text-xs text-slate-500 mt-1">Track your active equipment deployments and manage bookings.</p>
  </div>
  <button onclick="openModal('bookingModal')" class="btn-amber flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-bold">
    <iconify-icon icon="lucide:plus" width="16"></iconify-icon> Book Equipment
  </button>
</div>

<div class="mt-6 grid sm:grid-cols-3 gap-4">
  <?php foreach ($stats as [$l,$v,$s,$i]): ?>
  <div class="bg-white border border-slate-200 rounded-2xl p-6">
    <div class="flex items-center justify-between text-xs text-slate-500"><span><?= $l ?></span><iconify-icon icon="<?= $i ?>" width="16" class="text-navy"></iconify-icon></div>
    <div class="mt-3 text-4xl font-extrabold text-navy"><?= $v ?></div>
    <div class="mt-4 text-xs text-slate-500"><?= $s ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="mt-6 bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <div class="px-6 py-5"><h2 class="text-lg font-extrabold text-navy">My Bookings</h2></div>
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[720px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr><th class="px-6 py-3">Ref ID</th><th class="px-6 py-3">Equipment</th><th class="px-6 py-3">Location</th><th class="px-6 py-3">Schedule</th><th class="px-6 py-3">Status</th><th class="px-6 py-3">Cost</th></tr>
      </thead>
      <tbody>
        <?php foreach ($userBookings as $b): ?>
        <tr class="border-t border-slate-200">
          <td class="px-6 py-4 font-bold text-navy"><?= e($b['id']) ?></td>
          <td class="px-6 py-4 text-navy"><?= e($b['equipment']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($b['location']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($b['dates']) ?></td>
          <td class="px-6 py-4"><?= pill($b['status']) ?></td>
          <td class="px-6 py-4 font-bold text-navy"><?= e($b['cost']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- New rental request modal-->
<div id="bookingModal" class="hidden fixed inset-0 z-50 bg-navy/60 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl w-full max-w-lg max-h-[92vh] overflow-y-auto p-7">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-extrabold text-navy">New Rental Request</h2>
      <button onclick="closeModal('bookingModal')" aria-label="Close"><iconify-icon icon="lucide:x" width="20"></iconify-icon></button>
    </div>
    <form onsubmit="event.preventDefault(); closeModal('bookingModal');" class="mt-6 space-y-4">
      <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-xs font-bold text-navy mb-2">Full Name</label><input type="text" value="Sarah Jenkins" required class="field"></div>
        <div><label class="block text-xs font-bold text-navy mb-2">Contact Details</label><input type="tel" placeholder="Mobile number" required class="field"></div>
      </div>
      <div><label class="block text-xs font-bold text-navy mb-2">Equipment</label>
        <select class="field"><option>10-Wheeler Dump Truck</option><option>Backhoe</option></select></div>
      <div><label class="block text-xs font-bold text-navy mb-2">Project Site Address</label>
        <input type="text" placeholder="Enter full site address" required class="field"></div>
      <div class="grid grid-cols-2 gap-3">
        <div><label class="block text-xs font-bold text-navy mb-2">Rental Start</label><input type="date" required class="field"></div>
        <div><label class="block text-xs font-bold text-navy mb-2">Rental End</label><input type="date" required class="field"></div>
      </div>
      <div><label class="block text-xs font-bold text-navy mb-2">Valid ID</label>
        <input type="file" accept="image/*,.pdf" required class="field text-xs file:mr-3 file:px-3 file:py-1.5 file:rounded-md file:border-0 file:bg-slate-100 file:text-navy file:font-bold"></div>

      <div class="rounded-xl bg-[#f4f6fa] border border-slate-200 p-4 space-y-2 text-xs text-slate-600">
        <div class="flex gap-2"><iconify-icon icon="lucide:badge-check" width="14" class="text-navy mt-0.5 shrink-0"></iconify-icon> A down payment or security deposit is required before your booking is confirmed.</div>
        <div class="flex gap-2"><iconify-icon icon="lucide:route" width="14" class="text-navy mt-0.5 shrink-0"></iconify-icon> Delivery / mobilization fees are charged per distance and trip.</div>
        <div class="flex gap-2"><iconify-icon icon="lucide:banknote" width="14" class="text-navy mt-0.5 shrink-0"></iconify-icon> Payment is accepted in cash on delivery / on site.</div>
      </div>
      <button type="submit" class="btn-amber w-full py-3.5 rounded-lg font-bold text-sm">Submit Request</button>
    </form>
  </div>
</div>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
