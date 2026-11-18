  <section class="hero" id="home">
    <div class="container hero-grid">
      <div>
        <div class="eyebrow" data-i18n="heroEyebrow"><?php echo get_field('hp_hero_heading'); ?></div>
        <h1 data-i18n="heroTitle"><?php echo get_field('hp_hero_title'); ?></h1>
        <p class="hero-copy" data-i18n="heroCopy">
          <?php echo get_field('hp_hero_description'); ?>
        </p>
        <div class="hero-buttons">
          <a class="btn btn-primary" href="#vacancies" data-i18n="exploreBtn">Explore opportunities ↗</a>
          <a class="btn btn-outline" href="#destinations" data-i18n="destinationBtn">View destinations</a>
        </div>
      </div>
      <div class="hero-visual"><img class="hero-photo" src="<?php echo get_field('hp_hero_image'); ?>" alt="Contemporary hotel with pool and tropical surroundings">
        <div class="floating-card"><span class="dots">● ● ●</span>
          <?php echo get_field('hp_hero_highlights'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="destinations">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow" data-i18n="destEyebrow"><?php echo get_field('hp_destination_heading'); ?></div>
          <h2 data-i18n="destTitle"><?php echo get_field('hp_destination_title'); ?></h2>
        </div>
        <p data-i18n="destCopy"><?php echo get_field('hp_destination_destination'); ?></p>
      </div>
      <div class="destination-grid" id="destinationGrid">
        <?php if (is_main_site()) { ?>
          <?php if (have_rows('available_regions', 'option')): ?>
            <?php while (have_rows('available_regions', 'option')): the_row(); ?>
              <article class="destination-card"><img src="<?php echo get_sub_field('region_image'); ?>" alt="<?php echo get_the_title(); ?>">
                <div class="destination-content"><small><?php echo get_sub_field('region_name'); ?></small>
                  <h3><?php echo get_sub_field('region_name'); ?></h3>
                  <p><?php echo get_sub_field('region_description'); ?></p>
                  <a class="text-link" href="<?php echo get_sub_field('region_url'); ?>" data-i18n="viewOpportunitiesBtn">View opportunities <span>↗</span></a>
                </div>
              </article>
            <?php endwhile;
          endif;
        } else {
          $args = array(
            'posts_per_page' => 10,
            'post_type'      => 'country',
            'post_status'    => 'publish',
          );

          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
              $the_query->the_post();
            ?>
              <article class="destination-card"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                <div class="destination-content"><small><?php echo get_field('country_region'); ?></small>
                  <h3><?php echo get_the_title(); ?></h3>
                  <p><?php echo get_the_content(); ?></p><a class="text-link" href="#vacancies" onclick="filterDestination('nepal')" data-i18n="viewOpportunitiesBtn">View opportunities <span>↗</span></a>
                </div>
              </article>
        <?php
            endwhile;
            wp_reset_postdata();
          endif;
        } ?>
      </div>
    </div>
  </section>

  <?php if (!is_main_site()) { ?>
    <section class="section section-soft" id="vacancies">
      <div class="container">
        <div class="section-head">
          <div>
            <div class="eyebrow" data-i18n="vacEyebrow"><?php echo get_field('hp_opportunity_heading'); ?></div>
            <h2 data-i18n="vacTitle"><?php echo get_field('hp_opportunity_title'); ?></h2>
          </div>
          <p data-i18n="vacCopy">
            <?php echo get_field('hp_opportunity_description'); ?>
          </p>
        </div>
        <div class="searchbar">
          <div class="field">
            <label data-i18n="searchLabel">Search roles</label>
            <input id="searchInput" type="search" placeholder="e.g. Front Office" data-i18n-placeholder="searchPlaceholder">
          </div>

          <div class="field"><label data-i18n="destinationLabel">Destination</label><select id="destinationFilter">
              <option value="all" data-i18n="allDestinations">All destinations</option>
              <?php
              $args = array(
                'posts_per_page' => 10,
                'post_type'      => 'country',
                'post_status'    => 'publish',
                'orderby'        => 'title',
                'order'          => 'ASC',
              );

              $the_query = new WP_Query($args);
              if ($the_query->have_posts()) :
                while ($the_query->have_posts()) :
                  $the_query->the_post();
              ?>
                  <option value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
              <?php
                endwhile;
                wp_reset_postdata();
              endif; ?>
            </select>
          </div><button class="btn btn-primary" id="searchButton" data-i18n="searchBtn">Search</button>
        </div>
        <div class="vacancy-grid" id="vacancyGrid">

          <?php
          $args = array(
            'posts_per_page' => 10,
            'post_type'      => 'vacancy',
            'post_status'    => 'publish',
          );

          $the_query = new WP_Query($args);

          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
              $the_query->the_post();

              $destination = get_field('destination');

              // Support both ACF Post Object and Post ID return formats
              $destination_id = is_object($destination)
                ? $destination->ID
                : $destination;

              $destination_name = $destination_id
                ? get_the_title($destination_id)
                : '';

              $duration = get_field('duration');
              $positions = get_field('no_of_positions');
              $intakes = get_field('available_intake');
              $intake_count = is_array($intakes) ? count($intakes) : 0;

              $search_text = get_the_title() . ' ' . get_the_excerpt() . ' ' . $destination_name;
          ?>

              <article class="vacancy-card"
                data-search="<?php echo esc_attr($search_text); ?>"
                data-destination="<?php echo esc_attr($destination_id); ?>">

                <div class="card-top">
                  <span class="tag" data-i18n="vacancyTag">Rooms Division</span>
                  <span class="status" data-i18n="vacancyStatus">● Open</span>
                </div>

                <h3><?php the_title(); ?></h3>

                <p><?php echo esc_html(get_the_excerpt()); ?></p>

                <div class="meta">
                  <span>⌖ <?php echo esc_html($destination_name); ?></span>
                  <span>◷ <?php echo esc_html($duration); ?></span>
                  <span>♙ <?php echo esc_html($positions); ?> <span data-i18n="availablePositions">available positions</span></span>
                </div>

                <div class="card-bottom">
                  <small><?php echo esc_html($intake_count); ?> <span data-i18n="intakes">intake(s)</span></small>

                  <a class="text-link" href="<?php the_permalink(); ?>" data-i18n="viewDetailsBtn">
                    View details →
                  </a>
                </div>

              </article>

          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <section class="section" id="how">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow" data-i18n="stepsEyebrow"><?php echo get_field('hp_journey_heading'); ?></div>
          <h2 data-i18n="stepsTitle"><?php echo get_field('hp_journey_title'); ?></h2>
        </div>
        <p data-i18n="stepsCopy">
          <?php echo get_field('hp_journey_description'); ?>
        </p>
      </div>
      <div class="steps">
        <?php
        $i = 1;
        if (have_rows('hp_journey_steps')):
          while (have_rows('hp_journey_steps')) : the_row(); ?>
            <div class="step">
              <div class="step-num"><?php echo sprintf('%02d', $i); ?></div>
              <h3 data-i18n="step1Title"><?php echo get_sub_field('title'); ?></h3>
              <p data-i18n="step1Copy"><?php echo get_sub_field('description'); ?></p>
            </div>
        <?php $i++;
          endwhile;
        endif; ?>
      </div>
    </div>
  </section>

  <section class="section section-soft">
    <div class="container">
      <div class="cta">
        <div>
          <h2 data-i18n="ctaTitle">Ready to make your move?</h2>
          <p data-i18n="ctaCopy">Find an internship that helps turn your ambition into experience.</p>
        </div><a class="btn" href="#vacancies" data-i18n="ctaBtn">Explore open roles ↗</a>
      </div>
    </div>
  </section>