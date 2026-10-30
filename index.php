<?php
$pageTitle = 'C.D. Zaplan Trucking | Site Clearing & Heavy Equipment Rentals';
// $isLoggedIn = true;   // uncomment to preview the "Register + Logout" header from Figma
require_once __DIR__ . '/includes/header.php';

$testimonials = [
  ['name' => 'Sarah Jenkins',   'meta' => 'Site grading · Laguna (sample)'],
  ['name' => 'Michael Chen',    'meta' => 'Excavation · Cavite (sample)'],
  ['name' => 'Elena Rodriguez', 'meta' => 'Site clearing · Rizal (sample)'],
  ['name' => 'Marco Santos',    'meta' => 'Excavation · Pangasinan (sample)'],
];
$services = [
  ['01', 'Heavy-Duty Truck Fleet', 'Dump trucks & material haulers ready for deployment. Our fleet is meticulously maintained to ensure zero downtime on your site.'],
  ['02', 'Precision Excavation',   'Professional site grading, trenching, & clearing. We handle complex terrain with precision and care for your future build.'],
  ['03', 'Experienced Crew',       'Certified operators ensuring safe, zero-delay execution. Our team is your partner from the first dig to the final grade.'],
];
?>

<!-- Hero -->
<section class="hero-bg text-white">
  <div class="max-w-6xl mx-auto px-6 pt-24 pb-24 md:pt-28 md:pb-28">
    <h1 class="font-heading text-6xl sm:text-7xl md:text-[104px] leading-[1.05]">
      <span class="text-amber">Site</span> Clearing.<br>
      <span class="text-amber">Build</span> Right.
    </h1>
    <p class="mt-8 max-w-[480px] text-lg leading-relaxed text-white/95">
      Heavy-duty site clearing and foundation excavation tailored for commercial property developments. Operated by licensed professionals to deliver build-ready sites on schedule and on budget.
    </p>
    <button type="button" onclick="openInquiry('Site Clearing & Heavy Equipment Services')" class="inline-block mt-8 px-10 py-4 bg-[#f5b000] hover:bg-amber text-navy btn-label text-xs transition-colors">Inquire</button>
  </div>
</section>

<!-- Stat cards on navy band -->
<section class="bg-navy py-8">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5">
    <?php foreach ([['100%','Certified Operators'],['Commercial','Grade Equipment'],['On-Time','Site Preparation'],['Safety','First Execution']] as [$big,$label]): ?>
    <div class="bg-white rounded-xl p-6 md:p-7">
      <div class="font-heading text-3xl md:text-4xl text-amber leading-none"><?= $big ?></div>
      <div class="mt-3 text-xs md:text-sm font-bold uppercase text-navy"><?= $label ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- About -->
<section id="about" class="bg-white py-20 md:py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="font-heading text-3xl md:text-[40px] text-amber">About C.D. Zaplan Trucking</div>
    <h2 class="mt-6 text-3xl md:text-[40px] font-extrabold leading-tight text-navy max-w-3xl">
      Dependable Truck Rentals &amp; Professional Site Excavation
    </h2>
    <p class="mt-5 max-w-xl text-slate-500 leading-relaxed">
      We deliver heavy-duty truck rentals and site clearing services built on safety, equipment reliability, and on-time project delivery.
    </p>

    <div id="services" class="mt-12 grid md:grid-cols-3 gap-5">
      <?php foreach ($services as [$num, $title, $text]): ?>
      <div class="bg-slate-50 border border-slate-200 rounded-2xl p-8 h-full">
        <div class="font-heading text-3xl text-navy"><?= $num ?></div>
        <h3 class="mt-4 text-xl font-bold text-navy"><?= $title ?></h3>
        <p class="mt-3 text-sm leading-relaxed text-slate-500"><?= $text ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Projects & reviews -->
<section id="projects" class="bg-slate-50 py-20 md:py-24">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="font-heading text-3xl md:text-5xl text-navy">Projects &amp; Reviews · Sample Testimonials</h2>

    <!-- To add a review, add one more entry to $testimonials at the top of this file -->
    <div class="relative mt-12">
      <div id="reviewTrack" class="no-scrollbar flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth">
        <?php foreach ($testimonials as $t): ?>
        <div class="snap-start shrink-0 w-full md:w-[calc((100%-3rem)/3)] bg-white border border-slate-200 rounded-2xl p-5 flex flex-col">
          <img src="assets/img/project.jpg" alt="Excavator and bulldozer on a cleared site" class="w-full h-52 object-cover rounded-lg">
          <div class="mt-4 flex gap-1 text-amber">
            <?php for ($i = 0; $i < 5; $i++): ?><iconify-icon icon="lucide:star" width="14"></iconify-icon><?php endfor; ?>
          </div>
          <p class="mt-3 font-bold text-navy leading-snug">Fast excavation and top-tier truck fleet service!</p>
          <div class="mt-auto pt-4 flex items-center gap-3">
            <span class="w-9 h-9 rounded-full bg-slate-200 shrink-0"></span>
            <div>
              <div class="text-xs font-bold text-navy"><?= $t['name'] ?></div>
              <div class="text-[11px] text-slate-500"><?= $t['meta'] ?></div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Arrows: centered row under the cards, floating beside the cards (with a gap) on wide screens -->
      <div class="flex justify-center gap-4 mt-6 xl:mt-0 xl:contents">
        <button id="reviewPrev" onclick="scrollReviews(-1)" aria-label="Previous reviews"
          class="z-10 w-11 h-11 rounded-full bg-white border-2 border-navy text-navy shadow-md flex items-center justify-center hover:bg-slate-50 disabled:opacity-30 disabled:cursor-not-allowed xl:absolute xl:top-1/2 xl:-translate-y-1/2 xl:-left-16">
          <iconify-icon icon="lucide:chevron-left" width="20"></iconify-icon>
        </button>
        <button id="reviewNext" onclick="scrollReviews(1)" aria-label="Next reviews"
          class="z-10 w-11 h-11 rounded-full bg-amber text-navy shadow-md flex items-center justify-center hover:bg-amber-hover disabled:opacity-30 disabled:cursor-not-allowed xl:absolute xl:top-1/2 xl:-translate-y-1/2 xl:-right-16">
          <iconify-icon icon="lucide:chevron-right" width="20"></iconify-icon>
        </button>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/inquiry-modal.php'; ?>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
