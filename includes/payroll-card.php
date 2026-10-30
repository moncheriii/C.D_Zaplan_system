<?php /* Expects $payrollSummary */ ?>
<section class="card">
  <div class="card__head">
    <div>
      <h2 class="card__title">Payroll Summary</h2>
      <p class="card__sub">Oct 14–20, 2026 · Weekly payroll</p>
    </div>
    <button onclick="handleExportPayroll()" class="btn btn--outline btn--shrink">
      <iconify-icon icon="lucide:download" width="16"></iconify-icon> Export Payroll
    </button>
  </div>
  <div class="table-wrap">
    <table class="table table--min-640">
      <thead>
        <tr>
          <th>Employee Name</th><th>Position</th><th>Hours Worked</th>
          <th>Total Pay</th><th>Payment Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($payrollSummary as $p): ?>
        <tr>
          <td><div class="person">
            <span class="avatar"><?= initials($p['name']) ?></span>
            <span class="cell-title"><?= e($p['name']) ?></span></div></td>
          <td><?= e($p['position']) ?></td>
          <td><?= e($p['hours']) ?> hrs</td>
          <td><?= e($p['total']) ?></td>
          <td><?= pill($p['status']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="card__foot card__foot--split">
    <span>3 employees · 118 hours worked</span>
    <span class="card__total">Total payroll: ₱31,000.00</span>
  </div>
</section>
