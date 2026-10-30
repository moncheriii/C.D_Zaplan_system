<?php
$pageTitle = 'Invoices & Receipts | C.D. Zaplan Trucking';
$portal = 'client'; $active = 'invoices';
require_once __DIR__ . '/includes/portal-header.php';

$invoices = [
  ['no' => 'INV-2026-031', 'ref' => 'BK-1082', 'desc' => '10-Wheeler Dump Truck', 'issued' => 'Oct 28, 2026', 'due' => 'Nov 11, 2026', 'amount' => '₱45,000.00', 'status' => 'Pending'],
  ['no' => 'INV-2026-029', 'ref' => 'BK-1045', 'desc' => 'Backhoe Loader',            'issued' => 'Oct 12, 2026', 'due' => 'Oct 26, 2026', 'amount' => '₱88,000.00', 'status' => 'Paid'],
  ['no' => 'INV-2026-024', 'ref' => 'BK-1031', 'desc' => 'Backhoe – Site Clearing',   'issued' => 'Sep 18, 2026', 'due' => 'Oct 02, 2026', 'amount' => '₱32,000.00', 'status' => 'Overdue'],
  ['no' => 'INV-2026-017', 'ref' => 'BK-1009', 'desc' => '10-Wheeler Dump Truck',    'issued' => 'Aug 04, 2026', 'due' => 'Aug 18, 2026', 'amount' => '₱64,500.00', 'status' => 'Paid'],
];
$stats = [
  ['Outstanding Balance', '₱77,000', '2 invoices unpaid',       'lucide:receipt'],
  ['Paid This Year',      '₱152,500', '2 receipts available',   'lucide:circle-check'],
  ['Next Due Date',       'Nov 11',  'INV-2026-031 · ₱45,000',  'lucide:calendar-clock'],
];
?>
<div class="flex flex-wrap items-start justify-between gap-4">
  <div>
    <h1 class="text-3xl font-extrabold text-navy tracking-tight">Invoices &amp; Receipts</h1>
    <p class="text-xs text-slate-500 mt-1">View your billing history and download receipts.</p>
  </div>
  <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-navy">
    <iconify-icon icon="lucide:calendar" width="14"></iconify-icon> 2026 <iconify-icon icon="lucide:chevron-down" width="14"></iconify-icon>
  </button>
</div>

<div class="mt-6 grid sm:grid-cols-3 gap-4">
  <?php foreach ($stats as [$l,$v,$s,$i]): ?>
  <div class="bg-white border border-slate-200 rounded-2xl p-6">
    <div class="flex items-center justify-between text-xs text-slate-500"><span><?= $l ?></span><iconify-icon icon="<?= $i ?>" width="16" class="text-navy"></iconify-icon></div>
    <div class="mt-3 text-4xl font-extrabold text-navy tracking-tight"><?= $v ?></div>
    <div class="mt-4 text-xs text-slate-500"><?= $s ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="mt-6 bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <div class="px-6 py-5">
    <h2 class="text-lg font-extrabold text-navy">Billing History</h2>
    <p class="text-xs text-slate-500 mt-0.5"><?= count($invoices) ?> invoices · Payment by cash on delivery / on site</p>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[820px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr><th class="px-6 py-3">Invoice</th><th class="px-6 py-3">Booking</th><th class="px-6 py-3">Issued</th><th class="px-6 py-3">Due</th><th class="px-6 py-3">Amount</th><th class="px-6 py-3">Status</th><th class="px-6 py-3">Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($invoices as $inv): ?>
        <tr class="border-t border-slate-200">
          <td class="px-6 py-4"><div class="font-bold text-navy"><?= e($inv['no']) ?></div><div class="text-[11px] text-slate-500"><?= e($inv['desc']) ?></div></td>
          <td class="px-6 py-4 text-navy"><?= e($inv['ref']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($inv['issued']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($inv['due']) ?></td>
          <td class="px-6 py-4 font-bold text-navy"><?= e($inv['amount']) ?></td>
          <td class="px-6 py-4"><?= pill($inv['status']) ?></td>
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <a href="#" class="text-xs font-bold text-navy underline">View</a>
              <a href="#" class="flex items-center gap-1.5 text-xs font-bold text-navy" aria-label="Download PDF">
                <iconify-icon icon="lucide:download" width="14"></iconify-icon> <?= $inv['status'] === 'Paid' ? 'Receipt' : 'Invoice' ?>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="flex flex-wrap items-center justify-between gap-2 px-6 py-4 border-t border-slate-200 text-xs text-slate-500">
    <span>Cash on delivery / on site only · Questions? Call 09176757888</span>
    <span class="text-sm font-bold text-navy">Outstanding: ₱77,000.00</span>
  </div>
</section>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
