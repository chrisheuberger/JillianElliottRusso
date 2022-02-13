<?php

// enable /wp-json/custom/v1/data to return custom post type JSON
// video D - 42 Add New Custom Route - https://www.youtube.com/watch?v=F-SnoqNYHLw
// video E - 41 How to Create Your Own Raw JSON Data - https://www.youtube.com/watch?v=9bbRATBD2Ug

function testReturn() {
  register_rest_route('custom/v1', 'data', array (
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'testResults'
  ));
}

function testResults() {
  $recommendations = new WP_QUERY(array(
    'post_type' => ' recommendation'
  ));
  $recommendationResults = array();
  while($recommendations->have_posts()) {
    $recommendations->the_post();
    array_push($recommendationResults, array(
      'title' => get_the_title(),
      'permalink' => get_the_permalink()
    ));
  }
  return $recommendationResults;
}

add_action('rest_api_init', 'testReturn');
