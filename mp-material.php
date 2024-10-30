<?php
/**
* Plugin Name: MethodPress Material
* Description: Include the Materialize CSS library into your WordPress site so that you can add Material Design features in child themes or code that you include in WordPress pages or posts via other methods. 
* Version: 1.01
* Author: MethodPress
* Author URI: https://www.methodpress.com
* License: GPL2 / The Materialize CSS library is licensed unde the MIT License.
*/ 
function enqueue_mpmat_frontend(){
	if(wp_script_is('mp_material')){
		// do nothing
		echo "<script>console.log('MP Material already loaded');</script>";
	} else {
		// JS
		wp_register_script ( 'mp_material', plugins_url ( 'assets/js/materialize.js', __FILE__ ) );
		wp_enqueue_script('mp_material');
		// CSS
		wp_register_style ( 'mp_css_material', plugins_url ( 'assets/css/materialize.css', __FILE__ ) );
		wp_enqueue_style('mp_css_material');
		wp_register_style ( 'mp_css_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
		wp_enqueue_style('mp_css_material_icons');
	}
}

function enqueue_mpmat_backend(){
	if(wp_script_is('mp_material')){
		// do nothing
		echo "<script>console.log('MP Material already loaded');</script>";
	} else {
		// JS
		wp_register_script ( 'mp_material', plugins_url ( 'assets/js/materialize.js', __FILE__ ) );
		wp_enqueue_script('mp_material');
		// CSS
		wp_register_style ( 'mp_css_material', plugins_url ( 'assets/css/materialize.css', __FILE__ ) );
		wp_enqueue_style('mp_css_material');
		wp_register_style ( 'mp_css_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
		wp_enqueue_style('mp_css_material_icons');
	}
	// CSS
	wp_register_style ( 'mpmat_css_style', plugins_url ( 'assets/css/style.css', __FILE__ ) );
	wp_enqueue_style('mpmat_css_style');
}

// Enqueue JS and CSS scripts for frontend
add_action( 'wp_enqueue_scripts', 'enqueue_mpmat_frontend');
// Enqueue JS and CSS scripts for backend
add_action( 'admin_enqueue_scripts', 'enqueue_mpmat_backend');

// Build Admin Menu 
function mpmat_plugin_top_menu()
{
	$GLOBALS['mpmat_main_page'] = add_menu_page('MethodPress Material', 'MP Material', 'administrator', __FILE__, 'mpmat_main_page', 'dashicons-layout', '90');
}

// Call Admin Menu script when Admin Menu loads
add_action('admin_menu','mpmat_plugin_top_menu');

// Builds the main plugin settings page - In furture versions, this will have more options
function mpmat_main_page()
{
	// define variables for assets folders
	$assets_img = plugin_dir_url(__FILE__)."assets/img/";
	?>
	<div class="wrap">
	<div class="mpmat-section-header">
					<div id="mpmat-logo" style="float:right;">
						<a href="https://www.methodpress.com/" target="_blank"><img src="<?php echo $assets_img; ?>mp-material-logo-50h-trans.png" /></a>
					</div>
					<h1 class="section-title"><span class="fa fa-cog fa-blue" id="min-fa-space"></span>MethodPress Material</h1>
				</div>

				<div class="mpmat-section-body">
					<div class='container' style="width:100%; box-sizing:border-box; margin:15px !important;">
						<div class="row">
							<div class="col s12">
								<div class="card blue-grey darken-1">
									<div class="card-content white-text">
									  <span class="card-title">Materialize CSS Library is Active on your Blog</span>
									  The Materialize CSS library has been included in your blog frontend and admin dashboard.<br /><br />
									  This means that you can now include any of the following components in a child theme, in theme overrides or in code that you include via header/footer code inclusion plugins.<br /><br />
									  This version of the MethodPress Material plugin does not provide the ability to add these components from within the plugin or admin dashboard.<br /><br />
									  By the way, this text is sitting inside a 'card'. Below, you will see 'collapsibles' which have headers using 'color' controls - all possible with ease thanks to the Materialize CSS library.<br /><br />
									  Visit the Materialize CSS website to read documentation on how to add included effects.
									</div>
									<div class="card-action">
									  <a href="https://methodpress.com">Visit MethodPress</a>
									  <a href="https://materializecss.com/">Visit Materialize CSS</a>
									</div>
								  </div>
							</div>
						</div>
						<div class="row">
							<div class="col s6"><h2>CSS</h2>
								<ul class="collapsible">
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">color_lens</i>Color</div>
										<div class="collapsible-body">Material CSS has a color palette based on material design base colours. Each of these colors is defined with a base color class and an optional lighten or darken class - offering more than 244 colors.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">grid_on</i>Grid</div>
										<div class="collapsible-body">Materialize CSS uses a standard 12 column fluid responsive grid system. The grid helps you layout your page in an ordered, easy fashion.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">help_outline</i>Helpers</div>
										<div class="collapsible-body">Helpers are a collection of classes for quickly and simply formatting, aligning, floating, showing and hiding.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">video_library</i>Media</div>
										<div class="collapsible-body">Classes to help with formatting and layout of responsive images, videos and embeds.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">graphic_eq</i>Pulse</div>
										<div class="collapsible-body">Draw attention to your buttons with this subtle but captivating effect. Just add the class pulse to your button.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">code</i>Sass</div>
										<div class="collapsible-body">Sass features for variables and media queries.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">layers</i>Shadow</div>
										<div class="collapsible-body">In material design, everything should have a certain z-depth that determines how far raised or close to the page the element is.

You can easily apply this shadow effect by adding a class="z-depth-2" to an HTML tag. Alternatively you can extend any of these shadows with Sass using @extend .z-depth-2. A z-depth-0 can be used to remove shadows from elements that have z-depths by default.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">border_all</i>Table</div>
										<div class="collapsible-body">Tables are a nice way to organize a lot of data. We provide a few utility classes to help you style your table as easily as possible. In addition, to improve mobile experience, all tables on mobile-screen widths are centered automatically.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">forward</i>Transitions</div>
										<div class="collapsible-body">We've made some custom animation classes that will transition your content with only CSS. Each CSS transition consists of a base class that applies the necessary styles and additional classes that control the state of the transition.</div>
									</li>
									<li>
										<div class="collapsible-header blue lighten-5"><i class="material-icons">font_download</i>Typography</div>
										<div class="collapsible-body">Typography controls for headers, blockquotes and responsive text.</div>
									</li>
								</ul>
							</div>
							<div class="col s6"><h2>Components</h2>
								<ul class="collapsible">
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">note</i>Badges</div>
									  <div class="collapsible-body">Badges can notify you that there are new or unread messages or notifications. Add the 'new' class to the badge to give it the background.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">wb_iridescent</i>Buttons</div>
									  <div class="collapsible-body">There are 3 main button types described in material design. The raised button is a standard button that signify actions and seek to give depth to a mostly flat page. The floating circular action button is meant for very important functions. Flat buttons are usually used within elements that already have depth like cards or modals.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">linear_scale</i>Breadcrumbs</div>
									  <div class="collapsible-body">Breadcrumbs are a good way to display your current location. This is usually used when you have multiple layers of content.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">call_to_action</i>Cards</div>
									  <div class="collapsible-body">Cards are a convenient means of displaying content composed of different types of objects. They’re also well-suited for presenting similar objects whose size or supported actions can vary considerably, like photos with captions of variable length.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">list</i>Collections</div>
									  <div class="collapsible-body">Collections allow you to group list objects together.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">more</i>Floating Action Buttons</div>
									  <div class="collapsible-body">If you want a fixed floating action button, you can add multiple actions that will appear on hover.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">border_bottom</i>Footer</div>
									  <div class="collapsible-body">Footers are a great way to organize a lot of site navigation and information at the end of a page. This is where the user will look once they have finished scrolling through the current page or are looking for additional information about your website.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">favorite</i>Icons</div>
									  <div class="collapsible-body">We have included 932 Material Design Icons courtesy of Google.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">more_horiz</i>Navbar</div>
									  <div class="collapsible-body">The navbar is fully contained by an HTML5 Nav tag. Inside a recommended container div, there are 2 main parts of the navbar. A logo or brand link, and the navigations links. You can align these links to the left or right.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">last_page</i>Pagination</div>
									  <div class="collapsible-body">Add pagination links to help split up your long content into shorter, easier to understand blocks.</div>
									</li>
									<li>
									  <div class="collapsible-header green lighten-5"><i class="material-icons">schedule</i>Preloader</div>
									  <div class="collapsible-body">If you have content that will take a long time to load, you should give the user feedback. For this reason we provide a number activity + progress indicators.</div>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="row">
							<div class="col s6"><h2>JavaScript</h2>
								<ul class="collapsible">
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">play_arrow</i>Auto Init</div>
									  <div class="collapsible-body">Auto Init allows you to initialize all of the Materialize Components with a single function call. It is important to note that you cannot pass in options using this method.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">burst_mode</i>Carousel</div>
									  <div class="collapsible-body">Our Carousel is a robust and versatile component that can be an image slider, to an item carousel, to an onboarding experience. It is touch enabled making it especially smooth to use on mobile.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">view_day</i>Collapsible</div>
									  <div class="collapsible-body">Collapsibles are accordion elements that expand when clicked on. They allow you to hide content that is not immediately relevant to the user.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">format_line_spacing</i>Drodown</div>
									  <div class="collapsible-body">Add a dropdown list to any button. Make sure that the data-target attribute matches the id in the <ul> tag. You can add a divider with the <li class="divider"></li> tag. You can also add icons. Just add the icon inside the anchor tag.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">highlight</i>FeatureDiscovery</div>
									  <div class="collapsible-body">Provide value and encourage return visits by introducing users to new features and functionality at contextually relevant moments.

Feature discovery prompts have more impact when they are presented to the right users at contextually relevant moments. </div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">video_library</i>Media</div>
									  <div class="collapsible-body">Media components include things that have to do with large media objects like Images, Video, Audio, etc.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">picture_in_picture</i>Modals</div>
									  <div class="collapsible-body">Use a modal for dialog boxes, confirmation messages, or other content that can be called up. In order for the modal to work you have to add the Modal ID to the link of the trigger. To add a close button, just add the class .modal-close to your button.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">wallpaper</i>Parallax</div>
									  <div class="collapsible-body">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling. Check out the demo to get a better idea of it.<a href="https://materializecss.com/parallax-demo.html" target="_blank" class="btn-large waves-effect waves-light">Open Demo</a></div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">line_weight</i>Pushpin</div>
									  <div class="collapsible-body">Pushpin is our fixed positioning plugin. Use this to pin elements to your page during specific scroll ranges.<a href="https://materializecss.com/pushpin-demo.html" target="_blank" class="btn-large waves-effect waves-light">Open Demo</a></div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">visibility</i>Scrollspy</div>
									  <div class="collapsible-body">Scrollspy is a jQuery plugin that tracks certain elements and which element the user's screen is currently centered on.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">input</i>Sidenav</div>
									  <div class="collapsible-body">This is a slide out menu. You can add a dropdown to your sidebar by using our collapsible component.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">tab</i>Tabs</div>
									  <div class="collapsible-body">The tabs structure consists of an unordered list of tabs that have hashes corresponding to tab ids. Then when you click on each tab, only the container with the corresponding tab id will become visible. You can add the class .disabled to make a tab inaccessible.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">view_stream</i>Toasts</div>
									  <div class="collapsible-body">Materialize provides an easy way for you to send unobtrusive alerts to your users through toasts. These toasts are also placed and sized responsively.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">announcement</i>Tooltips</div>
									  <div class="collapsible-body">Tooltips are small, interactive, textual hints for mainly graphical elements. When using icons for actions you can use a tooltip to give people clarification on its function.</div>
									</li>
									<li>
									  <div class="collapsible-header purple lighten-5"><i class="material-icons">all_out</i>Waves</div>
									  <div class="collapsible-body">Waves is an external library that we've included in Materialize to allow us to create the ink effect outlined in Material Design.</div>
									</li>
								</ul>
							</div>
							<div class="col s6"><h2>Forms</h2>
								<ul class="collapsible">
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">keyboard</i>Autocomplete</div>
									  <div class="collapsible-body">Add an autocomplete dropdown below your input to suggest possible values in your form. You can populate the list of autocomplete options dynamically as well.</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">settings_ethernet</i>Checkboxes</div>
									  <div class="collapsible-body">Use checkboxes when looking for yes or no answers. The for attribute is necessary to bind our custom checkbox with the input. Add the input's id as the value of the for attribute of the label.</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">label</i>Chips</div>
									  <div class="collapsible-body">Chips can be used to represent small blocks of information. They are most commonly used either for contacts or for tags.</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">event</i>Pickers</div>
									  <div class="collapsible-body">The datepicker allows users to select a date from an interactive calendar. The timepicker allows users to select a date from an interactive clock. </div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">radio_button_checked</i>Radio Buttons</div>
									  <div class="collapsible-body">Radio Buttons are used when the user must make only one selection out of a group of items. The for attribute is necessary to bind our custom radio button with the input. Add the input's id as the value of the for attribute of the label.</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">swap_horiz</i>Range</div>
									  <div class="collapsible-body">Add HTML5 range sliders.</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">playlist_add_check</i>Select</div>
									  <div class="collapsible-body">Select allows user input through specified options. Make sure you wrap it in a .input-field for proper alignment with other text fields. Remember that this is a jQuery plugin so make sure you initialize this in your document ready.</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">call_split</i>Switches</div>
									  <div class="collapsible-body">Switches are special checkboxes used for binary states such as on / off</div>
									</li>
									<li>
									  <div class="collapsible-header orange lighten-4"><i class="material-icons">text_fields</i>Text Inputs</div>
									  <div class="collapsible-body">Forms are the standard way to receive user inputted data. The transitions and smoothness of these elements are very important because of the inherent user interaction associated with forms. We include text inputs, test areas and file input fields.</div>
									</li>
								</ul>	
							</div>
							<div class="col s6"><h2>Mobile</h2>
								<ul class="collapsible">
									<li>
									  <div class="collapsible-header brown lighten-5"><i class="material-icons">more_horiz</i>Navbar</div>
									  <div class="collapsible-body">The navbar is fully contained by an HTML5 Nav tag. Inside a recommended container div, there are 2 main parts of the navbar. A logo or brand link, and the navigations links. You can align these links to the left or right.</div>
									</li>
									<li>
									  <div class="collapsible-header brown lighten-5"><i class="material-icons">view_stream</i>Toasts</div>
									  <div class="collapsible-body">Swipe to dismiss toasts.</div>
									</li>
								</ul>
								
								
							</div>
							
						</div>
					</div>
				</div>
	
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.collapsible').collapsible();
	});
	</script>
	
	<?php
}
?>
