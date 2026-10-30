<?php
$pageTitle = 'Inquiry Management | C.D. Zaplan Trucking';
$portal = 'admin'; $active = 'inquiries';
require_once __DIR__ . '/includes/portal-header.php';

/* Sample inquiries. 'followup' = still waiting on a reply after 24 hours. */
$inquiries = [
  ['id'=>1,'status'=>'New',     'date'=>'Oct 29, 2026 · 9:14 AM', 'name'=>'Marco Santos',     'email'=>'marco.santos@example.com',     'phone'=>'09175550142', 'item'=>'Backhoe',                   'type'=>'Availability Check',      'followup'=>0, 'message'=>"Hi, do you have a backhoe available for site clearing in Urdaneta starting Nov 10? We'll need it for about two weeks. Please let me know the rate and whether mobilization is included."],
  ['id'=>2,'status'=>'New',     'date'=>'Oct 28, 2026 · 4:40 PM', 'name'=>'Joanna Dela Cruz', 'email'=>'joanna.delacruz@example.com', 'phone'=>'09189990231', 'item'=>'10-Wheeler Dump Truck',   'type'=>'Quote & Pricing Request', 'followup'=>1, 'message'=>"Good afternoon. We're preparing a commercial lot in San Fabian and need two 10-wheeler dump trucks for a week. Could you send a quote including delivery fees?"],
  ['id'=>3,'status'=>'Replied', 'date'=>'Oct 27, 2026 · 1:05 PM', 'name'=>'Ramon Villanueva', 'email'=>'ramon.v@example.com',            'phone'=>'09201234876', 'item'=>'Site Clearing & Excavation', 'type'=>'General Inquiry',   'followup'=>0, 'message'=>"We own a 2-hectare lot in Sta. Barbara that needs clearing before construction. How do you usually start a project like this?"],
  ['id'=>4,'status'=>'New',     'date'=>'Oct 26, 2026 · 10:22 AM','name'=>'Kristine Lim',     'email'=>'kristine.lim@example.com',     'phone'=>'',            'item'=>'Backhoe',                   'type'=>'Technical Specifications','followup'=>1, 'message'=>"What is the bucket size and digging depth of your backhoe? Our drainage trench needs to be about 3 meters deep."],
  ['id'=>5,'status'=>'Replied', 'date'=>'Oct 24, 2026 · 8:50 AM', 'name'=>'Paolo Reyes',      'email'=>'paolo.reyes@example.com',      'phone'=>'09175559981', 'item'=>'Site Clearing & Excavation', 'type'=>'Quote & Pricing Request','followup'=>0, 'message'=>"Looking for a quote on site clearing and foundation excavation for a 500 sqm commercial building in Dagupan."],
  ['id'=>6,'status'=>'Archived','date'=>'Oct 18, 2026 · 3:12 PM', 'name'=>'Anna Mercado',     'email'=>'anna.mercado@example.com',     'phone'=>'09184443210', 'item'=>'10-Wheeler Dump Truck',   'type'=>'Availability Check',      'followup'=>0, 'message'=>"Is a dump truck available this coming weekend? We found another supplier, so please disregard."],
];
$total   = count($inquiries);
$newCnt  = count(array_filter($inquiries, fn($i) => $i['status'] === 'New'));
$pending = count(array_filter($inquiries, fn($i) => $i['status'] === 'New' && $i['followup']));
$stats = [
  ['statTotal',   'Total Inquiries',   $total,   'All time',                    'lucide:inbox'],
  ['statNew',     'New / Unread',      $newCnt,  'Waiting for a first reply',   'lucide:mail'],
  ['statPending', 'Pending Follow-up', $pending, 'No reply after 24 hours',     'lucide:clock'],
];
?>
<h1 class="page-title">Inquiry Management</h1>
<p class="page-sub">Messages sent from the website inquiry form.</p>

<div class="stat-grid">
  <?php foreach ($stats as [$id,$label,$val,$sub,$icon]): ?>
  <div class="stat-card">
    <div class="stat-card__head"><span><?= $label ?></span><iconify-icon icon="<?= $icon ?>" width="16" class="stat-card__icon"></iconify-icon></div>
    <div id="<?= $id ?>" class="stat-card__value"><?= $val ?></div>
    <div class="stat-card__sub"><?= $sub ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="card card--spaced">
  <!-- Toolbar -->
  <div class="toolbar">
    <div class="search search--grow">
      <iconify-icon icon="lucide:search" width="16" class="search__icon"></iconify-icon>
      <input id="inqSearch" oninput="applyFilters()" type="text" placeholder="Search name, email, or item..." class="search__input">
    </div>
    <select id="inqStatus" onchange="applyFilters()" class="select">
      <option value="All">Status: All</option><option>New</option><option>Replied</option><option>Archived</option>
    </select>
    <button onclick="exportCsv()" class="btn btn--outline">
      <iconify-icon icon="lucide:download" width="16"></iconify-icon> Export CSV
    </button>
  </div>

  <!-- Table -->
  <div class="table-wrap">
    <table class="table table--min-860 table--hover">
      <thead>
        <tr><th>Status</th><th>Date Submitted</th><th>Customer</th><th>Inquired About</th><th>Category</th><th>Action</th></tr>
      </thead>
      <tbody id="inqRows">
        <?php foreach ($inquiries as $i): ?>
        <tr data-status="<?= e($i['status']) ?>" data-followup="<?= $i['followup'] ?>"
            data-search="<?= e(strtolower($i['name'].' '.$i['email'].' '.$i['item'].' '.$i['type'])) ?>"
            data-inquiry="<?= e(json_encode($i)) ?>">
          <td class="status-cell"><?= pill($i['status']) ?></td>
          <td class="td-muted td-nowrap"><?= e($i['date']) ?></td>
          <td><div class="person">
            <span class="avatar"><?= initials($i['name']) ?></span>
            <div><div class="cell-title"><?= e($i['name']) ?></div><div class="cell-meta"><?= e($i['email']) ?></div></div></div></td>
          <td><?= e($i['item']) ?></td>
          <td class="td-muted"><?= e($i['type']) ?></td>
          <td><button onclick="openDrawer(this.closest('tr'))" class="btn btn--line btn--sm">View Details</button></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div id="inqEmpty" class="empty hidden">No inquiries match your search.</div>
  </div>
  <div class="card__foot">Showing <span id="inqShown"><?= $total ?></span> of <?= $total ?> inquiries</div>
</section>

<!-- Detail drawer -->
<div id="inquiryDrawer" class="overlay overlay-right" role="dialog" aria-modal="true" aria-labelledby="drawerTitle"
     onclick="if (event.target === this) closeDrawer()">
  <aside class="sheet drawer">
    <div class="drawer__head">
      <div>
        <h2 id="drawerTitle" class="drawer__title">Inquiry Details</h2>
        <div class="drawer__meta"><span id="dStatus"></span><span id="dDate" class="drawer__date"></span></div>
      </div>
      <button onclick="closeDrawer()" aria-label="Close" class="close-btn"><iconify-icon icon="lucide:x" width="22"></iconify-icon></button>
    </div>

    <div class="drawer__body">
      <div>
        <div class="eyebrow eyebrow--muted drawer__label">Customer</div>
        <div class="drawer__customer">
          <span id="dInitials" class="avatar avatar--navy avatar--lg"></span>
          <div class="drawer__name" id="dName"></div>
        </div>
        <dl class="detail-list detail-list--spaced">
          <div class="detail"><dt>Email</dt><dd id="dEmail"></dd></div>
          <div class="detail"><dt>Phone</dt><dd id="dPhone"></dd></div>
        </dl>
      </div>

      <div>
        <div class="eyebrow eyebrow--muted drawer__label">Inquiry</div>
        <dl class="detail-list">
          <div class="detail"><dt>About</dt><dd><a id="dItem" href="fleet.php" class="detail__link"></a></dd></div>
          <div class="detail"><dt>Type</dt><dd id="dType"></dd></div>
        </dl>
      </div>

      <div>
        <div class="eyebrow eyebrow--muted drawer__label">Message</div>
        <p id="dMessage" class="drawer__message"></p>
      </div>
    </div>

    <div class="drawer__foot">
      <a id="dReply" href="#" class="btn btn--amber"><iconify-icon icon="lucide:reply" width="16"></iconify-icon> Reply via Email</a>
      <button onclick="setStatus('Replied')" class="btn btn--outline">Mark as Replied</button>
      <button onclick="setStatus('Archived')" class="btn btn--ghost">Archive</button>
    </div>
  </aside>
</div>

<script>
const rows = [...document.querySelectorAll('#inqRows tr')];
let current = null;

// Status badge (same markup as pill() in includes/mock-data.php)
const TONE = { New: 'green', Replied: 'blue', Archived: 'slate' };
const badge = s => `<span class="pill pill--${TONE[s]}"><span class="pill__dot">●</span>${s}</span>`;

function applyFilters() {
  const q = document.getElementById('inqSearch').value.trim().toLowerCase();
  const st = document.getElementById('inqStatus').value;
  let shown = 0;
  rows.forEach(r => {
    const ok = (st === 'All' || r.dataset.status === st) && r.dataset.search.includes(q);
    r.classList.toggle('hidden', !ok);
    if (ok) shown++;
  });
  document.getElementById('inqShown').textContent = shown;
  document.getElementById('inqEmpty').classList.toggle('hidden', shown > 0);
}

function updateStats() {
  document.getElementById('statTotal').textContent   = rows.length;
  document.getElementById('statNew').textContent     = rows.filter(r => r.dataset.status === 'New').length;
  document.getElementById('statPending').textContent = rows.filter(r => r.dataset.status === 'New' && r.dataset.followup === '1').length;
}

function openDrawer(row) {
  current = row;
  const d = JSON.parse(row.dataset.inquiry);
  document.getElementById('dStatus').innerHTML = badge(row.dataset.status);
  document.getElementById('dDate').textContent = d.date;
  document.getElementById('dInitials').textContent = d.name.split(' ').map(w => w[0]).join('').slice(0, 2).toUpperCase();
  document.getElementById('dName').textContent = d.name;
  document.getElementById('dEmail').textContent = d.email;
  document.getElementById('dPhone').textContent = d.phone || '—';
  document.getElementById('dItem').textContent = d.item;
  document.getElementById('dType').textContent = d.type;
  document.getElementById('dMessage').textContent = d.message;
  document.getElementById('dReply').href = 'mailto:' + d.email + '?subject=' + encodeURIComponent('Re: ' + d.item + ' (' + d.type + ')');
  document.getElementById('inquiryDrawer').classList.add('is-open');
  document.body.style.overflow = 'hidden';
}
function closeDrawer() {
  document.getElementById('inquiryDrawer').classList.remove('is-open');
  document.body.style.overflow = '';
}

// UI-only: updates the row on screen. Save to the database here later.
function setStatus(s) {
  if (!current) return;
  current.dataset.status = s;
  if (s !== 'New') current.dataset.followup = '0';
  current.querySelector('.status-cell').innerHTML = badge(s);
  document.getElementById('dStatus').innerHTML = badge(s);
  updateStats(); applyFilters();
}

// Exports the rows currently visible in the table
function exportCsv() {
  const esc = v => '"' + String(v ?? '').replace(/"/g, '""') + '"';
  const lines = [['Status','Date','Name','Email','Phone','Inquired About','Category','Message'].map(esc).join(',')];
  rows.filter(r => !r.classList.contains('hidden')).forEach(r => {
    const d = JSON.parse(r.dataset.inquiry);
    lines.push([r.dataset.status, d.date, d.name, d.email, d.phone, d.item, d.type, d.message].map(esc).join(','));
  });
  const a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([lines.join('\n')], {type: 'text/csv'}));
  a.download = 'inquiries.csv';
  a.click();
}
</script>
<?php require_once __DIR__ . '/includes/portal-footer.php'; ?>
