<?php
/**
 * Class WifiForm
 */
class WifiForm extends Form{
    public function __construct($controller, $name, $arguments = []){
        $fields = $this->createFields($arguments);
        $required = RequiredFields::create(
            'FullName',
            'EmailAddress'
        );
        $submit = FormAction::create('Submit');
        $actions = FieldList::create(
            $submit
        );
        /** -----------------------------------------
         * Form
         * ----------------------------------------*/
        $form = Form::create($this, $name, $fields, $actions, $required);
        $form->enableSpamProtection();
        if ($arguments) {
            $form->loadDataFrom($arguments);
        }
        if ($formData = Session::get('FormInfo.Form_' . $name . '.data')) {
            $form->loadDataFrom($formData);
        }
        parent::__construct($controller, $name, $fields, $actions, $required);
        $this->setAttribute('data-parsley-validate', true);
        $this->setAttribute('autocomplete', 'on');
        $this->addExtraClass('form');
    }
    private function createFields($arguments){

        $fields = FieldList::create([

            TextField::create('FullName', 'Name')
                ->setAttribute('placeholder', 'Full name')
                ->setAttribute('data-parsley-required-message', 'Please enter your name'),
            EmailField::create('EmailAddress', 'Email Address')
                ->setAttribute('data-parsley-required-message', 'Please enter your email address')
                ->setAttribute('placeholder', 'Email address'),
            EmailField::create('Email', 'SPAM PROTECTION')
                ->addExtraClass('honeypot')
        ]);

        return $fields;
    }
    public function Submit($data, $form){
        /**
         * @var Form              $form
         * @var WifiForm $message
         * @var Email             $email
         */
        $data = $form->getData();
        Session::set('FormInfo.Form_' . $this->name . '.data', $data);
        if (isset($data['Email']) && $data['Email'] != '') {
            $form->setMessage('Spam protection field should be empty', 'bad');
            if ($this->request->isAjax()) {
                return json_encode([
                    'error'   => true,
                    'message' => 'Spam protection field should be empty'
                ]);
            } else {
                return $this->controller->redirect($this->controller->Link());
            }
        }
        /** -----------------------------------------
         * Send Wifi
         * ----------------------------------------*/
        
        //$this->sendAuth($this->GetMAC(),(1*60));
        //unset($_SESSION['loggingin']);
        //Session::set('Conn',time());

        // Check to see if the form has been posted to
        if (Session::get('loggingin') ==
        "icVMNiCEfGGa6xKQ0F2e4jLhMBckmzRecj9ryIRlcAVxRpGItgZclSPCunsY86A7Q8KUIyDikAusz080IRJfJuii08biCd1f8YsLq3dN
        bJwVvPYistmeTBoqoey083P9"){
            ob_start();
            $this->sendAuth(Session::get('id'), (1*60)); //e.g. authorizing user for 1 hour
            ob_end_clean();
            Session::clear('loggingin');
            $form->sessionMessage("I think you have 1 hour.", 'good');
        }else{
            $form->sessionMessage("Something went wrong.", 'bad');
        }

        /** -----------------------------------------
         * Send to MailChimp
         * ----------------------------------------*/

        /** -----------------------------------------
         * Finish
         * ----------------------------------------*/
        Session::clear('FormInfo.Form_' . $this->name . '.data');
        // After dealing with the data you can redirect the user back.
        return $this->controller->redirectBack();
    }
    private function sendAuth($id,$minutes){
        $unifiServer = "http://snickel.techi.co.nz/:8443"; // External IP of the Unifi Controller
        $unifiUser = "itHjgLq4aHRudpvx";
        $unifiPass = "die_woo9chai3Thaz3ookaigeiN4pae3";
        //dbg("Starting");
        // Start Curl for login
        $ch = curl_init();
        // We are posting data
        //dbg("Posting");
        curl_setopt($ch, CURLOPT_POST, TRUE);
        // Set up cookies
        //dbg("Cookies");
        $cookie_file = "/tmp/unifi_cookie";
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        // Allow Self Signed Certs
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        // Force SSL3 only
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        // Login to the UniFi controller
        curl_setopt($ch, CURLOPT_URL, "$unifiServer/api/login");
        $data = json_encode(array(
            "username" => $unifiUser,
            "password" => $unifiPass
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        // send login command
        //dbg("login");
        curl_exec ($ch);
        //dbg("logged in");
        //echo "Checkpoint 1";
        // Send user to authorize and the time allowed
        $data = json_encode(array(
            'cmd'=>'authorize-guest',
            'mac'=>$id,
            'minutes'=>$minutes
        ));
        //dbg("json");
        //dbg($data);
        // Send the command to the API
        curl_setopt($ch, CURLOPT_URL, $unifiServer.'/api/s/default/cmd/stamgr');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'json='.$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //dbg("curl_exec");
        curl_exec ($ch);
        // Logout of the UniFi Controller
        //dbg("logout");
        curl_setopt($ch, CURLOPT_URL, $unifiServer.'/logout');
        curl_exec ($ch);
        //dbg("close");
        curl_close ($ch);
        unset($ch);
    }
    /* Not required
    private function GetMAC(){
        ob_start();
        system('getmac');
        $Content = ob_get_contents();
        //ob_clean();
        ob_end_clean();
        return substr($Content, strpos($Content,'\\')-20, 17);
    }
    */
}