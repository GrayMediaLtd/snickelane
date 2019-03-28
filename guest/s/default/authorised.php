<?php
session_start();
function dbg($msg) {
// simple function to log debug info
$file="unifi.log";
$datestamp=date("y-m-d H:i:s");
file_put_contents($file, $datestamp . ": " . $msg . "\n", FILE_APPEND);
echo $msg . "<br>";
}
function sendAuthorization($id, $minutes)
{
$unifiServer = "http://snickel.techi.co.nz:8443"; // External IP of the Unifi Controller
$unifiUser = "itHjgLq4aHRudpvx";
$unifiPass = "die_woo9chai3Thaz3ookaigeiN4pae3";
dbg("Starting");
// Start Curl for login
$ch = curl_init();
// We are posting data
dbg("Posting");
curl_setopt($ch, CURLOPT_POST, TRUE);
// Set up cookies
dbg("Cookies");
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
"password" => $unifiPass));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// send login command
dbg("login");
curl_exec ($ch);
dbg("logged in");
echo "Checkpoint 1";
// Send user to authorize and the time allowed
$data = json_encode(array(
'cmd'=>'authorize-guest',
'mac'=>$id,
'minutes'=>$minutes));
dbg("json");
dbg($data);
// Send the command to the API
curl_setopt($ch, CURLOPT_URL, $unifiServer.'/api/s/default/cmd/stamgr');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'json='.$data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
dbg("curl_exec");
curl_exec ($ch);
// Logout of the UniFi Controller
dbg("logout");
curl_setopt($ch, CURLOPT_URL, $unifiServer.'/logout');
curl_exec ($ch);
dbg("close");
curl_close ($ch);
unset($ch);
}
// Check to see if the form has been posted to
if ($_SESSION['loggingin'] ==
"icVMNiCEfGGa6xKQ0F2e4jLhMBckmzRecj9ryIRlcAVxRpGItgZclSPCunsY86A7Q8KUIyDikAusz080IRJfJuii08biCd1f8YsLq3dN
bJwVvPYistmeTBoqoey083P9")
{
ob_start();
sendAuthorization($_SESSION['id'], (1*60)); //e.g. authorizing user for 1 hour
ob_end_clean();
unset($_SESSION['loggingin']);
}
?>
<p>Connecting to the network...</p>
<?php dbg("Redirecting to: ". $_SESSION['refURL'])?>
<script>
//allow time for the authorization to go through
setTimeout(function () { window.location.href = "<?php echo $_SESSION['refURL']; ?>";}, 6000);
</script>