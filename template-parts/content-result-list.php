<?php

$request = wp_remote_get( 'https://workflow-automation.podio.com/podiofeed.php?c=13265&a=282144&f=5127' );

if( is_wp_error( $request ) ) {
	return false;
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );

// if( ! empty( $data ) ) {
// 	foreach( $data as $show ) {

//     $show_name = $show->{'lopn-podcast-name'};
//     $show_id = strtolower ( str_replace(' ', '-', $show_name) );

//     echo '<div id="' . $show_id . '" class="show-block">';
//       echo '<div class="show-block-inner">';
//         echo '<div class="show-title-box">';
//           echo '<h4 class="green">' . $show_name . '</h4>';
//           echo '<p class="show-league black">NBA</p> | <p class="show-conf black">Western Conference</p>';
//         echo '</div>';
//         echo '<div class="show-location-box">';
//           echo '<p class="show-label-header gray">Location</p>';
//           echo '<p class="show-league black">Los Angeles, CA</p>';
//         echo '</div>';
//         echo '<div class="show-host-box">';
//           echo '<p class="show-label-header gray">Host(s)</p>';
//           echo '<p class="show-league black">Anthony Irwin</p>';
//         echo '</div>';
//       echo '</div>';
// 		echo '</div>';

// 	}
// }

?>