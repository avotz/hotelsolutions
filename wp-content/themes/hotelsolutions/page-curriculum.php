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
require_once(ABSPATH . "wp-content" . '/themes/hotelsolutions/countries.php');
require(ABSPATH . "wp-content" . '/themes/hotelsolutions/recaptcha/src/autoload.php');

um_fetch_user( get_current_user_id() );

$first_name = um_user('first_name');
$last_name = um_user('last_name');
$last_name_2 = um_user('last_name_2');
$phone = um_user('phone');
$email = um_user('user_email');

if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {
    $error = "";

    $query = new WP_Query( array( 'post_type' => 'curriculum', 'posts_per_page' => '-1' ) ); 
 
     if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
     
    <?php
     
       
         
       
            if(get_current_user_id() == $post->post_author)
                $error = "Ya tiene un curriculum creado con esta cuenta, Verifica?<br />";
           
          
       
    
     
    ?>
     
    <?php endwhile; endif; 
     wp_reset_query(); 

     // Do some minor form validation to make sure there is content
    if (isset($_POST['submit'])) {
            //$error = "";

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
    if (!empty($_POST['terms'])) {
            $terms = $_POST['terms'];
     } else {
        $error .= "Por favor acepta los términos y condiciones <br />";
    }
    /*if (!empty($_POST['unemployed'])) {
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

    //captcha
    $secret = '6LcuNSgUAAAAAI1dYU0fwtd1bClTFcIbBPE4Og6z';
    $gRecaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptcha = new \ReCaptcha\ReCaptcha($secret);

    $resp = $recaptcha->verify($gRecaptchaResponse);
    if ($resp->isSuccess()) {
        // verified!
        // if Domain Name Validation turned off don't forget to check hostname field
        // if($resp->getHostName() === $_SERVER['SERVER_NAME']) {  }
    } else {
       $error .= 'Verifica que eres una persona resolviendo el Captcha'; //$resp->getErrorCodes();
    }
        

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
                $allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png','application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document');

                 // If the uploaded file is the right format
                if(in_array($uploaded_file_type, $allowed_file_types)) {

                } else { // wrong file type
                $error .= "Por favor sube archivtos de tipo JPG, GIF, PNG, PDF o Word <br />";
                     }

                } else {
                    //$error .= "Please add an file<br />";
                }
            } // end for each
        } // end if

        
        //Cas as array
        //$terms = isset($_POST['registro_puesto']) ? (array) $_POST['registro_puesto'] : array();

        //Cast array values as integers if $_POST['category'] contains IDs
       // $terms = array_map('intval',$terms);


        // ADD THE FORM INPUT TO $new_post ARRAY
        //'CV-'.sanitize_title($first_name).'-'sanitize_title($last_name),
        if (empty($error)) {
            $new_post = array(
            'post_title'    =>  'CV-'.$first_name.'-'.$last_name,
            'post_content'  =>  $work_experience,
            //'post_category' =>  array($_POST['cat']),  // Usable for custom taxonomies too
            'post_status'   =>  'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' =>  'curriculum',  //'post',page' or use a custom post type if you want to
           
        );

        //SAVE THE POST
        $pid = wp_insert_post($new_post);

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

                        var_dump($attachment_id);
                        

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
            $success = "";

            if($pid > 0)
            {
                $success = "Su hoja de vida y sus datos han sido registrados con éxito, le mantendremos informado de todas las oportunidades de empleos a las que puede optar según su perfil profesional y sus aspiraciones salariales. Es importante recordarle que usted puede editar su hoja de vida e informaciones suministradas en cualquier momento que lo desee ingresando a Registra tu CV y pulsando el botón “Editar ”. Gracias por confiar en Hotel Solutions. Buena Suerte";

                $first_name = "";
                $last_name = "";
                $last_name_2 = "";
                $phone = "";
                $email = "";
                $country = "";
                $city = "";
                $nationality = "";
                $salary = "";
                $salary_currency = "₡";
                $unemployed = 1;
                $job = "";
                $job2 = "";
                $job3 = "";
                $work_experience = "";
               
            }
            //wp_redirect( '/registra-tu-cv' );

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
                            echo '<p class="error"><strong>No Enviado <br/> Revisa los siguientes errores:</strong><br/>' . $error . '</p>';
                        } elseif (!empty($success)) {
                            echo '<p class="success">' . $success . '</p>';
                        }
                    ?>
              

        <!-- WINE RATING FORM -->

        <div class="form">
        <form id="new_post" name="new_post" method="post" action=""  enctype="multipart/form-data">
            <!-- post name -->
            <div class="columns">
                <div class="column">
                     <p>
                            <label for="first_name">Nombre:</label>
                            <input type="text" id="first_name" value="<?php echo isset($first_name) ? $first_name : '' ?>"  name="first_name" required />
                        </p>
                        <p>
                            <label for="last_name">Primer Apellido:</label>
                            <input type="text" id="last_name" value="<?php echo isset($last_name) ? $last_name : '' ?>"  name="last_name" required />
                        </p>
                        <p>
                            <label for="last_name_2">Segundo Apellido:</label>
                            <input type="text" id="last_name_2" value="<?php echo isset($last_name_2) ? $last_name_2 : '' ?>"  name="last_name_2" required />
                        </p>
                        <p>
                            <label for="phone">Teléfonos:</label>
                            <input type="text" id="phone" value="<?php echo isset($phone) ? $phone : '' ?>"  name="phone" required />
                        </p>

                         <!-- wine Rating -->
                        <p>
                            <label for="email">Correo</label>
                            <input type="email" value="<?php echo isset($email) ? $email : '' ?>" id="email"  name="email" required />
                        </p>
                        <p>
                            <label for="country">País de residencia:</label>
                           
                            <select name="country" id="country" required>
                                    <?php foreach ($array_paises as $pais) {
                                        echo '<option value="'. $pais .'">'. $pais .'</option>';
                                    }
                                ?>
                               
                            </select>
                        </p>
                        <p>
                            <label for="city">Ciudad:</label>
                            <input type="text" id="city" value="<?php echo isset($city) ? $city : '' ?>"  name="city" required />
                        </p>
                          <p>
                            <label for="nationality">Nacionalidad:</label>
                           
                              <select name="nationality" id="nationality" required>
                                    <?php foreach ($array_paises as $pais) {
                                        echo '<option value="'. $pais .'">'. $pais .'</option>';
                                    }
                                ?>
                               
                            </select>
                        </p>


                </div>
                <div class="column">
                    
                  
                    <p>
                        <label for="salary">Aspiraciones Salariales:</label>
                        <input type="text" id="salary" value="<?php echo isset($salary) ? $salary : '' ?>" name="salary" required />
                        <select name="salary_currency" id="salary_currency">
                            <option value="₡">Colones</option>
                            <option value="Q">Quetzal</option>
                            <option value="C$">Córdoba</option>
                            <option value="L">Lempira</option>
                            <option value="฿">Balboa</option>
                            <option value="$">Dolares</option>
                        </select>
                        
                    </p>
                     
                     <p>
                        <label for="unemployed">Estas desempleado actualmente:</label>
                        <input type="radio" name="unemployed" value="1" checked> Si
                        <input type="radio" name="unemployed" value="0"> No<br>

                    </p>
                     <p>
                        <label for="job">Posiciones en las que puede  desempeñarse:</label>
                        <input type="text" id="job" value="<?php echo isset($job) ? $job : '' ?>"  name="job" required />
                        <input type="text" id="job2" value="<?php echo isset($job2) ? $job2 : '' ?>"  name="job2"  />
                        <input type="text" id="job3" value="<?php echo isset($job3) ? $job3 : '' ?>"  name="job3"  />
                    </p>
                    
                      <p>
                        <label for="work_experience">Comenta sobre tu experiencia laboral y estudios realizados:</label>
                        <textarea id="work_experience"  name="work_experience" cols="80" rows="10" required><?php echo isset($work_experience) ? $work_experience : '' ?></textarea>
                      </p>

                    <!-- images -->
                    <p>
                        <label for="bottle_front">Archivo 1 (JPG, GIF, PNG, PDF o Word)</label>
                        <input type="file" name="cv1" id="cv1"  required />
                    </p>
                    <p>
                        <label for="bottle_front">Archivo 2 (JPG, GIF, PNG, PDF o Word)</label>
                        <input type="file" name="cv2" id="cv2"  />
                    </p>
                    

           
                </div>
            </div>
           
            <p>
                <label for="terms">Aceptas términos y condiciones:</label>
                <input type="checkbox" name="terms" required>
               

            </p>
            <div class="g-recaptcha" data-sitekey="6LcuNSgUAAAAAFu3n1ZHTnogc4EVB_jk1w6IVo2r"></div>
             <p>
                <input type="submit" value="Enviar"  id="submit" name="submit" class="btn btn-blue" />
                <?php
                $user_id = get_current_user_id();
               
                $query_cv_arg = array(
                    'post_type' => 'curriculum',
                    //'post_author' => $user_id,
                    'author'       =>  $user_id, 
                    'posts_per_page' => 1,
                   
                );
                $curriculum = get_posts( $query_cv_arg );
              
                // $edit_post = add_query_arg( 'curriculum', $curriculum[0]->ID, get_permalink( 61 + $_POST['_wp_http_referer'] ) );
                if($curriculum){
                ?>
                <a href="/actualizar-curriculum?cv=<?php echo $curriculum[0]->ID; ?>">Editar</a>
                 <?php } ?>
             </p>

            <input type="hidden" name="action" value="new_post" />
            <?php wp_nonce_field( 'new-post' ); ?>
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
