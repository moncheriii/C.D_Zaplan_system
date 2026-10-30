<?php /* Expects $payrollSummary */ ?>
<section class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <div class="flex items-center justify-between gap-4 px-6 py-5">
    <div>
      <h2 class="text-lg font-extrabold text-navy">Payroll Summary</h2>
      <p class="text-xs text-slate-500 mt-0.5">Oct 14–20, 2026 · Weekly payroll</p>
    </div>
    <button onclick="handleExportPayroll()" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50 shrink-0">
      <iconify-icon icon="lucide:download" width="16"></iconify-icon> Export Payroll
    </button>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[640px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr>
          <th class="px-6 py-3">Employee Name</th><th class="px-6 py-3">Position</th><th class="px-6 py-3">Hours Worked</th>
          <th class="px-6 py-3">Total Pay</th><th class="px-6 py-3">Payment Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($payrollSummary as $p): ?>
        <tr class="border-t border-slate-200">
          <td class="px-6 py-4"><div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-full bg-slate-100 text-[10px] font-bold text-navy flex items-center justify-center"><?= initials($p['name']) ?></span>
            <span class="font-bold text-navy"><?= e($p['name']) ?></span></div></td>
          <td class="px-6 py-4 text-navy"><?= e($p['position']) ?></td>
          <td class="px-6 py-4 text-navy"><?= e($p['hours']) ?> hrs</td>
          <td class="px-6 py-4 text-navy"><?= e($p['total']) ?></td>
          <td class="px-6 py-4"><?= pill($p['status']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="flex flex-wrap items-center justify-between gap-2 px-6 py-4 border-t border-slate-200 text-xs text-slate-500">
    <span>3 employees · 118 hours worked</span>
    <span class="text-sm font-bold text-navy">Total payroll: ₱31,000.00</span>
  </div>
</section>
