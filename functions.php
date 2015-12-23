<?php

/** Add Custom Field in Category in Post Cateogries Page */
add_action( 'category_add_form_fields', 'add_custom_field_in_categories', 10 );
add_action( 'category_edit_form_fields', 'edit_custom_field_in_categories', 10, 2 );
 
function add_custom_field_in_categories( ) {
?>
<div class="form-field">
  <label for="example-field">Example Field</label>
  <textarea name="example-field" id="example-field" type="text" rows="5" cols="40" aria-required="true"></textarea>
  <p class="description">Write some description about your fields.</p>
</div>
<?php
}
 
function edit_custom_field_in_categories( $tag, $taxonomy ) {
 
    $option_name = 'example-field' . $tag->term_id;
    $example_field = get_option( $option_name );
 
?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="example-field">Example Field</label></th>
  <td>
    <textarea name="example-field" id="example-field" type="text" rows="5" cols="40" aria-required="true"><?php echo esc_attr( $example_field ) ? esc_attr( $example_field ) : ''; ?></textarea>
    <p class="description">Write some description about your fields.</p>
  </td>
</tr>
<?php
}
 
/** Save Custom Field Of Category Form */
add_action( 'created_category', 'save_custom_field_in_categories', 10, 2 ); 
add_action( 'edited_category', 'save_custom_field_in_categories', 10, 2 );
 
function save_custom_field_in_categories( $term_id, $tt_id ) {
 
    if ( isset( $_POST['example-field'] ) ) {           
        if(isset($_POST['tag_ID'])){
            $term_id =  $_POST['tag_ID'];
        }
        else{
            $tag_id = $term_id;
        }
		    $option_name = 'example-field' . $term_id;
        update_option( $option_name, $_REQUEST['example-field'] );
    }
}
