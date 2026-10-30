<?php
$pageTitle = 'Rental Bookings | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'bookings';
require_once __DIR__ . '/includes/portal-header.php';
?>
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Rental Bookings</h1>
<p class="text-xs text-slate-500 mt-1 mb-6">Review requests, confirm deposits, and assign dispatch dates.</p>

<section class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[980px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr><th class="px-6 py-3">Ref ID</th><th class="px-6 py-3">Client</th><th class="px-6 py-3">Equipment</th><th class="px-6 py-3">Project Site</th><th class="px-6 py-3">Rental Start / End</th><th class="px-6 py-3">Est. Amount</th><th class="px-6 py-3">Deposit</th><th class="px-6 py-3">Status</th><th class="px-6 py-3">Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($rentalBookings as $b): ?>
        <tr class="border-t border-slate-200">
          <td class="px-6 py-4 font-bold text-navy"><?= e($b['id']) ?></td>
          <td class="px-6 py-4"><div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-full bg-slate-100 text-[10px] font-bold text-navy flex items-center justify-center"><?= initials($b['client']) ?></span>
            <div><div class="font-bold text-navy"><?= e($b['client']) ?></div><div class="text-[11px] text-slate-500"><?= e($b['contact']) ?> · Valid ID on file</div></div></div></td>
          <td class="px-6 py-4 text-navy"><?= e($b['equipment']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($b['site']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($b['dates']) ?></td>
          <td class="px-6 py-4 font-bold text-navy"><?= e($b['amount']) ?></td>
          <td class="px-6 py-4"><?= pill($b['deposit']) ?></td>
          <td class="px-6 py-4"><?= pill($b['status']) ?></td>
          <td class="px-6 py-4"><div class="flex items-center gap-3">
            <?php if ($b['status'] === 'Pending Review'): ?><button class="btn-amber px-3 py-1.5 rounded-md text-xs font-bold">Approve</button><?php endif; ?>
            <a href="#" class="text-xs font-bold text-navy underline">View</a></div></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="px-6 py-4 border-t border-slate-200 text-xs text-slate-500">
    A down payment or security deposit is required before a booking is confirmed. Delivery / mobilization fees are charged per distance and trip. Payment is cash on delivery / on site.
  </div>
</section>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
