<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'No direct script access allowed' );
}
?>

									<ul class="unstyled">
									<li><a 
											class="sfdc-btn sfdc-btn-default"
											href="<?php echo admin_url() . '?page=zgfm_form_builder&zgfm_mod=formbuilder&zgfm_contr=records&zgfm_action=info_record&id_rec=' . $id; ?>">
											<i class="fa fa-pencil-square-o"></i> <?php echo __( 'Show', 'FRocket_admin' ); ?></a></li>
									<li><a href="javascript:void(0);" 
										   class="sfdc-btn sfdc-btn-danger uiform-confirmation-func-action"
										   data-dialog-title="<?php echo __( 'Move to trash', 'FRocket_admin' ); ?>"
										   data-dialog-callback="zgfm_back_general.listform_deleteRecordById(<?php echo $id; ?>);"
										   data-recid="<?php echo $id; ?>">
											<i class="fa fa-trash-o"></i> <?php echo __( 'Move to trash', 'FRocket_admin' ); ?></a></li>
									</ul>