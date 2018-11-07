<?php

/* Template Name: Spa Homepage */

get_header();

?>

<!-- Start Point -->
<?php  
// DALINIAI FAILAI:
get_template_part('partials/hero_carousel');
get_template_part('partials/about_us');
get_template_part('partials/intro_to_service');
get_template_part('partials/services');
get_template_part('partials/voucher');
get_template_part('partials/news');
?>

<?php get_footer(); ?>