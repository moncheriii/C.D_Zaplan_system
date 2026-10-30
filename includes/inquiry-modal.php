<!-- Inquiry modal. Open it from anywhere with: onclick="openInquiry('Item name')" -->
<div id="inquiryModal" class="overlay" role="dialog" aria-modal="true" aria-labelledby="inquiryTitle"
     onclick="if (event.target === this) closeInquiry()">
  <div class="sheet bg-white rounded-2xl w-full max-w-lg max-h-[92vh] overflow-y-auto shadow-2xl">

    <!-- Form view -->
    <div id="inquiryFormView">
      <div class="flex items-start justify-between gap-4 px-7 pt-7">
        <div>
          <h2 id="inquiryTitle" class="text-2xl font-extrabold text-navy tracking-tight">Send an Inquiry</h2>
          <p class="mt-1 text-sm text-slate-500">We usually respond within 24 hours.</p>
        </div>
        <button type="button" onclick="closeInquiry()" aria-label="Close" class="p-1 text-slate-500 hover:text-navy">
          <iconify-icon icon="lucide:x" width="22"></iconify-icon>
        </button>
      </div>

      <form id="inquiryForm" onsubmit="submitInquiry(event)" class="px-7 pt-6 pb-7 space-y-4">
        <div>
          <label class="block text-xs font-bold text-navy mb-2">Inquiring About</label>
          <input id="inquiryItem" type="text" readonly class="field bg-slate-50 text-slate-600 cursor-not-allowed">
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2" for="inquiryName">Full Name <span class="text-rose-500">*</span></label>
          <input id="inquiryName" type="text" required placeholder="Enter your full name" class="field">
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2" for="inquiryEmail">Email Address <span class="text-rose-500">*</span></label>
          <input id="inquiryEmail" type="email" required placeholder="you@example.com" class="field">
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2" for="inquiryType">Inquiry Type</label>
          <select id="inquiryType" class="field">
            <option>General Inquiry</option>
            <option>Quote &amp; Pricing Request</option>
            <option>Availability Check</option>
            <option>Technical Specifications</option>
          </select>
        </div>
        <div>
          <label class="block text-xs font-bold text-navy mb-2" for="inquiryMessage">Message <span class="text-rose-500">*</span></label>
          <textarea id="inquiryMessage" required rows="4" placeholder="Tell us about your project, site location, and schedule." class="field resize-none"></textarea>
        </div>
        <div class="flex items-center justify-end gap-3 pt-2">
          <button type="button" onclick="closeInquiry()" class="px-5 py-3 rounded-lg border-2 border-navy text-navy text-sm font-bold hover:bg-slate-50">Cancel</button>
          <button type="submit" class="btn-amber px-6 py-3 rounded-lg text-sm font-bold">Submit Inquiry</button>
        </div>
      </form>
    </div>

    <!-- Success view -->
    <div id="inquirySuccess" class="hidden px-7 py-12 text-center">
      <span class="mx-auto w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
        <iconify-icon icon="lucide:check" width="34"></iconify-icon>
      </span>
      <h2 class="mt-6 text-2xl font-extrabold text-navy tracking-tight">Inquiry sent</h2>
      <p class="mt-2 text-sm text-slate-500 max-w-xs mx-auto">
        Thanks, <span id="inquirySuccessName" class="font-bold text-navy"></span>. We'll reply to
        <span id="inquirySuccessEmail" class="font-bold text-navy"></span> within 24 hours.
      </p>
      <button type="button" onclick="closeInquiry()" class="btn-amber mt-8 px-8 py-3 rounded-lg text-sm font-bold">Done</button>
    </div>

  </div>
</div>
