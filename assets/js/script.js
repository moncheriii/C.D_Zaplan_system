// ===== UI-only helpers. Replace with real back-end calls later. =====

// Mobile nav (public header)
function toggleMenu() {
  document.getElementById('mobileMenu').classList.toggle('hidden');
}

// Show / hide password
function togglePassword(btn) {
  const input = btn.parentElement.querySelector('input');
  const show = input.type === 'password';
  input.type = show ? 'text' : 'password';
  btn.querySelector('iconify-icon').setAttribute('icon', show ? 'lucide:eye-off' : 'lucide:eye');
}

// Demo login routing: admin email goes to admin.php, everyone else to dashboard.php
function handleLogin(event) {
  event.preventDefault();
  const email = event.target.querySelector('input[type="email"]').value.trim().toLowerCase();
  window.location.href = (email === 'carlito.zaplan@gmail.com') ? 'admin.php' : 'dashboard.php';
}

function handleRegister(event) {
  event.preventDefault();
  const pw = event.target.querySelectorAll('input[type="password"]');
  if (pw[0].value !== pw[1].value) { alert('Passwords do not match.'); return; }
  window.location.href = 'login.php';
}

// Modal (client dashboard)
function openModal(id)  { document.getElementById(id).classList.remove('hidden'); }
function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

// Placeholders
function handleAddUser()       { alert('Add User form goes here.'); }
function handleExportPayroll() { alert('Payroll export goes here.'); }

// Reviews carousel (homepage): scroll one card at a time, disable arrows at the ends
function scrollReviews(dir) {
  const track = document.getElementById('reviewTrack');
  const card = track.firstElementChild;
  const gap = parseFloat(getComputedStyle(track).columnGap) || 24;
  track.scrollBy({ left: dir * (card.offsetWidth + gap), behavior: 'smooth' });
}
function updateReviewArrows() {
  const t = document.getElementById('reviewTrack');
  if (!t) return;
  document.getElementById('reviewPrev').disabled = t.scrollLeft <= 4;
  document.getElementById('reviewNext').disabled = t.scrollLeft + t.clientWidth >= t.scrollWidth - 4;
}
window.addEventListener('load', () => {
  const t = document.getElementById('reviewTrack');
  if (!t) return;
  t.addEventListener('scroll', updateReviewArrows);
  window.addEventListener('resize', updateReviewArrows);
  updateReviewArrows();
});

// ===== Inquiry modal (public) =====
function openInquiry(item) {
  const m = document.getElementById('inquiryModal');
  document.getElementById('inquiryItem').value = item || 'General Inquiry';
  document.getElementById('inquiryFormView').classList.remove('hidden');
  document.getElementById('inquirySuccess').classList.add('hidden');
  m.classList.add('is-open');
  document.body.style.overflow = 'hidden';
  setTimeout(() => document.getElementById('inquiryName').focus(), 280);
}
function closeInquiry() {
  const m = document.getElementById('inquiryModal');
  if (!m) return;
  m.classList.remove('is-open');
  document.body.style.overflow = '';
  setTimeout(() => document.getElementById('inquiryForm').reset(), 300);
}
function submitInquiry(event) {
  event.preventDefault();
  document.getElementById('inquirySuccessName').textContent  = document.getElementById('inquiryName').value.trim().split(' ')[0];
  document.getElementById('inquirySuccessEmail').textContent = document.getElementById('inquiryEmail').value.trim();
  document.getElementById('inquiryFormView').classList.add('hidden');
  document.getElementById('inquirySuccess').classList.remove('hidden');
}
// Escape closes any open overlay
document.addEventListener('keydown', (e) => {
  if (e.key !== 'Escape') return;
  document.querySelectorAll('.overlay.is-open').forEach(el => {
    if (el.id === 'inquiryModal') closeInquiry(); else el.classList.remove('is-open');
  });
  document.body.style.overflow = '';
});
