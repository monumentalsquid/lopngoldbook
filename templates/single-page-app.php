<?php /*Template Name: App */

get_header();

?>

<?php

$home_subheader = get_field('app_instructions_subnheader', 'option');
$pw_subheader = get_field('introduction_subheader', 'option');
$pw_inquiry = get_field('inquiry_message', 'option');


?>

<main id="primary" class="site-main home-app-main">
  <div class="custom-page-total">
    <div class="container">

      <?php if ( ! post_password_required( $post ) ) { ?>

        <div class="home-app-inner">
          <div class="subheader home--subheader white"><?php echo $home_subheader; ?></div>
          <!--Search Form-->
          <div class="app-search-cont">
            
          </div>
          <!--Search Results-->
          <div class="app-results-cont">
            <div class="app-results-list-cont">
              <?php get_template_part( 'template-parts/content', 'result-list' ); ?>
            </div>
            <div class="app-contact-details-cont">
              <?php get_template_part( 'partials/content', 'contact-details-box' ); ?>
            </div>
          </div>
        </div>

      <?php } else { ?>

        <div class="home-password-protect">
          <div class="subheader pw--subheader white"><?php echo $pw_subheader; ?></div>
          <div class="pw-form-container"><?php echo get_the_password_form(); ?></div>
          <div class="pw--inquiry white"><?php echo $pw_inquiry; ?></div>
        </div>

      <?php } ?>

    </div>
  </div>
</main>

<?php

get_footer();