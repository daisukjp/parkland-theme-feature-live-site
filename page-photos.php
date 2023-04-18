<?php

    // template for displaying all photos

    // all other pages will default to page.php. These pages are useful in that the client cannot change the content on these pages. The content is hard-coded therefore un-editable.

    //Please note that this is a wordpress construct of pages and that other 'pages' on your wordpress site may use a different template.

    //@link https://developer.wordpress.org/themes/basics/template-hierarchy/

    //@package parkland-theme

?>

<?php get_header(); ?>

<main>

<h1>test</h1>

    <div class="photo-gallery-banner">
        <h1>
            Photo Gallery
            <img src="/wp-content/themes/parkland-theme/images/banner-underline.png" alt="styled brush stroke">
        </h1>
    </div>



    <div class="photo-gallery-section">
        <h2>
            Photos of Parkland
            <img src="/wp-content/themes/parkland-theme/images/brushstroke.svg" alt="styled brush stroke">
        </h2>
    </div>

    <section>
        <div class="gallery-container">
            
            <?php
                $args = array(
                'post_type' => 'my-photos',
                'posts_per_page' => 15,
                'order' => 'ASC',
            );
            if ( function_exists( 'rl_gallery' ) ) { rl_gallery( '454' ); }
            // Get the post or page ID where the gallery is located
            $post_id = get_the_ID();

            // Retrieve the gallery shortcode content from the post or page
            $gallery = get_post_gallery($post_id, false);

            // Extract the image IDs from the gallery shortcode content
            $ids = explode(',', $gallery['ids']);
            
            // Loop through the array of image IDs and display the images
            ?>
            <ul class="image-gallery">
                <?php
                foreach ($ids as $id) {
                    $image = wp_get_attachment_image_src($id, 'large');
                    echo '<li><a href="' . $image[0] . '" class="lightbox"><img src="' . $image[0] . '" /></a></li>';
                }
                ?>
            </ul>
        </div>
    </section>


</main>

<?php get_footer(); ?>