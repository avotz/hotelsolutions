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
 * Template Name: Page Curriculum Edit
 * @package hotelsolutions
 */
require_once ABSPATH.'wp-admin/includes/admin.php';
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

 $query = new WP_Query( array( 'post_type' => 'curriculum', 'posts_per_page' => '-1' ) ); 
 
 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
 
<?php
 
   if ( isset( $_GET['cv'] ) ) {
     
    if ( $_GET['cv'] == $post->ID)
    {
        if(get_current_user_id() != $post->post_author)
             wp_redirect( '/registra-tu-cv' );

        $current_post = $post->ID;
        $first_name = rwmb_meta( 'rw_cv_first_name');
        $last_name = rwmb_meta( 'rw_cv_last_name');
        $last_name_2 = rwmb_meta( 'rw_cv_last_name_2');
        $phone = rwmb_meta( 'rw_cv_phone');
        $email = rwmb_meta( 'rw_cv_email');
        $country = rwmb_meta( 'rw_cv_country');
        $city = rwmb_meta( 'rw_cv_city');
        $nationality = rwmb_meta( 'rw_cv_nationality');
        $salary = rwmb_meta( 'rw_cv_salary');
        $salary_currency = rwmb_meta( 'rw_cv_salary_currency');
        $unemployed = rwmb_meta( 'rw_cv_unemployed');
        $job = rwmb_meta( 'rw_cv_job');
        $job2 = rwmb_meta( 'rw_cv_job2');
        $job3 = rwmb_meta( 'rw_cv_job3');
        $work_experience = rwmb_meta( 'rw_cv_work_experience');
        $rw_files = rwmb_meta( 'rw_cv_files');
      
    }
}
 
?>
 
<?php endwhile; endif; 
 wp_reset_query(); 



if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "update_post") {

    // Do some minor form validation to make sure there is content
    if (isset($_POST['submit'])) {
            $error = "";

        if (!empty($_POST['first_name'])) {
            $first_name = $_POST['first_name'];
     } else {
        $error .= "Por favor escribe un nombre <br />";
    }

     if (!empty($_POST['last_name'])) {
            $last_name = $_POST['last_name'];
     } else {
        $error .= "Por favor escribe el primer apellido <br />";
    }

     if (!empty($_POST['last_name_2'])) {
            $last_name_2 = $_POST['last_name_2'];
     } else {
        $error .= "Por favor escribe el segundo apellido <br />";
    }

     if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
     } else {
        $error .= "Por favor escribe un teléfono <br />";
    }

      if (!empty($_POST['email'])) {
            $email = $_POST['email'];
     } else {
        $error .= "Por favor escribe un correo<br />";
    }

     if (!empty($_POST['country'])) {
            $country = $_POST['country'];
     } else {
        $error .= "Por favor escribe un pais de residencia <br />";
    }
    if (!empty($_POST['city'])) {
            $city = $_POST['city'];
     } else {
        $error .= "Por favor escribe una ciudad <br />";
    }
    if (!empty($_POST['nationality'])) {
            $nationality = $_POST['nationality'];
     } else {
        $error .= "Por favor escribe una nacionalidad <br />";
    }
     if (!empty($_POST['salary'])) {
            $salary = $_POST['salary'];
     } else {
        $error .= "Por favor escribe en aspiraciones salariales <br />";
    }
    /* if (!empty($_POST['unemployed'])) {
            $unemployed = $_POST['unemployed'];
     } else {
        $error .= "Por favor escribe si estas desempleado <br />";
    }*/
     if (!empty($_POST['job'])) {
            $job = $_POST['job'];
     } else {
        $error .= "Por favor escribe al menos un puesto en lo que te puedas desempeñar <br />";
    }

        if (!empty($_POST['work_experience'])) {
            $work_experience = $_POST['work_experience'];
     } else {
        $error .= "Por favor escribe en experiencia laboral<br />";
    }
         $salary_currency = $_POST['salary_currency'];
         $unemployed = $_POST['unemployed'];
         $job2 = $_POST['job2'];
         $job3 = $_POST['job3'];
        // IMAGE VALIDATION - CHECK IF THERE IS AN IMAGE AND THAT ITS THE RIGHT FILE TYPE AND RIGHT SIZE
        if ($_FILES) {
           // var_dump($_FILES);
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
                   // $error .= "Please add an file<br />";
                }
            } // end for each
        } // end if

        
        //Cas as array
        //$terms = isset($_POST['registro_puesto']) ? (array) $_POST['registro_puesto'] : array();

        //Cast array values as integers if $_POST['category'] contains IDs
       // $terms = array_map('intval',$terms);


        // ADD THE FORM INPUT TO $new_post ARRAY
        //'CV-'.sanitize_title($first_name).'-'sanitize_title($last_name),
        if (empty($error) && $current_post > 0) {
            $new_post = array(
            'ID' => $current_post,
            'post_title'    =>  'CV-'.$first_name.'-'.$last_name,
            'post_content'  =>  $work_experience,
            //'post_category' =>  array($_POST['cat']),  // Usable for custom taxonomies too
            'post_status'   =>  'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' =>  'curriculum',  //'post',page' or use a custom post type if you want to
           
        );

        //SAVE THE POST
        $pid = wp_update_post($new_post);

        // wp_set_object_terms($pid, $terms, 'puesto', false); // este por que si el usuario no esta logueado
        //KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL
        //wp_set_post_tags($pid, $_POST['post_tags']);


        //ADD OUR CUSTOM FIELDS 
        update_post_meta($pid, 'rw_cv_first_name', $first_name);
        update_post_meta($pid, 'rw_cv_last_name', $last_name);
        update_post_meta($pid, 'rw_cv_last_name_2', $last_name_2);
        update_post_meta($pid, 'rw_cv_phone', $phone);
        update_post_meta($pid, 'rw_cv_email', $email);
        update_post_meta($pid, 'rw_cv_country', $country);
        update_post_meta($pid, 'rw_cv_city', $city);
        update_post_meta($pid, 'rw_cv_nationality', $nationality);
        update_post_meta($pid, 'rw_cv_salary', $salary);
        update_post_meta($pid, 'rw_cv_salary_currency', $salary_currency);
        update_post_meta($pid, 'rw_cv_unemployed', $unemployed); 
        update_post_meta($pid, 'rw_cv_job', $job);
        update_post_meta($pid, 'rw_cv_job2', $job2); 
        update_post_meta($pid, 'rw_cv_job3', $job3);
        update_post_meta($pid, 'rw_cv_work_experience', $work_experience); 
        //add_post_meta($pid, 'rating', $winerating, true); 

            //INSERT OUR MEDIA ATTACHMENTS
      
            if ($_FILES) {

                   
                foreach ($_FILES as $file => $array) {
                 //$newupload = insert_attachment($file,$pid);
                  // $newupload returns the attachment id of the file that
                    // was just uploaded. Do whatever you want with that now.
                         
                           
                       if(isset($_FILES[$file]) && ($_FILES[$file]['size'] > 0)) { //verifica que el campo file no venga vacio

                         if ( !empty( $rw_files ) ) { // borramos lo archivo anteriores si sube uno nuevo
                                foreach ( $rw_files as $rw_file ) {

                                     delete_post_meta($pid, 'rw_cv_files', $rw_file['ID']); 
                                }
                            }
                         

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

                           // update_post_meta($pid, 'rw_cv_files', $attachment_id);
                            add_post_meta($pid, 'rw_cv_files', $attachment_id);
                        }
                    }
                    
                }

            } // END THE IF STATEMENT FOR FILES


             //REDIRECT TO THE NEW POST ON SAVE
            $link = get_permalink( $pid );
            wp_redirect( '/registra-tu-cv' );

        } // END SAVING POST
    } // END VALIDATION
} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
//do_action('wp_insert_post', 'wp_insert_post');


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
        <form id="update_post" name="update_post" method="post" action=""  enctype="multipart/form-data">
            <!-- post name -->
            <div class="columns">
                <div class="column">
                     <p>
                            <label for="first_name">Nombre:</label>
                            <input type="text" id="first_name" value="<?php echo isset($first_name) ? $first_name : '' ?>" tabindex="5" name="first_name" required />
                        </p>
                        <p>
                            <label for="last_name">Primer Apellido:</label>
                            <input type="text" id="last_name" value="<?php echo isset($last_name) ? $last_name : '' ?>" tabindex="6" name="last_name" required />
                        </p>
                        <p>
                            <label for="last_name_2">Segundo Apellido:</label>
                            <input type="text" id="last_name_2" value="<?php echo isset($last_name_2) ? $last_name_2 : '' ?>" tabindex="7" name="last_name_2" required />
                        </p>
                        <p>
                            <label for="phone">Teléfonos:</label>
                            <input type="text" id="phone" value="<?php echo isset($phone) ? $phone : '' ?>" tabindex="8" name="phone" required />
                        </p>

                         <!-- wine Rating -->
                        <p>
                            <label for="email">Correo</label>
                            <input type="email" value="<?php echo isset($email) ? $email : '' ?>" id="email" tabindex="9" name="email" required />
                        </p>
                        <p>
                            <label for="country">País de residencia:</label>
                            <input type="text" id="country" value="<?php echo isset($country) ? $country : '' ?>" tabindex="10" name="country" required />
                        </p>
                        <p>
                            <label for="city">Ciudad:</label>
                            <input type="text" id="city" value="<?php echo isset($city) ? $city : '' ?>" tabindex="11" name="city" required />
                        </p>
                          <p>
                            <label for="nationality">Nacionalidad:</label>
                            <input type="text" id="nationality" value="<?php echo isset($nationality) ? $nationality : '' ?>" tabindex="12" name="nationality" required />
                        </p>

                </div>
                <div class="column">
                    
                  
                    <p>
                        <label for="salary">Aspiraciones Salariales:</label>
                        <input type="text" id="salary" value="<?php echo isset($salary) ? $salary : '' ?>" tabindex="13" name="salary" required />
                        <select name="salary_currency" id="salary_currency">
                            <option value="Colones" <?php if(isset($salary_currency) && $salary_currency == 'Colones') echo 'selected'; ?> >Colones</option>
                            <option value="Dolares" <?php if(isset($salary_currency) && $salary_currency == 'Dolares') echo 'selected'; ?>>Dolares</option>
                        </select>
                        
                    </p>
                     
                     <p>
                        <label for="unemployed">Estas desempleado actualmente:</label>
                        <input type="radio" name="unemployed" value="1" <?php if(isset($unemployed) && $unemployed == '1') echo 'checked'; ?>> Si
                        <input type="radio" name="unemployed" value="0" <?php if(isset($unemployed) && $unemployed == '0') echo 'checked'; ?>> No<br>

                    </p>
                     <p>
                        <label for="job">Posiciones en las que puede  desempeñarse:</label>
                        <input type="text" id="job" value="<?php echo isset($job) ? $job : '' ?>" tabindex="14" name="job" required />
                        <input type="text" id="job2" value="<?php echo isset($job2) ? $job2 : '' ?>" tabindex="15" name="job2"  />
                        <input type="text" id="job3" value="<?php echo isset($job3) ? $job3 : '' ?>" tabindex="16" name="job3"  />
                    </p>
                    
                      <p>
                        <label for="work_experience">Comenta sobre tu experiencia laboral y estudios realizados:</label>
                        <textarea id="work_experience" tabindex="17" name="work_experience" cols="80" rows="10" required><?php echo isset($work_experience) ? $work_experience : '' ?></textarea>
                      </p>

                     <h4> Tus archivos </h4>
                     <ul>
                         
                    
                    <?php foreach ($rw_files as $rw_file)  : ?>
                      <li> <a href="/<?php echo $rw_file['url'] ?>" target="_blank"><?php echo $rw_file['name'] ?></a></li>
                   <?php endforeach; ?>
                        </ul>
                    <!-- images -->
                    <p>
                        <label for="bottle_front">Subir Archivo 1</label>
                        <input type="file" name="cv1" id="cv1" tabindex="18"  />
                    </p>
                    <p>
                        <label for="bottle_front">Subir Archivo 2</label>
                        <input type="file" name="cv2" id="cv2" tabindex="19" />
                    </p>

           
                </div>
            </div>
           
            
             <p>
                <input type="submit" value="Actualizar" tabindex="40" id="submit" name="submit" class="btn btn-blue" />
             </p>

            <input type="hidden" name="action" value="update_post" />
            <?php wp_nonce_field( 'update-post' ); ?>
        </form>

            <!-- post Category -->
           <!--  <p>
                <label for="cat">Puesto:</label>
                <?php /*wp_dropdown_categories( 'name=registro_puesto&tab_index=10&taxonomy=puesto&hide_empty=0' );*/ ?>
            </p> -->

            <!-- post Content -->
           
           

        </div> <!-- END WPCF7 -->

        <!-- END OF FORM -->
		</div><!-- #main -->
	</section><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
