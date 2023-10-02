<?php

add_action( 'admin_menu', 'register_site_menu_page' );

function register_site_menu_page(){
	add_menu_page( 'Site Sections Details', 'AH Sections', 'manage_options', 'core-functions.php', 'site_options', '', 6 ); 
}

function site_options(){
	echo '<div class="wrap">
		<h2>Ahlehadees India Site Sections</h2>
			<div id="dashboard-widgets-wrap">
				<div id="dashboard-widgets" class="metabox-holder">
					<div id="postbox-container-1" class="postbox-container">
						<div id="normal-sortables" class="meta-box-sortables ui-sortable">
							<div id="dashboard_madrasa" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<h3 class="hndle ui-sortable-handle"><span>Madrasa</span></h3>
							<div class="inside"><div class="main">
							<ul>
								<li><a href="'.admin_url('edit.php?post_type=ah-madrasa').'">All Madrasas</a></li>
								<li><a href="'.admin_url('post-new.php?post_type=ah-madrasa').'">Add New Madrasa</a></li>
								<li><a href="'.admin_url('edit-tags.php?taxonomy=loc&post_type=ah-madrasa').'">Locations</a></li>
								<li><a href="'.admin_url('edit-tags.php?taxonomy=madrasa-language&post_type=ah-madrasa').'">Madrasa Languages</a></li>
								<li><a href="'.admin_url('edit-tags.php?taxonomy=madrasa-education&post_type=ah-madrasa').'">Education Types</a></li>
							</ul>
							<h4 class="hndle ui-sortable-handle"><span>Status</span></h4>
							<ul class="subsubsub">
								<li>'.get_published_post_counts('ah-madrasa').'</li>
								<li>'.get_draft_post_counts('ah-madrasa').'</li>
							</ul>
							<div class="clear"></div>
							</div></div>
						</div>
						
						<div id="dashboard_alim_hafiz" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<h3 class="hndle ui-sortable-handle"><span>Alim/Hafiz</span></h3>
							<div class="inside"><div class="main">
							</div></div>
						</div>
						
						<div id="dashboard_darul" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<h3 class="hndle ui-sortable-handle"><span>Darul Masjid and Madaris</span></h3>
							<div class="inside"><div class="main">
							</div></div>
						</div>
						
						
					</div>
				</div>
				
				<div id="postbox-container-2" class="postbox-container">
					<div id="side-sortables" class="meta-box-sortables ui-sortable">
						<div id="dashboard_masjid" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<h3 class="hndle ui-sortable-handle"><span>Masjid</span></h3>
							<div class="inside"><div class="main">
							</div></div>
						</div>
						
						<div id="dashboard_qhadees" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<h3 class="hndle ui-sortable-handle"><span>Quran and Hadees</span></h3>
							<div class="inside"><div class="main">
							</div></div>
						</div>
						
						<div id="dashboard_jamiyat" class="postbox">
							<div class="handlediv" title="Click to toggle"><br></div>
							<h3 class="hndle ui-sortable-handle"><span>Jamiyat</span></h3>
							<div class="inside"><div class="main">
							</div></div>
						</div>
						
					</div>
				</div>
				<div id="postbox-container-3" class="postbox-container">
				</div>
			</div>
		</div>
	</div>';
}
