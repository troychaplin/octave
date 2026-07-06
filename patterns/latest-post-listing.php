<?php
/**
 * Title: Latest post listing
 * Slug: octave/latest-post-listing
 * Categories: Octave Sections
 */
?>
<!-- wp:group {"metadata":{"name":"Container"},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading {"className":"is-style-thick-border"} -->
<h2 class="wp-block-heading is-style-thick-border">Latest journal notes</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":20,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|90"}}} -->
<!-- wp:group {"metadata":{"name":"Single Post"},"align":"wide","className":"octave-post-listing","style":{"spacing":{"blockGap":"var:preset|spacing|90","padding":{"bottom":"var:preset|spacing|90"}},"border":{"bottom":{"color":"var:preset|color|neutral-400","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide octave-post-listing" style="border-bottom-color:var(--wp--preset--color--neutral-400);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--90)"><!-- wp:group {"metadata":{"name":"Post Meta"},"className":"octave-post-listing__meta","style":{"spacing":{"blockGap":"var:preset|spacing|80"}},"layout":{"type":"default"}} -->
<div class="wp-block-group octave-post-listing__meta"><!-- wp:group {"metadata":{"name":"Date \u0026 Read Time"},"className":"octave-post-listing__date-time","style":{"spacing":{"margin":{"top":"var:preset|spacing|0","bottom":"var:preset|spacing|0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group octave-post-listing__date-time" style="margin-top:var(--wp--preset--spacing--0);margin-bottom:var(--wp--preset--spacing--0)"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"x-small","fontFamily":"inter-tight"} /-->

<!-- wp:post-time-to-read {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"x-small","fontFamily":"inter-tight"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Post Terms"},"className":"octave-post-listing__terms","style":{"spacing":{"margin":{"top":"var:preset|spacing|0","bottom":"var:preset|spacing|0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group octave-post-listing__terms" style="margin-top:var(--wp--preset--spacing--0);margin-bottom:var(--wp--preset--spacing--0)"><!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"x-small","fontFamily":"inter-tight"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Post Content"},"align":"wide","className":"octave-post-listing__content","style":{"spacing":{"margin":{"top":"var:preset|spacing|0","bottom":"var:preset|spacing|0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide octave-post-listing__content" style="margin-top:var(--wp--preset--spacing--0);margin-bottom:var(--wp--preset--spacing--0)"><!-- wp:post-title {"isLink":true,"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|grey-dark"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"grey-dark","fontSize":"x-large"} /-->

<!-- wp:post-excerpt {"fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->