<?php

add_filter( 'rwmb_meta_boxes', 'hotelsolutions_register_meta_boxes' );

function hotelsolutions_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'curriculum'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
             array(
                'name'  => __( 'Nombre', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_first_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Primer Apellido', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_last_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Segundo Apellido', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_last_name_2',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Teléfono', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_phone',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Email', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_email',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'País', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_country',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
               array(
                'name'  => __( 'Ciudad', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_city',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
                array(
                'name'  => __( 'Nacionalidad', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_nationality',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( 'Aspiraciones Salariales', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_salary',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( 'Aspiraciones Salariales (moneda)', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_salary_currency',
                'type'  => 'select',
                 'options' => array(
                    '₡' => 'Colones',
                    'Q' => 'Quetzal',
                    'C$' => 'Córdoba',
                    'L' => 'Lempira',
                    '฿' => 'Balboa',
                    '$' => 'Dolares',  
                   
                ),
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Estas desempleado actualmente', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_unemployed',
                'type'  => 'select',
                'std'   => '',
                'options' => array(
                    '1' => 'Si',
                    '0' => 'No',  
                ),
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Posicion en la que puede desempeñarse 1', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_job',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
                array(
                'name'  => __( 'Posicion en la que puede desempeñarse 2', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_job2',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Posicion en la que puede desempeñarse 3', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_job3',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Experiencia laboral y estudios realizados', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_work_experience',
                'type'  => 'textarea',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),

              array(
                'name'  => __( 'Archivos', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'cv_files',
                'type'  => 'file_advanced',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            
           
        )
    );
    // 2nd meta box publicidad
    $meta_boxes[] = array(
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => 'publicidad',
        'fields'     => array(
            array(
                'name' => __( 'URL', 'textdomain' ),
                'id'   => $prefix . 'url',
                'type' => 'text',
            ),
        )
    );

    // 3nd meta box eventos
    $meta_boxes[] = array(
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => 'evento',
        'fields'     => array(
             array(
                'name'  => 'Fecha',
                'desc'  => '',
                'id'    => $prefix . 'event_date',
                'type'  => 'date',
                'timestamp' =>false,
                'std'   => '',
                'class' => 'custom-class'
                
            ),
             array(
                'name'  => 'Hora inicio',
                'desc'  => '',
                'id'    => $prefix . 'event_time_ini',
                'type'  => 'time',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
              array(
                'name'  => 'Hora fin',
                'desc'  => '',
                'id'    => $prefix . 'event_time_fin',
                'type'  => 'time',
                'timestamp' =>false,
                'class' => 'custom-class'
                
            ),
        )
    );
    //ofertas
     $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'oferta'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
             array(
                'name'  => __( 'Nombre de la empresa', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_company_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Cédula Jurídica', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_company_cedula',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Teléfono de la empresa', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_company_phone',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Nombre de la persona que sube la oferta', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_first_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Primer Apellido', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_last_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Segundo Apellido', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_last_name_2',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            
             array(
                'name'  => __( 'Email', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_email',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Puesto', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_job',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
               array(
                'name'  => __( 'Vacantes Disponibles', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_vacant',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
                array(
                'name'  => __( 'Experiencia Requerida', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_experience',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Formación Requerida', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_formation',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( 'Tipo de establecimiento', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_hotel_type',
                'type'  => 'select',
                 'options' => array(
                    'c' => 'Hotel de Ciudad',
                    'p' => 'Hotel de Playa',  
                ),
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'País', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_country',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
               array(
                'name'  => __( 'Ciudad', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_city',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Salario', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_salary',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Salario(moneda)', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_salary_currency',
                'type'  => 'select',
                 'options' => array(
                    '₡' => 'Colones',
                    'Q' => 'Quetzal',
                    'C$' => 'Córdoba',
                    'L' => 'Lempira',
                    '฿' => 'Balboa',
                    '$' => 'Dolares',  
                   
                ),
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
                array(
                'name'  => __( 'Tiempo de incorporación', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_incorporation',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
           
             
              array(
                'name'  => __( 'Otros Requisitos', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_other_requirements',
                'type'  => 'textarea',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
               array(
                'name'  => 'Fecha Expiración',
                'desc'  => '',
                'id'    => $prefix . 'of_exp_date',
                'type'  => 'date',
                'timestamp' =>false,
                'std'   => '',
                'class' => 'custom-class'
                
            ),

            //   array(
            //     'name'  => __( 'Archivos', 'textdomain' ),
            //     'desc'  => '',
            //     'id'    => $prefix . 'of_files',
            //     'type'  => 'file_advanced',
            //     'std'   => '',
            //     'class' => 'custom-class',
            //     'clone' => false,
            // ),

                array(
                'name'  => __( 'Numero de referencia', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'of_reference',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            
           
        )
    );

    //aplicar ofertas(candidatos)
    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'candidato'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
             array(
                'name'  => __( 'Nombre', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_first_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Primer Apellido', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_last_name',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Segundo Apellido', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_last_name_2',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Teléfono', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_phone',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Email', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_email',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'País', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_country',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
               array(
                'name'  => __( 'Ciudad', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_city',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
                array(
                'name'  => __( 'Nacionalidad', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_nationality',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( 'Aspiraciones Salariales', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_salary',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( 'Aspiraciones Salariales (moneda)', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_salary_currency',
                'type'  => 'select',
                 'options' => array(
                    '₡' => 'Colones',
                    'Q' => 'Quetzal',
                    'C$' => 'Córdoba',
                    'L' => 'Lempira',
                    '฿' => 'Balboa',
                    '$' => 'Dolares',  
                   
                ),
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
             array(
                'name'  => __( 'Estas desempleado actualmente', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_unemployed',
                'type'  => 'select',
                'std'   => '',
                'options' => array(
                    '1' => 'Si',
                    '0' => 'No',  
                ),
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => __( 'Disponibilidad para trasladarse', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_availability_to_move',
                'type'  => 'select',
                'std'   => '',
                'options' => array(
                    '1' => 'Si',
                    '0' => 'No',  
                ),
                'class' => 'custom-class',
                'clone' => false,
            ),
             
              array(
                'name'  => __( 'Experiencia laboral y estudios realizados', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_work_experience',
                'type'  => 'textarea',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),

              array(
                'name'  => __( 'Archivos', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_files',
                'type'  => 'file_advanced',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
                array(
                'name'  => __( 'Numero de referencia Oferta', 'textdomain' ),
                'desc'  => '',
                'id'    => $prefix . 'ca_reference',
                'type'  => 'text',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            
           
        )
    );

    return $meta_boxes;
}
//cron job
if ( ! wp_next_scheduled( 'wp_hs_exp_oferta' ) ) {
  wp_schedule_event( time(), 'daily', 'delete_oferta' );
}

add_action( 'wp_hs_exp_oferta', 'wp_hs_exp_oferta_func' );

function wp_hs_exp_oferta_func() {
    $args = array(
        'post_type' => 'oferta',
        'posts_per_page' => -1
    );
    $count = 0;
    $ofertas = new WP_Query($args);
    if ($ofertas->have_posts()):
        while($ofertas->have_posts()): $ofertas->the_post();    

            $exp_date = get_post_meta( get_the_ID(), 'rw_of_exp_date', true );
            $expiration_date_time = strtotime($exp_date);

            if ($expiration_date_time < time()) {
                wp_delete_post(get_the_ID());
                $count++;
                //Use wp_delete_post(get_the_ID(),true) to delete the post from the trash too.                  
            }

        endwhile;
    endif;
   
   if($count > 0)
   {
        $subscribers = get_users( array ( 'role' => 'administrator' ) );
        $emails      = array ();
      
        foreach ( $subscribers as $subscriber )
            $emails[] = $subscriber->user_email;

        wp_mail( $emails, 'Ofertas que expiraron', 'se elimininaron '. $count.' ofertas que expiraron');
   }
}


/* Add fields to account page */
add_action('um_after_account_general', 'showExtraFields', 100);
function showExtraFields() {
  global $ultimatemember;

 if(um_user('role') == 'member')
    $names = array('last_name_2');
  else
    $names = array('cp_last_name_2');

  $disabled = [];

  $fields = get_custom_fields( $names );
  $fields = apply_filters('um_account_secure_fields', $fields, $id );

  foreach( $fields as $key => $data ){
    if (in_array($key,$disabled)) {
      $fieldOutput = $ultimatemember->fields->edit_field( $key, $data );
      $output .= str_replace('id="' . $key . '"', 'id="' . $key . '"' . 'disabled="disabled"', $fieldOutput);
    } else {
      $output .= $ultimatemember->fields->edit_field( $key, $data );
    }
  }

 
  echo $output;
}

function get_custom_fields( $fields ) {
  global $ultimatemember;
  $array=array();
  foreach ($fields as $field ) {
    if ( isset( $ultimatemember->builtin->saved_fields[$field] ) ) {
      $array[$field] = $ultimatemember->builtin->saved_fields[$field];
    } else if ( isset( $ultimatemember->builtin->predefined_fields[$field] ) ) {
      $array[$field] = $ultimatemember->builtin->predefined_fields[$field];
    }
  }
  return $array;
}
/*add_action('um_after_account_general', 'showExtraFields', 100);
function showExtraFields()
{
    $custom_fields = [
        "last_name_2" => "Segundo Apellido",
        
    ];

    foreach ($custom_fields as $key => $value) {

        $fields[ $key ] = array(
                'title' => $value,
                'metakey' => $key,
                'type' => 'text',
                'label' => $value,
        );

        apply_filters('um_account_secure_fields', $fields, 'general' );

        $field_value = get_user_meta(um_user('ID'), $key, true) ? : '';

        $html = '<div class="um-field um-field-'.$key.'" data-key="'.$key.'">
        <div class="um-field-label">
        <label for="'.$key.'">'.$value.'</label>
        <div class="um-clear"></div>
        </div>
        <div class="um-field-area">
        <input class="um-form-field valid "
        type="text" name="'.$key.'"
        id="'.$key.'" value="'.$field_value.'"
        placeholder=""
        data-validate="" data-key="'.$key.'">
        </div>
        </div>';

        echo $html;

    }
}*/
add_action( 'wp_ajax_delete_file', 'delete_file' );
function delete_file(){
 
    $permission = check_ajax_referer( 'delete_file_nonce', 'nonce', false );
    if( $permission == false ) {
        echo 'error';
    }
    else {
        //wp_delete_post( $_REQUEST['id'] );
         delete_post_meta($_REQUEST['post_id'], 'rw_cv_files', $_REQUEST['id']); 
         
        echo 'success';
    }
 
    die();
 
}

add_action( 'wp_ajax_delete_cv', 'delete_cv' );
function delete_cv(){
 
    $permission = check_ajax_referer( 'delete_cv_nonce', 'nonce', false );
    if( $permission == false ) {
        echo 'error';
    }
    else {
         wp_delete_post( $_REQUEST['id'] );
          
         
        echo 'success';
    }
 
    die();
 
}

/* add a custom tab to show user pages */
/*add_filter('um_profile_tabs', 'pages_tab', 1000 );
function pages_tab( $tabs ) {
    $tabs['pages'] = array(
        'name' => 'Pages',
        'icon' => 'um-faicon-pencil',
        'custom' => true
    );  
    return $tabs;
}*/

/* Tell the tab what to display */
/*add_action('um_profile_content_pages_default', 'um_profile_content_pages_default');
function um_profile_content_pages_default( $args ) {
    global $ultimatemember;
    $loop = $ultimatemember->query->make('post_type=page&posts_per_page=10&offset=0&author=' . um_profile_id() );
    while ($loop->have_posts()) { $loop->the_post(); $post_id = get_the_ID();
    ?>
    
        <div class="um-item">
            <div class="um-item-link"><i class="um-icon-ios-paper"></i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        </div>
        
    <?php
    }
}*/

/* add new tab called "curriculum" */
/*add_filter('um_account_page_default_tabs_hook', 'rename_tab_in_um', 100 );
function rename_tab_in_um( $tabs ) {
    //$tabs[700]['mytab']['icon'] = 'um-faicon-pencil';
    $tabs[100]['general']['title'] = 'Cuenta';
    //$tabs[800]['mytab']['custom'] = true;
    var_dump($tabs);
    return $tabs;
}*/
add_filter('um_account_page_default_tabs_hook', 'my_custom_tab_in_um', 100 );
function my_custom_tab_in_um( $tabs ) {
    $tabs[800]['curriculum']['icon'] = 'um-faicon-pencil';
    $tabs[800]['curriculum']['title'] = 'Edit Curriculum';
    $tabs[800]['curriculum']['custom'] = true;
    return $tabs;
}
    
/* make our new tab hookable */

add_action('um_account_tab__curriculum', 'um_account_tab__curriculum');
function um_account_tab__curriculum( $info ) {
    global $ultimatemember;
    extract( $info );

    $output = $ultimatemember->account->get_tab_output('curriculum');
    if ( $output ) { echo $output; }
}

/* Finally we add some content in the tab */

add_filter('um_account_content_hook_curriculum', 'um_account_content_hook_curriculum');
function um_account_content_hook_curriculum( $output ){
    ob_start();
    ?>
    
    <?php
                $user_id = get_current_user_id();
              
                $query_cv_arg = array(
                    'post_type' => 'curriculum',
                    'author' => $user_id,
                    'posts_per_page' => 1,
                   
                );
                $curriculum = get_posts( $query_cv_arg );
               
                // $edit_post = add_query_arg( 'curriculum', $curriculum[0]->ID, get_permalink( 61 + $_POST['_wp_http_referer'] ) );
                if($curriculum){
                ?>
                 <h4>Para editar tu curriculum dale click en el siguiente link:</h4>
                 <div class="account-curriculum-edit">
       
                   <a href="/actualizar-curriculum?cv=<?php echo $curriculum[0]->ID; ?>" class="btn btn-blue">Editar Curriculum</a>
                   <a href="#" data-id="<?php echo $curriculum[0]->ID; ?>" data-nonce="<?php echo wp_create_nonce('delete_cv_nonce') ?>" class="remove-cv btn btn-oscuro" title="Eliminar">Eliminar curriculum y archivos</a>

                </div>  
               
                 <?php } else {?>
                    
                    <h2>No tienes curriculum registrado todavia!!</h2>

                 <?php }?>
        
    <?php
        
    $output .= ob_get_contents();
    ob_end_clean();
    return $output;
}

add_action( 'save_post', 'send_notification_cv', 100, 3 );
function send_notification_cv( $post_id, $post, $update ) {
    if ( $post->post_status == 'publish' && $post->post_type == 'curriculum' ) {
        $subscribers = get_users( array ( 'role' => 'administrator' ) );
        $emails      = array ();
      
        foreach ( $subscribers as $subscriber )
            $emails[] = $subscriber->user_email;
       
       $body = sprintf( 'Un usuario subió un Curriculum, por favor revisar!');
       $body .= sprintf( ' Usuario: <%s>', $post->post_title);
      

        wp_mail( $emails, 'Un usuario subió un Curriculum!', $body );
        }
}

add_action( 'save_post', 'send_notification_ca', 100, 3 );
function send_notification_ca( $post_id, $post, $update ) {
    if ( $post->post_status == 'publish' && $post->post_type == 'candidato' ) {
        $subscribers = get_users( array ( 'role' => 'administrator' ) );
        $emails      = array ();
      
        foreach ( $subscribers as $subscriber )
            $emails[] = $subscriber->user_email;
       
       $body = sprintf( 'Un usuario aplicó para una oferta de trabajo, por favor revisar!');
       $body .= sprintf( ' Usuario: <%s>', $post->post_title);
      

        wp_mail( $emails, 'Alguien aplicó para una oferta de trabajo!', $body );
        }
}

add_action( 'save_post', 'auto_number', 100, 3 );
function auto_number( $post_id, $post, $update ) {
    if ( $post->post_status == 'publish' && $post->post_type == 'oferta' ) {
        $oferta_args = array(
            'numberposts'       =>   2,
            'post_type'         =>   'oferta',
            'orderby'           =>   'post_date',
            'order'             =>   'DESC'
        );
        $ofertas = get_posts( $oferta_args );
          
        // don't update existing auto-numbering
        $this_id = get_post_meta( $ofertas[0]->ID, 'rw_of_reference', true);
        if ( $this_id ) {
          return;
        }
  
        $last_id = get_post_meta( $ofertas[1]->ID, 'rw_of_reference', true);
  
        if ( !$last_id ) {
            $last_id = 0;
        }
  
        $last_id++;
        update_post_meta( $post_id, 'rw_of_reference', $last_id );
    }
}

add_action( 'restrict_manage_posts', 'hotelsolutions_admin_registros_filter_restrict_manage_posts' );
/**
 * First create the dropdown
 * make sure to change POST_TYPE to the name of your custom post type
 * 
 * @author Ohad Raz
 * 
 * @return void
 */
function hotelsolutions_admin_registros_filter_restrict_manage_posts(){
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    $taxonomy  = 'puesto'; // change to your taxonomy
    //only add filter to post type you want
    if ('registro' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
        ?>
        <!-- <select name="ADMIN_FILTER_FIELD_VALUE">
        <option value=""><?php _e('Filter By ', 'hotelsolutions'); ?></option>
        <?php
            $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v? ' selected="selected"':'',
                        $label
                    );
                }
        ?>
        <!--</select> -->
        <?php
    }
}

function hotelsolutions_search_distinct( $where ){
    global $pagenow, $wpdb;

    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='registro' && $_GET['s'] != '') {
    return "DISTINCT";

    }
    return $where;
}
add_filter( 'posts_distinct', 'hotelsolutions_search_distinct' );

add_filter('posts_join', 'hotelsolutions_search_join' );
function hotelsolutions_search_join ($join){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "registro"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='registro' && $_GET['s'] != '') {    
        $join .='LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'hotelsolutions_search_where' );
function hotelsolutions_search_where( $where ){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "registro"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='registro' && $_GET['s'] != '') {
        $where = preg_replace(
       "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
       "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}



/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'hotelsolutions_convert_id_to_term_in_query');

function hotelsolutions_convert_id_to_term_in_query($query) {
    global $pagenow;
    $post_type = 'registro'; // change to your post type
    $taxonomy  = 'puesto'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

/**
 * if submitted filter by post meta
 * 
 * make sure to change META_KEY to the actual meta key
 * and POST_TYPE to the name of your custom post type
 * @author Ohad Raz
 * @param  (wp_query object) $query
 * 
 * @return Void
 */
//add_filter( 'parse_query', 'hotelsolutions_posts_filter' );
/*function hotelsolutions_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'registro' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
        $query->query_vars['meta_key'] = 'email';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}*/


function add_custom_meta_to_user_table( $column ) {
    $column['last_name_2'] = 'Segundo Apellido';
 
    return $column;
}
 
add_filter( 'manage_users_columns', 'add_custom_meta_to_user_table' );
 
function add_custom_meta_to_user_table_row( $val, $column_name, $user_id ) {
    $user = get_userdata( $user_id );
 
    switch ($column_name) {
        case 'last_name_2' :
            return $user->last_name_2;
            break;
 
        default:
    }
 
    return $return;
}
 
add_filter( 'manage_users_custom_column', 'add_custom_meta_to_user_table_row', 10, 3 );

//Searching Meta Data in Admin
add_action('pre_user_query','yoursite_pre_user_search');
function yoursite_pre_user_search($user_search) {
    global $wpdb;
    if (!isset($_GET['s'])) return;

    //Enter Your Meta Fields To Query
    $search_array = array("last_name_2", "email", "first_name", "last_name");

    $user_search->query_from .= " INNER JOIN {$wpdb->usermeta} ON {$wpdb->users}.ID={$wpdb->usermeta}.user_id AND (";
    for($i=0;$i<count($search_array);$i++) {
        if ($i > 0) $user_search->query_from .= " OR ";
            $user_search->query_from .= "{$wpdb->usermeta}.meta_key='" . $search_array[$i] . "'";
        }
    $user_search->query_from .= ")";        
    $custom_where = $wpdb->prepare("{$wpdb->usermeta}.meta_value LIKE '%s'", "%" . $_GET['s'] . "%");
    $user_search->query_where = str_replace('WHERE 1=1 AND (', "WHERE 1=1 AND ({$custom_where} OR ",$user_search->query_where);    
}

function curriculum_post_table( $column ) {
    $column['first_name']  = 'Nombre';
    $column['last_name'] = 'Primer Apellido';
    $column['last_name_2'] = 'Segundo Apellido';
    $column['email'] = 'Correo';
 
    return $column;
}
 
add_filter( 'manage_curriculum_posts_columns', 'curriculum_post_table' );

function curriculum_post_table_row( $column_name, $post_id ) {
 
    $first_name = get_post_meta( $post_id , 'rw_cv_first_name' ); 
    $last_name = get_post_meta( $post_id , 'rw_cv_last_name' );
    $last_name_2 = get_post_meta( $post_id , 'rw_cv_last_name_2' );
    $email = get_post_meta( $post_id , 'rw_cv_email' );
  
    switch ($column_name) {
        case 'first_name' :
            echo  $first_name[0];
            break;
 
        case 'last_name' :
            echo $last_name[0];
            break;
        case 'last_name_2' :
            echo $last_name_2[0];
            break;
         case 'email' :
            echo $email[0];
            break;
 
        default:
    }
}
 
add_action( 'manage_curriculum_posts_custom_column', 'curriculum_post_table_row', 10, 2 );

//Searching Meta Data in Admin curriculum
function hotelsolutions_search_curricullum_distinct( $where ){
    global $pagenow, $wpdb;

    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='curriculum' && $_GET['s'] != '') {
    return "DISTINCT";

    }
    return $where;
}
add_filter( 'posts_distinct', 'hotelsolutions_search_curricullum_distinct' );

add_filter('posts_join', 'hotelsolutions_search_curriculum_join' );
function hotelsolutions_search_curriculum_join ($join){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "registro"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='curriculum' && $_GET['s'] != '') {    
        $join .='LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'hotelsolutions_search_curriculum_where' );
function hotelsolutions_search_curriculum_where( $where ){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "registro"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='curriculum' && $_GET['s'] != '') {
        $where = preg_replace(
       "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
       "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}