<?php
/**
 * Title: Latest HVAC guides
 * Slug: capehart/latest-guides
 * Categories: capehart, posts
 * Keywords: blog, posts, query, guides
 * Description: A dynamic three-post guide grid powered by the core Query block.
 * Inserter: yes
 */
?>

<!-- wp:group {"tagName":"section","align":"full","className":"ch-section ch-section--soft ch-latest-guides","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ch-section ch-section--soft ch-latest-guides"><!-- wp:group {"align":"wide","className":"ch-section-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide ch-section-heading"><!-- wp:paragraph {"className":"ch-eyebrow"} -->
<p class="ch-eyebrow"><?php esc_html_e( 'Helpful before you call', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Practical HVAC guides for Tulsa-area homeowners', 'capehart-custom' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Understand common symptoms, safe homeowner checks, and when professional diagnosis makes sense.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","className":"ch-guides-query"} -->
<div class="wp-block-query alignwide ch-guides-query"><!-- wp:post-template {"className":"ch-guide-grid","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"capehart-card","className":"ch-guide-card__image"} /-->

<!-- wp:group {"className":"ch-guide-card__body","layout":{"type":"constrained"}} -->
<div class="wp-block-group ch-guide-card__body"><!-- wp:post-terms {"term":"category","className":"ch-guide-card__meta"} /-->

<!-- wp:post-title {"level":3,"isLink":true} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":22} /-->

<!-- wp:read-more {"content":"Read the guide →","className":"ch-guide-card__link"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'New HVAC guides will appear here as they are published.', 'capehart-custom' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:buttons {"className":"ch-section-actions","layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons ch-section-actions"><!-- wp:button {"className":"is-style-outline ch-button ch-button--ghost"} -->
<div class="wp-block-button is-style-outline ch-button ch-button--ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'View all HVAC guides', 'capehart-custom' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
