<?php
$pageTitle = 'Rental Bookings | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'bookings';
require_once __DIR__ . '/includes/portal-header.php';
?>
<h1 class="page-title">Rental Bookings</h1>
<p class="page-sub page-sub--spaced">Review requests, confirm deposits, and assign dispatch dates.</p>

<section class="card">
  <div class="table-wrap">
    <table class="table table--min-980">
      <thead>
        <tr><th>Ref ID</th><th>Client</th><th>Equipment</th><th>Project Site</th><th>Rental Start / End</th><th>Est. Amount</th><th>Deposit</th><th>Status</th><th>Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($rentalBookings as $b): ?>
        <tr>
          <td class="td-strong"><?= e($b['id']) ?></td>
          <td><div class="person">
            <span class="avatar"><?= initials($b['client']) ?></span>
            <div><div class="cell-title"><?= e($b['client']) ?></div><div class="cell-meta"><?= e($b['contact']) ?> · Valid ID on file</div></div></div></td>
          <td><?= e($b['equipment']) ?></td>
          <td class="td-muted"><?= e($b['site']) ?></td>
          <td class="td-muted"><?= e($b['dates']) ?></td>
          <td class="td-strong"><?= e($b['amount']) ?></td>
          <td><?= pill($b['deposit']) ?></td>
          <td><?= pill($b['status']) ?></td>
          <td><div class="row-actions">
            <?php if ($b['status'] === 'Pending Review'): ?><button class="btn btn--amber btn--sm">Approve</button><?php endif; ?>
            <a href="#" class="link-underline">View</a></div></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="card__foot">
    A down payment or security deposit is required before a booking is confirmed. Delivery / mobilization fees are charged per distance and trip. Payment is cash on delivery / on site.
  </div>
</section>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
