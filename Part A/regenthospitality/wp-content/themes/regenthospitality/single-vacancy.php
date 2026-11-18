<?php do_action('regent_header');

global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request)); ?>

<main id="app">
  <section class="page-hero">
    <div class="container">
      <div class="breadcrumbs"><a href="#home">Home</a> / <a href="#vacancies">Vacancies</a> / <?php echo get_the_title(); ?></div>
      <div class="eyebrow">
        <?php $destination = get_field('destination');
        echo get_the_title($destination); ?> - <?php echo get_the_title(); ?>
      </div>
      <h1><?php echo get_the_title(); ?></h1>
      <p><?php echo get_the_excerpt(); ?></p>
    </div>
  </section>
  <section class="section">
    <div class="container detail-layout">
      <article class="detail-panel">
        <?php echo get_the_content(); ?>
      </article>


      <?php if (isset($_GET['application']) && $_GET['application'] === 'success') : ?>
        <div class="alert alert-success success-message-box">
          Your application has been submitted successfully!
        </div>
      <?php else: ?>

        <form class="form-card" id="applicationForm"
          action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
          method="POST"
          enctype="multipart/form-data">

          <input type="hidden" name="action" value="submit_internship_application">

          <?php wp_nonce_field('submit_internship_application', 'application_nonce'); ?>

          <input type="hidden" name="vacancy_id" value="<?php echo esc_attr(get_the_ID()); ?>">

          <h2>Personal information</h2>

          <div class="form-grid">
            <div class="field">
              <input type="text" name="full_name" required placeholder="Full name *">
            </div>

            <div class="field">
              <input type="email" name="email_address" required placeholder="Email address *">
            </div>

            <div class="field">
              <input type="text" name="phone_number" required placeholder="Phone number *">
            </div>

            <div class="field">
              <input type="text" name="nationality" required placeholder="Nationality *">
            </div>
          </div>

          <h2 style="margin-top:22px">Internship details</h2>

          <div class="field">
            <label>Selected vacancy</label>
            <input type="text" name="applied_for" value="<?php echo esc_attr(get_the_title()); ?>" readonly>
          </div>

          <div class="field">
            <label>Select intake *</label>
            <select name="intake" required>
              <option value="">Select intake</option>
              <?php
              if (have_rows('available_intake')):
                $first = true;
                while (have_rows('available_intake')) : the_row();
                  $date = get_sub_field('select_date');
              ?>
                  <option value="<?php echo esc_attr($date); ?>">
                    <?php echo esc_html($date); ?>
                  </option>
              <?php
                endwhile;
              endif;
              ?>
            </select>
          </div>

          <div class="field">
            <label>Upload CV / Resume *</label>
            <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
            <div class="form-note">PDF, DOC or DOCX · Max 5 MB</div>
          </div>

          <div class="field">
            <label>Cover letter</label>
            <textarea name="cover" maxlength="200" placeholder="Tell us why you are interested in this internship..."></textarea>
          </div>

          <button class="btn btn-primary" type="submit">
            Submit application ↗
          </button>

        </form>

      <?php endif; ?>
    </div>
  </section>
</main>

<?php do_action('regent_footer'); ?>