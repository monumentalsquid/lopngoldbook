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
            <div id="search-results" class="app-results-list-cont">
              <?php //get_template_part( 'template-parts/content', 'result-list' ); ?>
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

//JSON Feed URL
$url = 'https://workflow-automation.podio.com/podiofeed.php?c=13265&a=282144&f=5127';
$res_args = array(
  'timeout'     => 100,
  'sslverify' => false
); 
$response = wp_remote_get( esc_url_raw( $url ), $res_args );
if ( is_wp_error( $response ) ) {
  echo 'wp_remote_get error';
} else {
  $body = wp_remote_retrieve_body( $response );
  $data = json_decode( $body, true );
}

?>


<script>

jQuery( document ).ready(function($) {


  //Encode JSON object, instantiate Fuse.js object
  var arr = <?php echo json_encode( $data ); ?>;
  
  const fuse = new Fuse(arr, {
    includeScore: true,
    threshold: 0.35,
    keys: [ 
      'lopn-podcast-name', 'network-tag', 'conferencedivision', 
      'team-city-2', 'team-state', 
      'host-1-name-2', 'host-2-name-2', 'host-3-name', 'host-4-name',
    ]
  })
  

  //Render Search Results Function
  function renderSearchResults() {
    var vPool=""; //reset vPool to empty #search-results
    var searchTerm = jQuery("#search-field").val();
    var result = fuse.search(searchTerm);
    var regExp = /[a-zA-Z]/g;

    jQuery.each(result, function(i, val) {

      var podName = val.item['active-podcast'];

      if (podName == "Yes") {

        //show variables
        var podName = val.item['lopn-podcast-name'];
        var network = val.item['network-tag'];

        var conference = val.item['conferencedivision'];
        var city = val.item['team-city-2'];
        var state = val.item['team-state'];

        if(regExp.test(conference) && conference !== undefined) {
          var confHtml = 
          '<p class="show-conf black">&nbsp;| ' + conference + '</p>' 
        } else {
          var confHtml = "";
        }

        if(regExp.test(city) && city !== undefined ) {
          var locationHtml = 
          '<p class="show-label-header gray">Location</p>' + 
          '<p class="show-league black">' + city + ', ' + state + '</p>'
        } else {
          var locationHtml = "";
        }

        //hosts
        var host1 = val.item['host-1-name-2'];
        var hostEmail1 = val.item['host-1-email-2'];
        var host2 = val.item['host-2-name-2'];
        var hostEmail2 = val.item['host-2-email'];
        var host3 = val.item['host-3-name'];
        var hostEmail3 = val.item['host-3-email1'];
        var host4 = val.item['host-4-name'];
        var hostEmail4 = val.item['host-4-email-2'];

        if(regExp.test(host1) && host1 !== undefined) {
          var hostInfo1 = 
          '<div class="host-info-block">' +
            '<p class="host-name black">' + host1 + '</p>' + 
            '<a class="host-email green" href="mailto:' + hostEmail1 + '">' + hostEmail1 + '</a>' + 
          '</div>'
        } else {
          var hostInfo1 = "";
        }

        if(regExp.test(host2) && host2 !== undefined) {
          var hostInfo2 = 
          '<div class="host-info-block">' +
            '<p class="host-name black">' + host2 + '</p>' + 
            '<a class="host-email green" href="mailto:' + hostEmail2 + '">' + hostEmail2 + '</a>' + 
          '</div>'
        } else {
          var hostInfo2 = "";
        }

        if(regExp.test(host3) && host3 !== undefined) {
          var hostInfo3 = 
          '<div class="host-info-block">' +
            '<p class="host-name black">' + host3 + '</p>' + 
            '<a class="host-email green" href="mailto:' + hostEmail3 + '">' + hostEmail3 + '</a>' + 
          '</div>'
        } else {
          var hostInfo3 = "";
        }

        if(regExp.test(host4) && host4 !== undefined) {
          var hostInfo4 = 
          '<div class="host-info-block">' +
            '<p class="host-name black">' + host4 + '</p>' + 
            '<a class="host-email green" href="mailto:' + hostEmail4 + '">' + hostEmail4 + '</a>' + 
          '</div>'
        } else {
          var hostInfo4 = "";
        }


        vPool += 
        '<div class="show-block">' + 
          '<div class="show-block-inner">' + 
            '<div class="show-title-box">' + 
              '<h4 class="green">' + podName + '</h4>' + 
              '<p class="show-league black">' + network + '</p>' + confHtml + 
            '</div>' + 
            '<div class="show-location-box">' + 
              locationHtml +
            '</div>' + 
            // '<div class="show-toggle-icon">' + 
            //   '<svg xmlns="http://www.w3.org/2000/svg" width="29.25" height="29.25" viewBox="0 0 29.25 29.25"><g transform="translate(32.625 -3.375) rotate(90)"><path d="M14.815,10.378a1.362,1.362,0,0,1,1.92,0l6.708,6.729a1.356,1.356,0,0,1,.042,1.87l-6.609,6.63a1.355,1.355,0,1,1-1.92-1.912l5.618-5.7-5.759-5.7A1.341,1.341,0,0,1,14.815,10.378Z" fill="#f6860b"/><path d="M3.375,18A14.625,14.625,0,1,0,18,3.375,14.623,14.623,0,0,0,3.375,18Zm2.25,0A12.37,12.37,0,0,1,26.747,9.253,12.37,12.37,0,1,1,9.253,26.747,12.269,12.269,0,0,1,5.625,18Z" fill="#f6860b"/></g></svg>' +
            // '</div>' + 
          '</div>' + 
          '<div class="show-host-block">' +
            '<p class="show-label-header gray">Host(s)</p>' + 
            '<div class="show-host-block-inner">' +
              hostInfo1 +
              hostInfo2 +
              hostInfo3 +
              hostInfo4 +
            '</div>' + 
          '</div>' + 
        '</div>'

      }

    });

    jQuery('#search-results').html(vPool);

  }


  //Search On Submit
  jQuery('#search-submit').click(function() {
    renderSearchResults();
  });


  //Search on field Enter
  jQuery('#search-field').keypress(function (e) {
    if (e.which == 13) {
      renderSearchResults();
      return false;
    }
  });

  //Accordion
  jQuery(".show-block-inner").click(function() {
    console.log("please work!!!");
    if (jQuery(this).hasClass("active")) {
      jQuery(this).removeClass("active");
      jQuery(this).siblings(".show-host-block").slideUp(200);
    } else {
      jQuery(".show-block-inner").removeClass("active");
      jQuery(this).addClass("active");
      jQuery(".show-host-block").slideUp(200);
      jQuery(this).siblings(".show-host-block").slideDown(200);
    }
  });
  

});


</script>