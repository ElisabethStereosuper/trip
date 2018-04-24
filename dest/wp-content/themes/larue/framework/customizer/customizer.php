<?php 
/* customizer */
$url = trailingslashit( get_template_directory_uri() ). 'framework/customizer/googlefonts/fonts.json';
$tmpresult = wp_remote_get($url);
$result = wp_remote_retrieve_body( $tmpresult );
$result = json_decode($result, TRUE);
$google_fonts = array();
if(is_array($result)){
	foreach ( $result['items'] as $font ) {
	    $google_fonts[] = $font['family'];          
	}
}
$google_fonts = array_filter($google_fonts);
if(empty($google_fonts)){
	$google_fonts = array('ABeeZee','Abel','Abril Fatface','Aclonica','Acme','Actor','Adamina','Advent Pro','Aguafina Script','Akronim','Aladin','Aldrich','Alef','Alegreya','Alegreya SC','Alegreya Sans','Alegreya Sans SC','Alex Brush','Alfa Slab One','Alice','Alike','Alike Angular','Allan','Allerta','Allerta Stencil','Allura','Almendra','Almendra Display','Almendra SC','Amarante','Amaranth','Amatic SC','Amethysta','Anaheim','Andada','Andika','Angkor','Annie Use Your Telescope','Anonymous Pro','Antic','Antic Didone','Antic Slab','Anton','Arapey','Arbutus','Arbutus Slab','Architects Daughter','Archivo Black','Archivo Narrow','Arimo','Arizonia','Armata','Artifika','Arvo','Asap','Asset','Astloch','Asul','Atomic Age','Aubrey','Audiowide','Autour One','Average','Average Sans','Averia Gruesa Libre','Averia Libre','Averia Sans Libre','Averia Serif Libre','Bad Script','Balthazar','Bangers','Basic','Battambang','Baumans','Bayon','Belgrano','Belleza','BenchNine','Bentham','Berkshire Swash','Bevan','Bigelow Rules','Bigshot One','Bilbo','Bilbo Swash Caps','Bitter','Black Ops One','Bokor','Bonbon','Boogaloo','Bowlby One','Bowlby One SC','Brawler','Bree Serif','Bubblegum Sans','Bubbler One','Buda','Buenard','Butcherman','Butterfly Kids','Cabin','Cabin Condensed','Cabin Sketch','Caesar Dressing','Cagliostro','Calligraffitti','Cambo','Candal','Cantarell','Cantata One','Cantora One','Capriola','Cardo','Carme','Carrois Gothic','Carrois Gothic SC','Carter One','Caudex','Cedarville Cursive','Ceviche One','Changa One','Chango','Chau Philomene One','Chela One','Chelsea Market','Chenla','Cherry Cream Soda','Cherry Swash','Chewy','Chicle','Chivo','Cinzel','Cinzel Decorative','Clicker Script','Coda','Coda Caption','Codystar','Combo','Comfortaa','Coming Soon','Concert One','Condiment','Content','Contrail One','Convergence','Cookie','Copse','Corben','Courgette','Cousine','Coustard','Covered By Your Grace','Crafty Girls','Creepster','Crete Round','Crimson Text','Croissant One','Crushed','Cuprum','Cutive','Cutive Mono','Damion','Dancing Script','Dangrek','Dawning of a New Day','Days One','Delius','Delius Swash Caps','Delius Unicase','Della Respira','Denk One','Devonshire','Didact Gothic','Diplomata','Diplomata SC','Domine','Donegal One','Doppio One','Dorsa','Dosis','Dr Sugiyama','Droid Sans','Droid Sans Mono','Droid Serif','Duru Sans','Dynalight','EB Garamond','Eagle Lake','Eater','Economica','Ek Mukta','Electrolize','Elsie','Elsie Swash Caps','Emblema One','Emilys Candy','Engagement','Englebert','Enriqueta','Erica One','Esteban','Euphoria Script','Ewert','Exo','Exo 2','Expletus Sans','Fanwood Text','Fascinate','Fascinate Inline','Faster One','Fasthand','Fauna One','Federant','Federo','Felipa','Fenix','Finger Paint','Fira Mono','Fira Sans','Fjalla One','Fjord One','Flamenco','Flavors','Fondamento','Fontdiner Swanky','Forum','Francois One','Freckle Face','Fredericka the Great','Fredoka One','Freehand','Fresca','Frijole','Fruktur','Fugaz One','GFS Didot','GFS Neohellenic','Gabriela','Gafata','Galdeano','Galindo','Gentium Basic','Gentium Book Basic','Geo','Geostar','Geostar Fill','Germania One','Gilda Display','Give You Glory','Glass Antiqua','Glegoo','Gloria Hallelujah','Goblin One','Gochi Hand','Gorditas','Goudy Bookletter 1911','Graduate','Grand Hotel','Gravitas One','Great Vibes','Griffy','Gruppo','Gudea','Habibi','Hammersmith One','Hanalei','Hanalei Fill','Handlee','Hanuman','Happy Monkey','Headland One','Henny Penny','Herr Von Muellerhoff','Holtwood One SC','Homemade Apple','Homenaje','IM Fell DW Pica','IM Fell DW Pica SC','IM Fell Double Pica','IM Fell Double Pica SC','IM Fell English','IM Fell English SC','IM Fell French Canon','IM Fell French Canon SC','IM Fell Great Primer','IM Fell Great Primer SC','Iceberg','Iceland','Imprima','Inconsolata','Inder','Indie Flower','Inika','Irish Grover','Istok Web','Italiana','Italianno','Jacques Francois','Jacques Francois Shadow','Jim Nightshade','Jockey One','Jolly Lodger','Josefin Sans','Josefin Slab','Joti One','Judson','Julee','Julius Sans One','Junge','Jura','Just Another Hand','Just Me Again Down Here','Kameron','Kantumruy','Karla','Kaushan Script','Kavoon','Kdam Thmor','Keania One','Kelly Slab','Kenia','Khmer','Kite One','Knewave','Kotta One','Koulen','Kranky','Kreon','Kristi','Krona One','La Belle Aurore','Lancelot','Lato','League Script','Leckerli One','Ledger','Lekton','Lemon','Libre Baskerville','Life Savers','Lilita One','Lily Script One','Limelight','Linden Hill','Lobster','Lobster Two','Londrina Outline','Londrina Shadow','Londrina Sketch','Londrina Solid','Lora','Love Ya Like A Sister','Loved by the King','Lovers Quarrel','Luckiest Guy','Lusitana','Lustria','Macondo','Macondo Swash Caps','Magra','Maiden Orange','Mako','Marcellus','Marcellus SC','Marck Script','Margarine','Marko One','Marmelad','Marvel','Mate','Mate SC','Maven Pro','McLaren','Meddon','MedievalSharp','Medula One','Megrim','Meie Script','Merienda','Merienda One','Merriweather','Merriweather Sans','Metal','Metal Mania','Metamorphous','Metrophobic','Michroma','Milonga','Miltonian','Miltonian Tattoo','Miniver','Miss Fajardose','Modern Antiqua','Molengo','Molle','Monda','Monofett','Monoton','Monsieur La Doulaise','Montaga','Montez','Montserrat','Montserrat Alternates','Montserrat Subrayada','Moul','Moulpali','Mountains of Christmas','Mouse Memoirs','Mr Bedfort','Mr Dafoe','Mr De Haviland','Mrs Saint Delafield','Mrs Sheppards','Muli','Mystery Quest','Neucha','Neuton','New Rocker','News Cycle','Niconne','Nixie One','Nobile','Nokora','Norican','Nosifer','Nothing You Could Do','Noticia Text','Noto Sans','Noto Serif','Nova Cut','Nova Flat','Nova Mono','Nova Oval','Nova Round','Nova Script','Nova Slim','Nova Square','Numans','Nunito','Odor Mean Chey','Offside','Old Standard TT','Oldenburg','Oleo Script','Oleo Script Swash Caps','Open Sans','Open Sans Condensed','Oranienbaum','Orbitron','Oregano','Orienta','Original Surfer','Oswald','Over the Rainbow','Overlock','Overlock SC','Ovo','Oxygen','Oxygen Mono','PT Mono','PT Sans','PT Sans Caption','PT Sans Narrow','PT Serif','PT Serif Caption','Pacifico','Paprika','Parisienne','Passero One','Passion One','Pathway Gothic One','Patrick Hand','Patrick Hand SC','Patua One','Paytone One','Peralta','Permanent Marker','Petit Formal Script','Petrona','Philosopher','Piedra','Pinyon Script','Pirata One','Plaster','Play','Playball','Playfair Display','Playfair Display SC','Podkova','Poiret One','Poller One','Poly','Pompiere','Pontano Sans','Port Lligat Sans','Port Lligat Slab','Prata','Preahvihear','Press Start 2P','Princess Sofia','Prociono','Prosto One','Puritan','Purple Purse','Quando','Quantico','Quattrocento','Quattrocento Sans','Questrial','Quicksand','Quintessential','Qwigley','Racing Sans One','Radley','Raleway','Raleway Dots','Rambla','Rammetto One','Ranchers','Rancho','Rationale','Redressed','Reenie Beanie','Revalia','Ribeye','Ribeye Marrow','Righteous','Risque','Roboto','Roboto Condensed','Roboto Slab','Rochester','Rock Salt','Rokkitt','Romanesco','Ropa Sans','Rosario','Rosarivo','Rouge Script','Rubik Mono One','Rubik One','Ruda','Rufina','Ruge Boogie','Ruluko','Rum Raisin','Ruslan Display','Russo One','Ruthie','Rye','Sacramento','Sail','Salsa','Sanchez','Sancreek','Sansita One','Sarina','Satisfy','Scada','Schoolbell','Seaweed Script','Sevillana','Seymour One','Shadows Into Light','Shadows Into Light Two','Shanti','Share','Share Tech','Share Tech Mono','Shojumaru','Short Stack','Siemreap','Sigmar One','Signika','Signika Negative','Simonetta','Sintony','Sirin Stencil','Six Caps','Skranji','Slackey','Smokum','Smythe','Sniglet','Snippet','Snowburst One','Sofadi One','Sofia','Sonsie One','Sorts Mill Goudy','Source Code Pro','Source Sans Pro','Source Serif Pro','Special Elite','Spicy Rice','Spinnaker','Spirax','Squada One','Stalemate','Stalinist One','Stardos Stencil','Stint Ultra Condensed','Stint Ultra Expanded','Stoke','Strait','Sue Ellen Francisco','Sunshiney','Supermercado One','Suwannaphum','Swanky and Moo Moo','Syncopate','Tangerine','Taprom','Tauri','Telex','Tenor Sans','Text Me One','The Girl Next Door','Tienne','Tinos','Titan One','Titillium Web','Trade Winds','Trocchi','Trochut','Trykker','Tulpen One','Ubuntu','Ubuntu Condensed','Ubuntu Mono','Ultra','Uncial Antiqua','Underdog','Unica One','UnifrakturCook','UnifrakturMaguntia','Unkempt','Unlock','Unna','VT323','Vampiro One','Varela','Varela Round','Vast Shadow','Vibur','Vidaloka','Viga','Voces','Volkhov','Vollkorn','Voltaire','Waiting for the Sunrise','Wallpoet','Walter Turncoat','Warnes','Wellfleet','Wendy One','Wire One','Yanone Kaffeesatz','Yellowtail','Yeseva One','Yesteryear','Zeyada');
}
function larue_register_theme_customizer( $wp_customize ) {

	/**
	* Custom Customizer Control: Sortable Checkboxes
	* @link https://shellcreeper.com/?p=1503
	*/
	class Asw_Control_Image_Select extends WP_Customize_Control {
	 
	    public function enqueue(){
	        wp_enqueue_style( 'css-for-customize' );
	        wp_enqueue_script( 'js-for-customize' );
	        
	    }

	    public function render_content(){

	        if ( empty( $this->choices ) ){ return; }
	 
	        if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			<?php endif;

	        $html = array();
			$tpl  = '<label class="asw-image-select"><img src="%s"><input type="%s" class="hidden" name="%s" value="%s" %s%s></label>';
			$field = $this->input_attrs;
			foreach ( $this->choices as $value => $image )
			{
				$html[] = sprintf(
					$tpl,
					$image,
					$field['multiple'] ? 'checkbox' : 'radio',
					$this->id,
					esc_attr( $value ),
					$this->get_link(),
					checked( $this->value(), $value, false )
				);
			}
			echo implode(' ', $html); 
	    }
	}

	$wp_customize->add_panel( 'asw_theme_options', array(
	    'priority' => 1,
	    'title' => __( 'Theme Options', 'larue' ),
	    'description' => __( 'Options for theme customizing', 'larue' ),
	) );
	
	$wp_customize->add_section(
	    'asw_general_options',
	    array(
	        'title'     => __('General', 'larue'),
	        'priority'  => 1,
	        'panel' => 'asw_theme_options'
	    )
	);
	$wp_customize->add_setting(
	    'asw_page_loading',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_page_loading',
	    array(
	        'section'   => 'asw_general_options',
	        'label'     => __('Page loading animation','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_progress_indicator',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_setting(
	    'asw_home_slider',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_home_slider',
	    array(
	        'section'   => 'asw_general_options',
	        'label'     => __('Home page slider','larue'),
	        'description' => __('Check to enable home page slider.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_home_slides_count',
	    array(
	        'default'    =>  '3',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_home_slides_count',
	    array(
	        'section'   => 'asw_general_options',
	        'label'     => __('Home page slider slides count','larue'),
	        'description' => __('Enter slides count for home page slider.','larue'),
	        'type'      => 'number'
	    )
	);
	$wp_customize->add_setting(
	    'asw_home_slider_posts',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_home_slider_posts',
	    array(
	        'section'   => 'asw_general_options',
	        'label'     => __('Slider posts IDs','larue'),
	        'description' => __('Enter posts IDs to display only those records (Note: separate values by commas (,)).','larue'),
	        'type'      => 'text'
	    )
	);
	$wp_customize->add_control(
	    'asw_progress_indicator',
	    array(
	        'section'   => 'asw_general_options',
	        'label'     => __('Page scroll indicator','larue'),
	        'description' => __('Indicator at the bottom left corner. Uncheck it to disable', 'larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_seo_settings',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_seo_settings',
	    array(
	        'section'   => 'asw_general_options',
	        'label'     => __('Seo settings','larue'),
	        'description' => __('Check to disable inbuilt SEO','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_meta_keywords',
	    array(
	        'default'            => '',
	        'transport'          => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_meta_keywords',
	    array(
	        'section'  => 'asw_general_options',
	        'label'    => __('Meta Keywords', 'larue'),
	        'description' => __('Add relevant keywords separated with commas to improve SEO.','larue'),
	        'type'     => 'textarea'
	    )
	);
	$wp_customize->add_setting(
	    'asw_meta_description',
	    array(
	        'default'            => '',
	        'transport'          => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_meta_description',
	    array(
	        'section'  => 'asw_general_options',
	        'label'    => __('Meta Description', 'larue'),
	        'description' => __('Enter a short description of the website for SEO.','larue'),
	        'type'     => 'textarea'
	    )
	);
	$wp_customize->add_section(
	    'asw_layout_options',
	    array(
	        'title'     => __('Layout', 'larue'),
	        'priority'  => 2,
	        'panel' => 'asw_theme_options'
	    )
	);
	class WP_Customize_Range_Control extends WP_Customize_Control {

	    public $type = 'custom_range';
	    public function enqueue()
	    {
	        wp_enqueue_script( 'js-for-customize' );
	    }
	    public function render_content()
	    {
	        ?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_attr($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
	        <?php
	    }
	}
	$wp_customize->add_setting(
	    'asw_responsiveness',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_responsiveness',
	    array(
	        'section'   => 'asw_layout_options',
	        'label'     => __('Responsive Layout','larue'),
	        'description' => __('Check to enable responsiveness on your site.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_zoom_mobile',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_zoom_mobile',
	    array(
	        'section'   => 'asw_layout_options',
	        'label'     => __('Zoom on mobile devices','larue'),
	        'description' => __('Check to enable zoom on mobile devices. It will disable responsiveness on mobiles.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_container_width',
	    array(
	        'default'    =>  1110,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Range_Control(
	        $wp_customize,
	        'asw_container_width',
	        array(
	            'label'       => __('Container width', 'larue'),
	            'section'     => 'asw_layout_options',
	            'settings'    => 'asw_container_width',
	            'description' => __('Width for your content. Measurement is in pixel.', 'larue'),
	            'input_attrs' => array(
	                'min' => 940,
	                'max' => 1540,
	            ),
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_sidebar_pos',
	    array(
	        'default'     => 'sidebar-right',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Asw_Control_Image_Select (
	        $wp_customize,
	        'asw_sidebar_pos',
	        array(
	            'label'      	=> __( 'Blog page sidebar', 'larue' ),
	            'description'	=> __('Select sidebar position on blog page, or disable it.', 'larue'),
	            'section'		=> 'asw_layout_options',
	            'settings'		=> 'asw_sidebar_pos',
	            'choices'		=> array(
	            	'sidebar-right' => get_template_directory_uri().'/framework/customizer/images/sr.png',
	            	'sidebar-left'	=> get_template_directory_uri().'/framework/customizer/images/sl.png',
	            	'none'	=> get_template_directory_uri().'/framework/customizer/images/none.png',
	            ),
	            'input_attrs' => array(
	            	'multiple' => false
	            )
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_boxed_style',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_boxed_style',
	    array(
	        'section'   => 'asw_layout_options',
	        'label'     => __('Boxed style','larue'),
	        'description' => __('Check to enable boxed version of your site.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_bg_image',
	    array(
	        'default'      => '',
	        'transport'    => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'asw_body_bg_image',
	        array(
	            'label'    => __('Body Background Image','larue'),
	            'settings' => 'asw_body_bg_image',
	            'section'  => 'asw_layout_options'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_bg_size',
	    array(
	        'default'    =>  'auto',
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_body_bg_size',
	    array(
	        'section'   => 'asw_layout_options',
	        'label'     => __('Background size','larue'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        	'auto' => __('Auto', 'larue'),
	        	'cover' => __('Cover', 'larue'),
	        	'contain' => __('Contain', 'larue')
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_bg_repeat',
	    array(
	        'default'    =>  'no-repeat',
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_body_bg_repeat',
	    array(
	        'section'   => 'asw_layout_options',
	        'label'     => __('Background image repeat','larue'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        	'repeat' => __('Repeat', 'larue'),
	        	'no-repeat' => __('No repeat', 'larue'),
	        	'repeat-x' => __('Repeat horizontally', 'larue'),
	        	'repeat-y' => __('Repeat vertically', 'larue')
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_bg_color',
	    array(
	        'default'     => '#ffffff',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_body_bg_color',
	        array(
	            'label'      => __( 'Body background color', 'larue' ),
	            'section'    => 'asw_layout_options',
	            'settings'   => 'asw_body_bg_color'
	        )
	    )
	);
	$wp_customize->add_section(
	    'asw_header_options',
	    array(
	        'title'     => __('Header', 'larue'),
	        'priority'  => 3,
	        'panel'		=> 'asw_theme_options'
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_variant',
	    array(
	        'default'     => 'version1',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Asw_Control_Image_Select (
	        $wp_customize,
	        'asw_header_variant',
	        array(
	            'label'      	=> __( 'Header style', 'ocean' ),
	            'section'		=> 'asw_header_options',
	            'settings'		=> 'asw_header_variant',
	            'choices'		=> array(
	            	'version1' => get_template_directory_uri().'/framework/customizer/images/h1.png',
	            	'version2'	=> get_template_directory_uri().'/framework/customizer/images/h2.png',
	            ),
	            'input_attrs' => array(
	            	'multiple' => false
	            )
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_dropdown_style',
	    array(
	        'default'     => 'dark',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
		'asw_header_dropdown_style', 
		array(
			'section'=>'asw_header_options', 
			'label'=>__('Primary menu dropdown style', 'larue'), 
			'type'=>'radio', 
			'choices'=>array(
				'dark'=>__('Dark', 'larue'), 
				'light'=>__('Light', 'larue')
			)
		)
	);
	$wp_customize->add_setting(
	    'asw_fixed_header',
	    array(
	        'default'    => true,
	        'transport'  => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_fixed_header',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Fixed navigation','larue'),
	        'description' => __('Check to fix your navigation at the top of the page.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'asw_header_grid', 
		array(
			'default'=>'container', 
			'transport'=>'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'asw_header_grid', 
		array(
			'section'=>'asw_header_options', 
			'label'=>__('Header fullwidth', 'larue'), 
			'type'=>'radio', 
			'choices'=>array(
				'fullwidth'=>__('Yes', 'larue'), 
				'container'=>__('No', 'larue')
			)
		)
	);
	$wp_customize->add_setting(
	    'asw_header_image',
	    array(
	        'default'      => '',
	        'transport'    => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'asw_header_image',
	        array(
	            'label'    => __('Header Background Image','larue'),
	            'settings' => 'asw_header_image',
	            'section'  => 'asw_header_options'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_bg_size',
	    array(
	        'default'    =>  'auto',
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_header_bg_size',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Background size','larue'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        	'auto' => __('Auto', 'larue'),
	        	'cover' => __('Cover', 'larue'),
	        	'contain' => __('Contain', 'larue')
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_bg_color',
	    array(
	        'default'     => '#ffffff',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_header_bg_color',
	        array(
	            'label'      => __( 'Header background color', 'larue' ),
	            'section'    => 'asw_header_options',
	            'settings'   => 'asw_header_bg_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_media_logo',
	    array(
	        'default'      => '',
	        'transport'    => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'asw_media_logo',
	        array(
	            'label'    => __('Logo Image','larue'),
	            'settings' => 'asw_media_logo',
	            'section'  => 'asw_header_options'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_media_logo_width',
	    array(
	        'default'    =>  '185',
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_media_logo_width',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Logo size','larue'),
	        'type'      => 'text',
	    )
	);
	$wp_customize->add_setting(
	    'asw_nav_textalign',
	    array(
	        'default'    =>  'textcenter',
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_nav_textalign',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Navigation align','larue'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        	'textleft' => __('Left', 'larue'),
	        	'textcenter' => __('Center', 'larue'),
	        	'textright' => __('Right', 'larue')
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_border_color',
	    array(
	        'default'     => '#ededed',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_header_border_color',
	        array(
	            'label'      => __( 'Header border color', 'larue' ),
	            'section'    => 'asw_header_options',
	            'settings'   => 'asw_header_border_color'
	        )
	    )
	);
	class Asw_Customize_Control_Title extends WP_Customize_Control {

	    public function render_content(){

	        if ( empty( $this->label ) ){ return; }
	 
	        if ( ! empty( $this->label ) ) : ?>
					<h2><?php echo esc_html( $this->label ); ?>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
			</h2><?php endif; 
	    }
	}
	$wp_customize->add_setting(
	    'asw_nav_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Asw_Customize_Control_Title (
	        $wp_customize,
	        'asw_nav_settings_title',
	        array(
	            'label'      	=> __( 'Navigation Settings', 'larue' ),
	            'section'		=> 'asw_header_options',
	            'settings'		=> 'asw_nav_settings_title',
	        )
	    )
	);
	$font_sizes = array();
	$font_sizes_px_none = array();
	for ($i = 9; $i <= 50; $i++){ 
		$font_sizes[$i.'px'] = $i.'px';
		$font_sizes_px_none[$i] = $i.'px';
	}
    $wp_customize->add_setting(
	    'asw_menu_font_size',
	    array(
	        'default'     => '13px',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_menu_font_size',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('font size','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$font_weights  = array(
		'100' => __('Ultra Light', 'larue'),
		'200' => __('Light', 'larue'),
		'400' => __('Normal', 'larue'),
		'600' => __('Semi Bold', 'larue'),
		'700' => __('Bold', 'larue'),
		'900' => __('Ultra Bold', 'larue')
	);
	$wp_customize->add_setting(
	    'asw_menu_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_menu_font_weight',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('font weight','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
	global $google_fonts;
	$google_fonts = array_combine($google_fonts, $google_fonts);
	$faces = array( 
		'Arial'=>'Arial',
		'Verdana'=>'Verdana',
		'Trebuchet'=>'Trebuchet',
		'Georgia, sans-serif' =>'Georgia',
		'Times New Roman, sans-serif'=>'Times New Roman',
		'Tahoma'=>'Tahoma',
		'Palatino'=>'Palatino',
		'Helvetica, sans-serif'=>'Helvetica'
	);
	$faces = array_merge($faces, $google_fonts);
	$wp_customize->add_setting(
	    'asw_menu_font_family',
	    array(
	        'default'     => 'Raleway',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_menu_font_family',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('font family','larue'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$wp_customize->add_setting(
	    'asw_menu_item_color',
	    array(
	        'default'     => '#151515',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_menu_item_color',
	        array(
	            'label'      => __( 'items color (initial)', 'larue' ),
	            'section'    => 'asw_header_options',
	            'settings'   => 'asw_menu_item_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_menu_item_color_active',
	    array(
	        'default'     => '#bc9c68',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_menu_item_color_active',
	        array(
	            'label'      => __( 'items color (hover, active)', 'larue' ),
	            'section'    => 'asw_header_options',
	            'settings'   => 'asw_menu_item_color_active'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_elements_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Asw_Customize_Control_Title (
	        $wp_customize,
	        'asw_header_elements_title',
	        array(
	            'label'      	=> __( 'Header elements', 'larue' ),
	            'section'		=> 'asw_header_options',
	            'settings'		=> 'asw_header_elements_title',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_topbar',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_header_topbar',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Topbar','larue'),
	        'description' => __('Check to enable topbar.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_socials',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_header_socials',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Socials','larue'),
	        'description' => __('Check to enable socials in header.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_search_button',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_header_search_button',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Search button','larue'),
	        'description' => __('Check to enable search button in header.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_header_hidden_nav',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_header_hidden_nav',
	    array(
	        'section'   => 'asw_header_options',
	        'label'     => __('Hidden navigation','larue'),
	        'description' => __('Check to enable hidden navigation.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_section(
	    'asw_footer_options',
	    array(
	        'title'     => __('Footer', 'larue'),
	        'priority'  => 4,
	        'panel'		=> 'asw_theme_options'
	    )
	);
	$wp_customize->add_setting(
	    'asw_footer_bg_color',
	    array(
	        'default'     => '#161616',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_footer_bg_color',
	        array(
	            'label'      => __( 'Footer background color', 'larue' ),
	            'section'    => 'asw_footer_options',
	            'settings'   => 'asw_footer_bg_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_footer_copyright',
	    array(
	        'default'            => '© 2017 Larue. All Rights Reserved.',
	        'transport'          => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_footer_copyright',
	    array(
	        'section'  => 'asw_footer_options',
	        'label'    => __('Copyright text', 'larue'),
	        'description' => __('Add copyright text to footer area.','larue'),
	        'type'     => 'textarea'
	    )
	);

	$wp_customize->add_setting(
	    'asw_footer_copy_bg_color',
	    array(
	        'default'     => '#1a1a1a',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_footer_copy_bg_color',
	        array(
	            'label'      => __( 'Copyright background color', 'larue' ),
	            'section'    => 'asw_footer_options',
	            'settings'   => 'asw_footer_copy_bg_color'
	        )
	    )
	);
	
	$wp_customize->add_section(
	    'asw_headings_options',
	    array(
	        'title'     => __('Headings', 'larue'),
	        'priority'  => 5,
	        'panel'		=> 'asw_theme_options'
	    )
	);
	$wp_customize->add_setting(
	    'asw_blog_head_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Asw_Customize_Control_Title (
	        $wp_customize,
	        'asw_blog_head_title',
	        array(
	            'label'      	=> __( 'Posts headings', 'larue' ),
	            'section'		=> 'asw_headings_options',
	            'settings'		=> 'asw_blog_head_title',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_posts_headings_font_size',
	    array(
	        'default'     => '21',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_posts_headings_font_size',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('font size','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes_px_none
	    )
	);
	$wp_customize->add_setting(
	    'asw_posts_headings_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_posts_headings_font_weight',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('font weight','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
	$wp_customize->add_setting(
	    'asw_posts_headings_font_family',
	    array(
	        'default'     => 'Raleway',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_posts_headings_font_family',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('font family','larue'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$wp_customize->add_setting(
	    'asw_posts_headings_font_transform',
	    array(
	        'default'     => 'uppercase',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_posts_headings_font_transform',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('Text transform','larue'),
	        'type'      => 'select',
	        'choices'	=> array(
	        	'none' => esc_html__('None', 'larue'),
	        	'uppercase' => esc_html__('Uppercase', 'larue'),
	        	'capitalize' => esc_html__('Capitalize', 'larue'),
	        	'lowercase' => esc_html__('Lowercase', 'larue')
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_posts_headings_item_color',
	    array(
	        'default'     => '#151515',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_posts_headings_item_color',
	        array(
	            'label'      => __( 'items color (initial)', 'larue' ),
	            'section'    => 'asw_headings_options',
	            'settings'   => 'asw_posts_headings_item_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_posts_headings_item_color_active',
	    array(
	        'default'     => '#606060',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_posts_headings_item_color_active',
	        array(
	            'label'      => __( 'items color (hover)', 'larue' ),
	            'section'    => 'asw_headings_options',
	            'settings'   => 'asw_posts_headings_item_color_active'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_widgets_head_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Asw_Customize_Control_Title (
	        $wp_customize,
	        'asw_widgets_head_title',
	        array(
	            'label'      	=> __( 'Widgets headings', 'larue' ),
	            'section'		=> 'asw_headings_options',
	            'settings'		=> 'asw_widgets_head_title',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_widgets_headings_font_size',
	    array(
	        'default'     => '11px',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_widgets_headings_font_size',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('font size','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$wp_customize->add_setting(
	    'asw_widgets_headings_font_weight',
	    array(
	        'default'     => '600',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_widgets_headings_font_weight',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('font weight','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
	$wp_customize->add_setting(
	    'asw_widgets_headings_font_family',
	    array(
	        'default'     => 'Raleway',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_widgets_headings_font_family',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('font family','larue'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$wp_customize->add_setting(
	    'asw_widgets_headings_item_color',
	    array(
	        'default'     => '#414141',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_widgets_headings_item_color',
	        array(
	            'label'      => __( 'color', 'larue' ),
	            'section'    => 'asw_headings_options',
	            'settings'   => 'asw_widgets_headings_item_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_widgets_headings_separator',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_widgets_headings_separator',
	    array(
	        'section'   => 'asw_headings_options',
	        'label'     => __('Heading separator','larue'),
	        'description' => __('Check to enable heading separator line.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_section(
	    'asw_socials_options',
	    array(
	        'title'     => __('Socials', 'larue'),
	        'description' => __('Add your social links, otherwise leave blank if you need not some links.','larue'),
	        'priority'  => 6,
	        'panel'		=> 'asw_theme_options'
	    )
	);
	$wp_customize->add_setting(
	    'asw_sharing_facebook',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_sharing_facebook',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show Facebook in share box.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_sharing_twitter',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_sharing_twitter',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show Twitter in share box.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_sharing_pinterest',
	    array(
	        'default'    =>  true,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_sharing_pinterest',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show Pinterest in share box.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_sharing_linkedin',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_sharing_linkedin',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show Linkedin in share box.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_sharing_googleplus',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_sharing_googleplus',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show Google+ in share box.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'asw_sharing_email',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_sharing_email',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show Email in share box.','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$socials = array('facebook', 'twitter', 'instagram', 'pinterest', 'google_plus', 'forrst', 'dribbble', 'flickr', 'linkedin', 'digg', 'vimeo', 'yahoo', 'tumblr', 'youtube', 'deviantart', 'behance', 'paypal', 'delicious');
	foreach ($socials as $social) {
		$wp_customize->add_setting(
		    'asw_social_'.$social,
		    array(
		        'default'    =>  '',
		        'transport'  =>  'postMessage',
	        	'sanitize_callback' => 'sanitize_text_field',
		    )
		);
		$wp_customize->add_control(
		    'asw_social_'.$social,
		    array(
		        'section'   => 'asw_socials_options',
		        'label'     => ucfirst(str_replace('_', ' ', $social)).' url',
		        'type'      => 'text'
		    )
		);
	}
	$wp_customize->add_setting(
	    'asw_social_skype',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_social_skype',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Skype account','larue'),
	        'type'      => 'text'
	    )
	);
	$wp_customize->add_setting(
	    'asw_social_rss',
	    array(
	        'default'    =>  false,
	        'transport'  =>  'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'asw_social_rss',
	    array(
	        'section'   => 'asw_socials_options',
	        'label'     => __('Show rss','larue'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_section(
	    'asw_styling_options',
	    array(
	        'title'     => __('Styling', 'larue'),
	        'priority'  => 7,
	        'panel'		=> 'asw_theme_options'
	    )
	);
	$wp_customize->add_setting(
	    'asw_accent_color',
	    array(
	        'default'     => '#c79b62',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_accent_color',
	        array(
	            'label'      => __( 'Theme main color', 'larue' ),
	            'section'    => 'asw_styling_options',
	            'settings'   => 'asw_accent_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_font_size',
	    array(
	        'default'     => '15px',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_body_font_size',
	    array(
	        'section'   => 'asw_styling_options',
	        'label'     => __('Body font size','larue'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_font_family',
	    array(
	        'default'     => 'Lato',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'asw_body_font_family',
	    array(
	        'section'   => 'asw_styling_options',
	        'label'     => __('Body font family','larue'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$wp_customize->add_setting(
	    'asw_body_color',
	    array(
	        'default'     => '#545555',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_body_color',
	        array(
	            'label'      => __( 'Body text color', 'larue' ),
	            'section'    => 'asw_styling_options',
	            'settings'   => 'asw_body_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_links_color',
	    array(
	        'default'     => '#c79b62',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_links_color',
	        array(
	            'label'      => __( 'Links color (initial)', 'larue' ),
	            'section'    => 'asw_styling_options',
	            'settings'   => 'asw_links_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'asw_links_color_hover',
	    array(
	        'default'     => '#606060',
	        'transport'   => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'asw_links_color_hover',
	        array(
	            'label'      => __( 'Links color (hover)', 'larue' ),
	            'section'    => 'asw_styling_options',
	            'settings'   => 'asw_links_color_hover'
	        )
	    )
	);

}
add_action( 'customize_register', 'larue_register_theme_customizer', 110 );

/* Register Customizer Scripts */
add_action( 'customize_controls_enqueue_scripts', 'asw_share_customize_register_scripts', 0 );
/**
 * Register Scripts
 * so we can easily load this scripts multiple times when needed (?)
 */
function asw_share_customize_register_scripts(){
	/* CSS */
	wp_register_style( 'css-for-customize', get_template_directory_uri() . '/framework/customizer/css/customizer-control.css' );
	/* JS */
	wp_register_script( 'js-for-customize', get_template_directory_uri() . '/framework/customizer/js/customizer-control.js', array( 'jquery', 'jquery-ui-sortable', 'customize-controls' ) );
}

add_action( 'customize_preview_init', 'asw_customizer_live_preview' );
function asw_customizer_live_preview() {
     wp_enqueue_script(
        'asw-theme-customizer',
        get_template_directory_uri() . '/framework/customizer/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '1.0',
        true
    );
}

add_action( 'wp_enqueue_scripts', 'asw_google_fonts' );
if (!function_exists('asw_google_fonts')){
	function asw_google_fonts() {
		$default = array(
				'Arial',
				'Verdana',
				'Trebuchet',
				'Georgia, sans-serif',
				'Times New Roman, sans-serif',
				'Tahoma',
				'Palatino',
				'Helvetica, sans-serif'
		);

		$googlefonts = array_unique(
			array(
				get_theme_mod('asw_menu_font_family', ''),
				get_theme_mod('asw_footer_menu_font_family', ''),
				get_theme_mod('asw_posts_headings_font_family', ''),
				get_theme_mod('asw_widgets_headings_font_family', ''),
				get_theme_mod('asw_body_font_family', '')
			)
		);	
		$customfont = '';
		$googlefonts = array_filter($googlefonts);
		$google_style = ':100,100italic,200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,800,800italic';	
		foreach($googlefonts as $getfonts) {
			if(!in_array($getfonts, $default)) {
					$customfont = str_replace(' ', '+', $getfonts).$google_style;
					if($customfont != ''){
					$protocol = is_ssl() ? 'https' : 'http';
					$font_name = strtolower(str_replace(' ', '-', $getfonts));
				    wp_enqueue_style( 'google-font-'.$font_name, $protocol."://fonts.googleapis.com/css?family=". substr_replace($customfont ,"",-1) . "&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese", array(), NULL, 'all' );
				}
			}
		}
	}
}