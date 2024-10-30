<?php
add_action( 'customize_register', 'dsdsoon_customizer_descriptions' );
function dsdsoon_customizer_descriptions( $wp_customize ) { 
    class DSDSOONdescriptions extends WP_Customize_Control {
	    public $type = 'descriptions';
	
	    public function render_content() {
	        ?>
	        <span><?php echo esc_html( $this->label ); ?></span>
	        <?php
	    }
	}
}

add_action( 'customize_register', 'dsdsoon_customizer_label' );
function dsdsoon_customizer_label( $wp_customize ) { 
    class DSDSOONLabel extends WP_Customize_Control {
	    public $type = 'label';
	
	    public function render_content() {
	        ?>
	        <label>
	        	<h3 class="customize-control-title" style="margin-top:0;"><strong><?php echo esc_html( $this->label ); ?></strong></h3>            
	        </label>
	        <?php
	    }
	}
}

add_action( 'customize_register', 'dsdsoon_customizer_divider' );
function dsdsoon_customizer_divider( $wp_customize ) { 
    class DSDSOONdivider extends WP_Customize_Control {
	    public $type = 'divider';
	
	    public function render_content() {
	        ?>
	        <hr class="dsdc-divider" style="margin-top:25px; margin-bottom:15px;">
	        <?php
	    }
	}
}

add_action( 'customize_register', 'dsdsoon_customizer_button' );
function dsdsoon_customizer_button( $wp_customize ) { 
    class DSDSOONbutton extends WP_Customize_Control {
	    public $type = 'button';
	
	    public function render_content() {
	        ?>
	        <a href="<?php echo get_admin_url() . 'post-new.php?post_type=et_pb_layout'; ?>" target="_blank" class="button button-primary save" style="width:100%;margin-top:10px;text-align:center;"><?php echo esc_html( $this->label ); ?></a>
	        <?php
	    }
	}
}

add_action( 'customize_register', 'dsdsoon_customizer_switch' );
function dsdsoon_customizer_switch( $wp_customize ) { 
    class DSDSOONswitch extends WP_Customize_Control {
	    public $type = 'switch';
	
	    public function render_content() {
	        ?>
            <label for="_customize-input-dsdsoon_socialkit" class="customize-control-title">
            <?php echo esc_html( $this->label ); ?>
            </label>
	        <label class="dsds-switch">
                <input id="_customize-input-<?php echo esc_html( $this->id ); ?>" type="checkbox" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                <span class="dsds-slider"></span>
            </label>
	        <?php
	    }
	}
}



add_action( 'customize_register', 'dsdsoon_customizer_layout' );
function dsdsoon_customizer_layout( $wp_customize ) { 
    class DSDSOONlayout extends WP_Customize_Control {
		public $type = 'layout_soon';  // New control type
		public $post_type = 'et_pb_layout';  // Query filter for library items

		public function render_content() {
			$latest = new WP_Query( array(
				'post_type'   => $this->post_type,
				'orderby'     => 'date',
				'order'       => 'DESC'
			));
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?>>
				<?php 
				echo '<option>Select Layout</option>';
				while( $latest->have_posts() ) {
					$latest->the_post();
					echo "<option " . selected( $this->value(), get_the_ID() ) . " value='" . get_the_ID() . "'>" . the_title( '', '', false ) . "</option>";
				}
				?>
			</select>
		</label>
	<?php
	}
	}
}