<?php

include "third_party/active_record/ActiveRecord.php";

ActiveRecord\Config::initialize( function ( $cfg ) {
	$cfg->set_model_directory( 'models' );
	$cfg->set_connections( array(
		'development' => 'mysql://summerwo_swp:t7+l+rt3kim{@localhost/summerwo_swp'
		//'development' => 'mysql://root:@localhost/summerwo_swp'
	) );
} );