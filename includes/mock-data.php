<?php
/* Placeholder data so the UI renders. Your team can swap these arrays for MySQL queries later. */

function e($v) { return htmlspecialchars((string)$v); }

function initials($name) {
  $out = '';
  foreach (explode(' ', $name) as $w) { $out .= strtoupper($w[0] ?? ''); }
  return substr($out, 0, 2);
}

/* Status pill: green / amber / blue / rose / slate  (styles live in assets/css/style.css) */
function pill($status) {
  $map = [
    'Active'         => ['green', 'Active'],
    'Paid'           => ['green', 'Paid'],
    'Confirmed'      => ['green', 'Confirmed'],
    'Available'      => ['green', 'Standby'],
    'Due'            => ['amber', 'Deposit Due'],
    'Pending'        => ['amber', 'Pending'],
    'Pending Review' => ['amber', 'Pending Review'],
    'Deployed'       => ['blue',  'Deployed'],
    'New'            => ['green', 'New'],
    'Replied'        => ['blue',  'Replied'],
    'Archived'       => ['slate', 'Archived'],
    'Overdue'        => ['rose',  'Overdue'],
    'Maintenance'    => ['rose',  'Maintenance'],
    'Completed'      => ['slate', 'Completed'],
  ];
  [$tone, $label] = $map[$status] ?? ['slate', $status];
  return '<span class="pill pill--'.$tone.'"><span class="pill__dot">●</span>'.e($label).'</span>';
}

$registeredUsers = [
  ['name' => 'Sarah Jenkins',   'email' => 'sarah.jenkins@example.com',   'role' => 'Client', 'status' => 'Active',  'joined' => 'Oct 14, 2026'],
  ['name' => 'Michael Chen',    'email' => 'michael.chen@example.com',    'role' => 'Client', 'status' => 'Active',  'joined' => 'Oct 18, 2026'],
  ['name' => 'Elena Rodriguez', 'email' => 'elena.rodriguez@example.com', 'role' => 'Client', 'status' => 'Pending', 'joined' => 'Oct 21, 2026'],
  ['name' => 'Carlito Zaplan',  'email' => 'carlito.zaplan@gmail.com',    'role' => 'Admin',  'status' => 'Active',  'joined' => 'Jan 01, 2025'],
];

$payrollSummary = [
  ['name' => 'Daniel Reyes', 'position' => 'Driver',   'hours' => 40, 'rate' => '₱250.00/hr', 'total' => '₱10,000.00', 'status' => 'Paid'],
  ['name' => 'Leo Mendoza',  'position' => 'Operator', 'hours' => 38, 'rate' => '₱300.00/hr', 'total' => '₱11,400.00', 'status' => 'Pending'],
  ['name' => 'Ana Cruz',     'position' => 'Driver',   'hours' => 40, 'rate' => '₱240.00/hr', 'total' => '₱9,600.00',  'status' => 'Paid'],
];

/* Fleet: only the details the client said they track (Plate/Asset ID, Model & Brand, Load Capacity/Tonnage).
   Equipment types are 10-Wheeler Dump Trucks and Backhoes. Brands/plates below are placeholders. */
$fleetUnits = [
  ['id' => 'TRK-01', 'plate' => 'NBA 4821', 'type' => '10-Wheeler Dump Truck', 'model' => 'Isuzu Giga',         'capacity' => '20 Tons / 15 cu.m'],
  ['id' => 'TRK-02', 'plate' => 'NCD 7730', 'type' => '10-Wheeler Dump Truck', 'model' => 'Hino 700 Series',   'capacity' => '20 Tons / 15 cu.m'],
  ['id' => 'TRK-03', 'plate' => 'NDF 1156', 'type' => '10-Wheeler Dump Truck', 'model' => 'Isuzu Giga',         'capacity' => '20 Tons / 15 cu.m'],
  ['id' => 'BKH-01', 'plate' => 'Asset ID only', 'type' => 'Backhoe',          'model' => 'Caterpillar 420',    'capacity' => '1.0 cu.m Bucket'],
  ['id' => 'BKH-02', 'plate' => 'Asset ID only', 'type' => 'Backhoe',          'model' => 'JCB 3CX',            'capacity' => '1.0 cu.m Bucket'],
];

/* Bookings carry what the client requires at booking: name, contact, project site, valid ID, start/end dates.
   A down payment / security deposit is required before confirmation. */
$rentalBookings = [
  ['id' => 'BK-1082', 'client' => 'Sarah Jenkins',   'contact' => '09171234567', 'equipment' => '10-Wheeler Dump Truck', 'site' => 'Dagupan Site A',              'dates' => 'Nov 02 - Nov 10, 2026', 'amount' => '₱45,000.00', 'deposit' => 'Paid', 'status' => 'Confirmed'],
  ['id' => 'BK-1083', 'client' => 'Michael Chen',    'contact' => '09189876543', 'equipment' => 'Backhoe',               'site' => 'San Fabian Commercial Build', 'dates' => 'Nov 05 - Nov 12, 2026', 'amount' => '₱62,000.00', 'deposit' => 'Due',  'status' => 'Pending Review'],
  ['id' => 'BK-1080', 'client' => 'Elena Rodriguez', 'contact' => '09201112233', 'equipment' => 'Backhoe (Site Clearing)', 'site' => 'Urdaneta Bypass Site',        'dates' => 'Oct 15 - Oct 22, 2026', 'amount' => '₱38,000.00', 'deposit' => 'Paid', 'status' => 'Completed'],
];
