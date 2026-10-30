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
<section class="hero hero-bg">
  <div class="hero__inner">
    <h1 class="display hero__title">
      <span class="accent">Site</span> Clearing.<br>
      <span class="accent">Build</span> Right.
    </h1>
    <p class="hero__text">
      Heavy-duty site clearing and foundation excavation tailored for commercial property developments. Operated by licensed professionals to deliver build-ready sites on schedule and on budget.
    </p>
    <button type="button" onclick="openInquiry('Site Clearing & Heavy Equipment Services')" class="btn--hero">Inquire</button>
  </div>
</section>

<!-- Stat cards on navy band -->
<section class="stats-band">
  <div class="stats-band__grid">
    <?php foreach ([['100%','Certified Operators'],['Commercial','Grade Equipment'],['On-Time','Site Preparation'],['Safety','First Execution']] as [$big,$label]): ?>
    <div class="stat-tile">
      <div class="display stat-tile__big"><?= $big ?></div>
      <div class="stat-tile__label"><?= $label ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- About -->
<section id="about" class="section section--white">
  <div class="container">
    <div class="display section__kicker">About C.D. Zaplan Trucking</div>
    <h2 class="section__title">
      Dependable Truck Rentals &amp; Professional Site Excavation
    </h2>
    <p class="section__lead">
      We deliver heavy-duty truck rentals and site clearing services built on safety, equipment reliability, and on-time project delivery.
    </p>

    <div id="services" class="service-grid">
      <?php foreach ($services as [$num, $title, $text]): ?>
      <div class="service-card">
        <div class="display service-card__num"><?= $num ?></div>
        <h3 class="service-card__title"><?= $title ?></h3>
        <p class="service-card__text"><?= $text ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Projects & reviews -->
<section id="projects" class="section section--muted">
  <div class="container">
    <h2 class="display section__heading">Projects &amp; Reviews · Sample Testimonials</h2>

    <!-- To add a review, add one more entry to $testimonials at the top of this file -->
    <div class="reviews">
      <div id="reviewTrack" class="reviews__track">
        <?php foreach ($testimonials as $t): ?>
        <div class="review-card">
          <img src="assets/img/project.jpg" alt="Excavator and bulldozer on a cleared site" class="review-card__img">
          <div class="review-card__stars">
            <?php for ($i = 0; $i < 5; $i++): ?><iconify-icon icon="lucide:star" width="14"></iconify-icon><?php endfor; ?>
          </div>
          <p class="review-card__quote">Fast excavation and top-tier truck fleet service!</p>
          <div class="review-card__author">
            <span class="review-card__avatar"></span>
            <div>
              <div class="review-card__name"><?= $t['name'] ?></div>
              <div class="review-card__meta"><?= $t['meta'] ?></div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Arrows: centered row under the cards, floating beside the cards (with a gap) on wide screens -->
      <div class="reviews__nav">
        <button id="reviewPrev" onclick="scrollReviews(-1)" aria-label="Previous reviews" class="reviews__btn reviews__btn--prev">
          <iconify-icon icon="lucide:chevron-left" width="20"></iconify-icon>
        </button>
        <button id="reviewNext" onclick="scrollReviews(1)" aria-label="Next reviews" class="reviews__btn reviews__btn--next">
          <iconify-icon icon="lucide:chevron-right" width="20"></iconify-icon>
        </button>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/inquiry-modal.php'; ?>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
