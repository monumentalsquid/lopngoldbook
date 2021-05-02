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
          <div class="app-search-cont">
            <span class="clearable-input">
              <input id="search-field" type="search" placeholder="Search" />
              <!-- <span id="clearable__clear">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11.997" viewBox="0 0 12 11.997"><path d="M18.707,17.287,22.993,13a1,1,0,1,0-1.42-1.42l-4.286,4.286L13,11.581A1,1,0,1,0,11.581,13l4.286,4.286-4.286,4.286A1,1,0,0,0,13,22.993l4.286-4.286,4.286,4.286a1,1,0,0,0,1.42-1.42Z" transform="translate(-11.285 -11.289)" fill="#f6860b"/></svg>
              </span> -->
            </span>
            <input id="search-submit" type="submit" value="Search"/>
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

?>

<script>

jQuery( document ).ready(function() {
  const fuse = new Fuse(data, {
    includeScore: true,
    keys: [ 
      'lopn-podcast-name'
    ]
  })

  const result = fuse.search('lake');

  console.log('results', results);
  
});


</script>