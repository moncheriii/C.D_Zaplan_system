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
<h1 class="text-3xl font-extrabold text-navy tracking-tight">Inquiry Management</h1>
<p class="text-xs text-slate-500 mt-1">Messages sent from the website inquiry form.</p>

<div class="mt-6 grid sm:grid-cols-3 gap-4">
  <?php foreach ($stats as [$id,$label,$val,$sub,$icon]): ?>
  <div class="bg-white border border-slate-200 rounded-2xl p-6">
    <div class="flex items-center justify-between text-xs text-slate-500"><span><?= $label ?></span><iconify-icon icon="<?= $icon ?>" width="16" class="text-navy"></iconify-icon></div>
    <div id="<?= $id ?>" class="mt-3 text-4xl font-extrabold text-navy tracking-tight"><?= $val ?></div>
    <div class="mt-4 text-xs text-slate-500"><?= $sub ?></div>
  </div>
  <?php endforeach; ?>
</div>

<section class="mt-6 bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <!-- Toolbar -->
  <div class="flex flex-wrap items-center gap-3 px-6 py-5">
    <div class="relative flex-1 min-w-[220px]">
      <iconify-icon icon="lucide:search" width="16" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></iconify-icon>
      <input id="inqSearch" oninput="applyFilters()" type="text" placeholder="Search name, email, or item..." class="w-full pl-10 pr-4 py-2.5 bg-[#f4f6fa] border border-slate-200 rounded-lg text-sm outline-none focus:border-amber">
    </div>
    <select id="inqStatus" onchange="applyFilters()" class="px-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-navy font-semibold outline-none focus:border-amber">
      <option value="All">Status: All</option><option>New</option><option>Replied</option><option>Archived</option>
    </select>
    <button onclick="exportCsv()" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50">
      <iconify-icon icon="lucide:download" width="16"></iconify-icon> Export CSV
    </button>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[860px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr><th class="px-6 py-3">Status</th><th class="px-6 py-3">Date Submitted</th><th class="px-6 py-3">Customer</th><th class="px-6 py-3">Inquired About</th><th class="px-6 py-3">Category</th><th class="px-6 py-3">Action</th></tr>
      </thead>
      <tbody id="inqRows">
        <?php foreach ($inquiries as $i): ?>
        <tr class="border-t border-slate-200 hover:bg-slate-50/60"
            data-status="<?= e($i['status']) ?>" data-followup="<?= $i['followup'] ?>"
            data-search="<?= e(strtolower($i['name'].' '.$i['email'].' '.$i['item'].' '.$i['type'])) ?>"
            data-inquiry="<?= e(json_encode($i)) ?>">
          <td class="px-6 py-4 status-cell"><?= pill($i['status']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs whitespace-nowrap"><?= e($i['date']) ?></td>
          <td class="px-6 py-4"><div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-full bg-slate-100 text-[10px] font-bold text-navy flex items-center justify-center"><?= initials($i['name']) ?></span>
            <div><div class="font-bold text-navy"><?= e($i['name']) ?></div><div class="text-[11px] text-slate-500"><?= e($i['email']) ?></div></div></div></td>
          <td class="px-6 py-4 text-navy"><?= e($i['item']) ?></td>
          <td class="px-6 py-4 text-slate-500 text-xs"><?= e($i['type']) ?></td>
          <td class="px-6 py-4"><button onclick="openDrawer(this.closest('tr'))" class="px-3.5 py-1.5 rounded-md border border-slate-300 text-navy text-xs font-bold hover:bg-slate-50 whitespace-nowrap">View Details</button></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div id="inqEmpty" class="hidden px-6 py-12 text-center text-sm text-slate-500">No inquiries match your search.</div>
  </div>
  <div class="px-6 py-4 border-t border-slate-200 text-xs text-slate-500">Showing <span id="inqShown"><?= $total ?></span> of <?= $total ?> inquiries</div>
</section>

<!-- Detail drawer -->
<div id="inquiryDrawer" class="overlay overlay-right" role="dialog" aria-modal="true" aria-labelledby="drawerTitle"
     onclick="if (event.target === this) closeDrawer()">
  <aside class="sheet bg-white w-full max-w-md h-full flex flex-col shadow-2xl">
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
      <div>
        <h2 id="drawerTitle" class="text-lg font-extrabold text-navy">Inquiry Details</h2>
        <div class="mt-1.5 flex items-center gap-3"><span id="dStatus"></span><span id="dDate" class="text-xs text-slate-500"></span></div>
      </div>
      <button onclick="closeDrawer()" aria-label="Close" class="p-1 text-slate-500 hover:text-navy"><iconify-icon icon="lucide:x" width="22"></iconify-icon></button>
    </div>

    <div class="flex-1 overflow-y-auto px-6 py-6 space-y-6">
      <div>
        <div class="eyebrow text-slate-500 mb-3">Customer</div>
        <div class="flex items-center gap-3">
          <span id="dInitials" class="w-11 h-11 rounded-full bg-navy text-white text-sm font-bold flex items-center justify-center"></span>
          <div class="font-bold text-navy text-base" id="dName"></div>
        </div>
        <dl class="mt-4 space-y-2 text-sm">
          <div class="flex gap-3"><dt class="w-16 text-slate-500">Email</dt><dd id="dEmail" class="text-navy font-medium break-all"></dd></div>
          <div class="flex gap-3"><dt class="w-16 text-slate-500">Phone</dt><dd id="dPhone" class="text-navy font-medium"></dd></div>
        </dl>
      </div>

      <div>
        <div class="eyebrow text-slate-500 mb-3">Inquiry</div>
        <dl class="space-y-2 text-sm">
          <div class="flex gap-3"><dt class="w-16 text-slate-500">About</dt><dd><a id="dItem" href="fleet.php" class="text-navy font-bold underline"></a></dd></div>
          <div class="flex gap-3"><dt class="w-16 text-slate-500">Type</dt><dd id="dType" class="text-navy font-medium"></dd></div>
        </dl>
      </div>

      <div>
        <div class="eyebrow text-slate-500 mb-3">Message</div>
        <p id="dMessage" class="text-sm leading-relaxed text-navy bg-[#f4f6fa] border border-slate-200 rounded-xl p-4"></p>
      </div>
    </div>

    <div class="px-6 py-4 border-t border-slate-200 flex flex-wrap gap-3">
      <a id="dReply" href="#" class="btn-amber flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-bold"><iconify-icon icon="lucide:reply" width="16"></iconify-icon> Reply via Email</a>
      <button onclick="setStatus('Replied')" class="px-4 py-2.5 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50">Mark as Replied</button>
      <button onclick="setStatus('Archived')" class="px-4 py-2.5 rounded-lg text-slate-500 text-sm font-bold hover:text-navy">Archive</button>
    </div>
  </aside>
</div>

<script>
const rows = [...document.querySelectorAll('#inqRows tr')];
let current = null;

const BADGE = {
  New:      'bg-emerald-50 text-emerald-700',
  Replied:  'bg-blue-50 text-blue-700',
  Archived: 'bg-slate-100 text-slate-600'
};
const badge = s => `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold ${BADGE[s]}"><span class="text-[8px]">●</span>${s}</span>`;

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
