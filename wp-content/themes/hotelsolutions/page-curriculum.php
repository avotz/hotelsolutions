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
 * Template Name: Page Curriculum
 * @package hotelsolutions
 */
require_once ABSPATH.'wp-admin/includes/admin.php';
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

    // Do some minor form validation to make sure there is content
    if (isset($_POST['submit'])) {
            $error = "";

        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
     } else {
        $error .= "Please add a title<br />";
    }
      if (!empty($_POST['email'])) {
            $email = $_POST['email'];
     } else {
        $error .= "Please add a email<br />";
    }

        if (!empty($_POST['description'])) {
            $description = $_POST['description'];
     } else {
        $error .= "Please add a description<br />";
    }

        
        // IMAGE VALIDATION - CHECK IF THERE IS AN IMAGE AND THAT ITS THE RIGHT FILE TYPE AND RIGHT SIZE
        if ($_FILES) {
            foreach ($_FILES as $file => $array) {
                //Check if the $_FILES is set and if the size is > 0 (if =0 it's empty)

                if(isset($_FILES[$file]) && ($_FILES[$file]['size'] > 0)) {

                    /*$tmpName = $_FILES[$file]['tmp_name'];
                    list($width, $height, $type, $attr) = getimagesize($tmpName);

                    if($width!=630 || $height!=580)
                    {
                        $error .= "Image is to small<br />";
                        unlink($_FILES[$file]['tmp_name']); 
                    }*/

                // Get the type of the uploaded file. This is returned as "type/extension"
                $arr_file_type = wp_check_filetype(basename($_FILES[$file]['name']));
                $uploaded_file_type = $arr_file_type['type'];

                 // Set an array containing a list of acceptable formats
                $allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png','application/pdf');

                 // If the uploaded file is the right format
                if(in_array($uploaded_file_type, $allowed_file_types)) {

                } else { // wrong file type
                $error .= "Please upload a JPG, GIF, PNG or PDF file<br />";
                     }

                } else {
                    $error .= "Please add an file<br />";
                }
            } // end for each
        } // end if

        //$tags = $_POST['post_tags'];
        //$winerating = $_POST['winerating'];
        //Cas as array
        $terms = isset($_POST['registro_puesto']) ? (array) $_POST['registro_puesto'] : array();

        //Cast array values as integers if $_POST['category'] contains IDs
        $terms = array_map('intval',$terms);


        // ADD THE FORM INPUT TO $new_post ARRAY
        if (empty($error)) {
            $new_post = array(
            'post_title'    =>  $title,
            'post_content'  =>  $description,
            //'post_category' =>  array($_POST['cat']),  // Usable for custom taxonomies too
            'post_status'   =>  'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' =>  'registro',  //'post',page' or use a custom post type if you want to
           
        );

        //SAVE THE POST
        $pid = wp_insert_post($new_post);

         wp_set_object_terms($pid, $terms, 'puesto', false); // este por que si el usuario no esta logueado
        //KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL
        //wp_set_post_tags($pid, $_POST['post_tags']);


        //ADD OUR CUSTOM FIELDS 
        update_post_meta($pid, 'rw_email', $email);
        //add_post_meta($pid, 'rating', $winerating, true); 

            //INSERT OUR MEDIA ATTACHMENTS
      
            if ($_FILES) {
                foreach ($_FILES as $file => $array) {
                 //$newupload = insert_attachment($file,$pid);
                  // $newupload returns the attachment id of the file that
                    // was just uploaded. Do whatever you want with that now.

                        $file_return = wp_handle_upload($_FILES[$file], array('test_form' => false));


                        $filename = $file_return['file'];
                       
                        $attachment = array(
                            'post_mime_type' => $file_return['type'],
                            'post_content' => '',
                            'post_name' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                            'post_parent' => $pid,
                            'post_type' => 'attachment',
                            'post_status' => 'inherit',
                            'guid' => $file_return['url']
                        );

                        /* if($title){
                            $attachment['post_title'] = $title;
                        }*/

                        $attachment_id = wp_insert_attachment( $attachment, $filename );

                   
                        

                        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );

                        wp_update_attachment_metadata( $attachment_id, $attachment_data );

                        if( 0 < intval( $attachment_id ) ) {
                           // return $attachment_id;

                            update_post_meta($pid, 'rw_files', $attachment_id);
                        }
                    
                }

            } // END THE IF STATEMENT FOR FILES


             //REDIRECT TO THE NEW POST ON SAVE
            $link = get_permalink( $pid );
            wp_redirect( $link );

        } // END SAVING POST
    } // END VALIDATION
} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
do_action('wp_insert_post', 'wp_insert_post');


get_header(); ?>

	<section class="banner-section">
        
        
            <?php if ( has_post_thumbnail() ) :

                $id = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($id,'full', true);
                ?>
                
                 <div class="slide" style="background-image: url('<?php echo $thumb_url[0] ?>');">
                
                       
                    
                </div>
                
            
            

            <?php endif; ?>
           

    </section>


    <section class="main">
        <div class="container">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.

			?>
            
            <?php
                        if (!empty($error)) {
                            echo '<p class="error"><strong>Your message was NOT sent<br/> The following error(s) returned:</strong><br/>' . $error . '</p>';
                        } elseif (!empty($success)) {
                            echo '<p class="success">' . $success . '</p>';
                        }
                    ?>
                       

        <!-- WINE RATING FORM -->

        <div class="form">
        <form id="new_post" name="new_post" method="post" action=""  enctype="multipart/form-data">
            <!-- post name -->
            <p>
                <label for="title">Nombre:</label>
                <input type="text" id="title" value="<?php echo isset($title) ? $title : '' ?>" tabindex="5" name="title" required />
            </p>

             <!-- wine Rating -->
            <p>
                <label for="winerating">Email</label>
                <input type="text" value="<?php echo isset($email) ? $email : '' ?>" id="email" tabindex="6" name="email" required />
            </p>

            <!-- post Category -->
            <p>
                <label for="cat">Puesto:</label>
                <?php wp_dropdown_categories( 'name=registro_puesto&tab_index=10&taxonomy=puesto&hide_empty=0' ); ?>
            </p>

            <!-- post Content -->
             <p>
                <label for="description">Description and Notes:</label>
                <textarea id="description" tabindex="15" name="description" cols="80" rows="10" required><?php echo isset($description) ? $description : '' ?></textarea>
              </p>

           

            <!-- images -->
           <p>
                <label for="bottle_front">Curriculum</label>
                <input type="file" name="myFile" id="myFile" tabindex="25" required />
            </p>

           
             <p>
                <input type="submit" value="Enviar" tabindex="40" id="submit" name="submit" class="btn btn-blue" />
             </p>

            <input type="hidden" name="action" value="new_post" />
            <?php wp_nonce_field( 'new-post' ); ?>
        </form>
        </div> <!-- END WPCF7 -->

        <!-- END OF FORM -->
		</div><!-- #main -->
	</section><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
