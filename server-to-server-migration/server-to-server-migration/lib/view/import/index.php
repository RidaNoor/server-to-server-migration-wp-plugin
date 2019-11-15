<?php
/**
 * Copyright (C) 2014-2017 Migzara
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */
?>

<div class="s2sm
-container">
	<div class="s2sm
-row">
		<div class="s2sm
-left">
			<div class="s2sm
-holder">
				<h1><i class="s2sm
-icon-publish"></i> <?php _e( 'Import Site', S2SM
_PLUGIN_NAME ); ?></h1>

				<?php include S2SM
_TEMPLATES_PATH . '/common/report-problem.php'; ?>
				<form id="ridanoor-url-import">
<section>
<div class="s2sm
-field">
			<input placeholder="Enter .wpress file url..." type="url" id="ridanoor-url-import-field" class="s2sm
-report-email" required="required">
		</div>
		<div class="s2sm
-buttons">
				<button type="submit" id="ridanoor-url-import-submit" class="s2sm
-button-blue">
					Proceede			</button>
				<a href="#" id="s2sm
-report-cancel" class="s2sm
-report-cancel"  onclick="hideOverlay();">Cancel</a>
			</div>
		</section>
		

					<input type="hidden" name="s2sm
_manual_import" value="1" />

</form>

				<form action="" method="post" id="s2sm
-import-form" class="s2sm
-clear" enctype="multipart/form-data">

					<p>
						<?php _e( 'Use the box below to upload a wpress file.', S2SM
_PLUGIN_NAME ); ?><br />
					</p>

					<?php include S2SM
_TEMPLATES_PATH . '/import/import-buttons.php'; ?>

					<?php do_action( 's2sm
_import_left_end' ); ?>

					<input type="hidden" name="s2sm
_manual_import" value="1" />

				</form>
			</div>
		</div>
		<div class="s2sm
-right">
			<div class="s2sm
-sidebar">
				<div class="s2sm
-segment">
					<?php if ( ! S2SM
_DEBUG ) : ?>
						<?php include S2SM
_TEMPLATES_PATH . '/common/share-buttons.php'; ?>
					<?php endif; ?>

					<h2><?php _e( 'Leave Feedback', S2SM
_PLUGIN_NAME ); ?></h2>

					<?php include S2SM
_TEMPLATES_PATH . '/common/leave-feedback.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="display:none;" id="ridanoor-overlay-url">

<div class="s2sm
-overlay"></div>
<div class="s2sm
-modal-container"></div>
<div class="s2sm
-overlay" style="display: block;"></div>
<div class="s2sm
-modal-container" style="display: block;"><div>

</div>
</div>
</div>
<script>
	function hideOverlay(){
	document.getElementById('ridanoor-overlay-url').style.display = "none";
	}
	
	function showOverlay(){
	document.getElementById('ridanoor-overlay-url').style.display = "block";
	}
	
	
	
	function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}


	$(document).ready(function() {
	
	$('#ridanoor-url-import').submit(function(event) {
	
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
	
	var params= {
            'priority'              : 7,
            'secret_key'             :s2sm
_import.secret_key ,
            'archive'    : makeid()
        };
        
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : s2sm
_import.ajax.url, // the url where we want to POST
            data        : params, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });
	});

	});
	
</script>