<?php
/* NOTE: the Figma file has no client-dashboard frame. This page reuses the admin design
   system (same sidebar, cards, tables) so it matches until a design exists. */
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
<div class="page-head">
  <div>
    <h1 class="page-title">Welcome back, Sarah!</h1>
    <p class="page-sub">Track your active equipment deployments and manage bookings.</p>
  </div>
  <button onclick="openModal('bookingModal')" class="btn btn--amber">
    <iconify-icon icon="lucide:plus" width="16"></iconify-icon> Book Equipment
  </button>
</div>

<div class="stat-grid">
  <?php foreach ($stats as [$l,$v,$s,$i]): ?>
  <div class="stat-card">
    <div class="stat-card__head"><span><?= $l ?></span><iconify-icon icon="<?= $i ?>" width="16" class="stat-card__icon"></iconify-icon></div>
    <div class="stat-card__value"><?= $v ?></div>
    <div class="stat-card__sub"><?= $s ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="card card--spaced">
  <div class="card__head"><h2 class="card__title">My Bookings</h2></div>
  <div class="table-wrap">
    <table class="table table--min-720">
      <thead>
        <tr><th>Ref ID</th><th>Equipment</th><th>Location</th><th>Schedule</th><th>Status</th><th>Cost</th></tr>
      </thead>
      <tbody>
        <?php foreach ($userBookings as $b): ?>
        <tr>
          <td class="td-strong"><?= e($b['id']) ?></td>
          <td><?= e($b['equipment']) ?></td>
          <td class="td-muted"><?= e($b['location']) ?></td>
          <td class="td-muted"><?= e($b['dates']) ?></td>
          <td><?= pill($b['status']) ?></td>
          <td class="td-strong"><?= e($b['cost']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- New rental request modal: collects everything the client requires at booking -->
<div id="bookingModal" class="modal hidden">
  <div class="dialog dialog--padded">
    <div class="dialog__head">
      <h2 class="dialog__title">New Rental Request</h2>
      <button onclick="closeModal('bookingModal')" aria-label="Close" class="close-btn close-btn--plain"><iconify-icon icon="lucide:x" width="20"></iconify-icon></button>
    </div>
    <form onsubmit="event.preventDefault(); closeModal('bookingModal');" class="form form--modal">
      <div class="form-grid form-grid--two">
        <div><label class="label">Full Name</label><input type="text" value="Sarah Jenkins" required class="field"></div>
        <div><label class="label">Contact Details</label><input type="tel" placeholder="Mobile number" required class="field"></div>
      </div>
      <div><label class="label">Equipment</label>
        <select class="field"><option>10-Wheeler Dump Truck</option><option>Backhoe</option></select></div>
      <div><label class="label">Project Site Address</label>
        <input type="text" placeholder="Enter full site address" required class="field"></div>
      <div class="form-grid form-grid--dates">
        <div><label class="label">Rental Start</label><input type="date" required class="field"></div>
        <div><label class="label">Rental End</label><input type="date" required class="field"></div>
      </div>
      <div><label class="label">Valid ID</label>
        <input type="file" accept="image/*,.pdf" required class="field field--file"></div>

      <div class="notice">
        <div class="notice__row"><iconify-icon icon="lucide:badge-check" width="14" class="notice__icon"></iconify-icon> A down payment or security deposit is required before your booking is confirmed.</div>
        <div class="notice__row"><iconify-icon icon="lucide:route" width="14" class="notice__icon"></iconify-icon> Delivery / mobilization fees are charged per distance and trip.</div>
        <div class="notice__row"><iconify-icon icon="lucide:banknote" width="14" class="notice__icon"></iconify-icon> Payment is accepted in cash on delivery / on site.</div>
      </div>
      <button type="submit" class="btn btn--amber btn--block">Submit Request</button>
    </form>
  </div>
</div>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
