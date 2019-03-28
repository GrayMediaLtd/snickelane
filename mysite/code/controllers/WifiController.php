<?php

class WifiController extends Controller {

    private static $allowed_actions = array(
        'startform',
        'index'
    );

    public function index(SS_HTTPRequest $request) {
        // ..
        /**
         * Session setting
         */
        if (array_key_exists('loggingin', $_GET)) {
            Session::set('id', $_GET['id']); //user's mac address
            Session::set('ap', $_GET['ap']); //AP mac
            Session::set('ssid', $_GET['ssid']); //ssid the user is on (POST 2.3.2)
            Session::set('time', $_GET['t']); //time the user attempted a request of the portal
            Session::set('refURL', $_GET['url']); //url the user attempted to reach
            Session::set('loggingin', "icVMNiCEfGGa6xKQ0F2e4jLhMBckmzRecj9ryIRlcAVxRpGItgZclSPCunsY86A7Q8KUIyDikAusz080IRJfJuii08biCd1f8YsLq3dNbJwVvPYistmeTBoqoey083P9");
            //key to use to check if the user used this form or not
            // -- prevents them from simply going to /authorised.php
            //on their own   
        } 

        //$this->startform();
        //Re-direct to wifipage
        return $this->redirect('/wifi-page');
    }

    /* Now in WifiPage.php
    public function startform() {
        //print_r($request->allParams());

        $form = WifiForm::create($this, 'WifiForm');
        $form->enableSpamProtection();
        //$form->setAttribute('data-parsley-validate', 'true');
        //return $form;  

        return $this->customise(new ArrayData(array(
            'Form' => $form
        )))->renderWith('Page');
    }
    */
}