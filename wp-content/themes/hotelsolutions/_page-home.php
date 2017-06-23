<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Page Home
 * @package hotelsolutions
 */

if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' )  ) {
 
    if ( trim( $_POST['postTitle'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
        exit();
    }

     //Cas as array
     $terms = isset($_POST['postPuesto']) ? (array) $_POST['postPuesto'] : array();

     //Cast array values as integers if $_POST['category'] contains IDs
     $terms = array_map('intval',$terms);
   
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['postTitle'] ),
        'post_content' => $_POST['postContent'],
        //'post_category' => array($_POST['postPuesto']), // Usable for custom taxonomies too
        'post_type' => 'registro',
        'post_status' => 'publish',
        /* 'tax_input'     => array( //este no funciona si el usuario no esta logueado
               'puesto' => $terms,
                          
        ),*/
    );
 
    $post_id = wp_insert_post( $post_information );
     wp_set_object_terms($post_id, $terms, 'puesto', false); // este por que si el usuario no esta logueado
     //wp_set_post_terms($post_id, $new, 'project_type', false )
	 if ( $post_id ) {

        update_post_meta($post_id, 'rw_email', $_POST['postEmail']);
        
        if ( $_FILES ) {

                require_once ABSPATH.'wp-admin/includes/admin.php';
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');

                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                        //return "upload error : " . $_FILES[$file]['error'];
                    }
                    //$attach_id = media_handle_upload( $file, $post_id );


                     

                    $file_return = wp_handle_upload($_FILES['myfile'], array('test_form' => false));

                    if(isset($file_return['error']) || isset($file_return['upload_error_handler'])){

                      //return false;
                    }else{

                        $filename = $file_return['file'];
                       
                        $attachment = array(
                            'post_mime_type' => $file_return['type'],
                            'post_content' => '',
                            'post_name' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                            'post_parent' => $post_id,
                            'post_type' => 'attachment',
                            'post_status' => 'inherit',
                            'guid' => $file_return['url']
                        );

                        if($title){
                            $attachment['post_title'] = $title;
                        }

                        $attachment_id = wp_insert_attachment( $attachment, $filename );

                   
                        

                        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );

                        wp_update_attachment_metadata( $attachment_id, $attachment_data );

                        if( 0 < intval( $attachment_id ) ) {
                           // return $attachment_id;

                            update_post_meta($post_id, 'rw_files', $attachment_id);
                        }
                    }
                }   
                   
            

                 
           


            }

         /*if (!function_exists('wp_generate_attachment_metadata')){
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            }*/
           /*  if ($_FILES) {

                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                        return "upload error : " . $_FILES[$file]['error'];
                    }
                    $attach_id = media_handle_upload( $file, $post_id );
                }   
            }
            if ($attach_id > 0){
                //and if you want to set that image as Post  then use:
               // update_post_meta($post_id,'rw_files',$attach_id);
                update_post_meta($post_id,'_thumbnail_id',$attach_id);
            }*/


	   wp_redirect( home_url() );

	    exit;
	}
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.

			?>
            <!-- Put this in your theme template file -->



            

           
			<form action="" id="primaryPostForm" method="POST" enctype="multipart/form-data" name="myForm">
 
    <fieldset>
        <label for="postTitle"><?php _e('Post Title:', 'framework') ?></label>
 
        <input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>"  />
        <?php if ( $postTitleError != '' ) { ?>
		    <span class="error"><?php echo $postTitleError; ?></span>
		    <div class="clearfix"></div>
		<?php } ?>
    </fieldset>
    <fieldset>
        <label for="postTitle"><?php _e('Email:', 'framework') ?></label>
 
        <input type="text" name="postEmail" id="postEmail" class="required" value="<?php if ( isset( $_POST['postEmail'] ) ) echo $_POST['postEmail']; ?>" />
        <?php if ( $postEmail != '' ) { ?>
            <span class="error"><?php echo $postEmail; ?></span>
            <div class="clearfix"></div>
        <?php } ?>
    </fieldset>
    <?php $args = array(
                'name'               => 'postPuesto',
                'taxonomy'           => 'puesto',
                'hide_if_empty'      => false,
                 'hide_empty' => false
            ); ?>

            
    <p><?php wp_dropdown_categories( $args ); ?> </p>
    
    <fieldset>
        <label for="postTitle"><?php _e('Archivo:', 'framework') ?></label>
 
        <input type="file" name="myfile" id="myfile" class="required" value="<?php if ( isset( $_POST['myfile'] ) ) echo $_POST['myfile']; ?>" required/>
        <?php if ( $myfile != '' ) { ?>
            <span class="error"><?php echo $myfile; ?></span>
            <div class="clearfix"></div>
        <?php } ?>
    </fieldset>
 
    <fieldset>
        <label for="postContent"><?php _e('Post Content:', 'framework') ?></label>
 
        <textarea name="postContent" id="postContent" rows="8" cols="30" class="required"><?php if ( isset( $_POST['postContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['postContent'] ); } else { echo $_POST['postContent']; } } ?>
		</textarea>
    </fieldset>
 
    <fieldset>
        
        <input type="hidden" name="submitted" id="submitted" value="true" />
    	<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
       
        <button type="submit"><?php _e('Add Post', 'framework') ?></button>
    </fieldset>
 
</form>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
