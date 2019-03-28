<?php

/**
* Wifi page
*/
class WifiPage extends Page{
	
	private static $singular_name = 'Wifi Page';
    private static $plural_name = 'Wifi Pages';
    private static $description = 'Wifi Landing Page';

	/* Add fields */
	private static $db = array(
		
	);

	/* Add assoc */
	//thisRef=>className
	private static $has_many = array (
        
    );


	
	
	
}

/**
* Investor page controller
*/
class WifiPage_Controller extends Page_Controller{
	
	
	private static $allowed_actions = array(
        'index',
        'WifiForm'
    );

	/**
	 * WiFi signup form
	 */
	public function WifiForm(){
		/*
         * Session setting - old
         *
        //Session::set('id', $_GET['id']); //user's mac address
        //Session::set('ap', $_GET['ap']); //AP mac
        //Session::set('ssid', $_GET['ssid']); //ssid the user is on (POST 2.3.2)
        //Session::set('time', $_GET['t']); //time the user attempted a request of the portal
        //Session::set('refURL', $_GET['url']); //url the user attempted to reach
        //Session::set('loggingin', "icVMNiCEfGGa6xKQ0F2e4jLhMBckmzRecj9ryIRlcAVxRpGItgZclSPCunsY86A7Q8KUIyDikAusz080IRJfJuii08biCd1f8YsLq3dNbJwVvPYistmeTBoqoey083P9");
        //key to use to check if the user used this form or not
        // -- prevents them from simply going to /authorised.php
        //on their own

        $existingConn = Session::get('Conn');
        
    	//Check time
        $now = time();
        $oneHour = $existingConn + (60 * 60);
        if ($now > $oneHour || $existingConn === 0) {
    		$form = WifiForm::create($this, 'WifiForm');
	        $form->enableSpamProtection();
	        //$form->setAttribute('data-parsley-validate', 'true');

	        return $form;    	
        }else{
        	return new ArrayData(array(
	            'Info' => 'You already have a session going. Sessions last for 1 hour.'
	        ));
        }
        */
        $form = WifiForm::create($this, 'WifiForm');
        $form->enableSpamProtection();
        $form->setAttribute('data-parsley-validate', 'true');

        return $form;    	

        
    }
    

	
	
}