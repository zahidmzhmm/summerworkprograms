<?php
require_once('classes/class.session.php');
require_once('classes/class.kernel.php');
//require_once('classes/class.resize.php');
//require_once('classes/class.extract.php');
require_once('classes/browser.class.php');
//
////require_once('classes/class.mail.php');
//
//
require_once('functions/general.php');
//require_once('functions/specific.php');
//
//
//require_once('defines/defines.php');


include "../third_party/active_record/ActiveRecord.php";

ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory('../models');
    $cfg->set_connections(array(
        'development' => 'mysql://summerwo_swp:t7+l+rt3kim{@localhost/summerwo_swp'
        //'development' => 'mysql://root:@localhost/summerwo_swp'
    ));
});


?>