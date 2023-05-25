<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'contact.bizzzzzzzo@gmail.com';

    $marke = addslashes(trim($_POST['marke']));
    $modell = addslashes(trim($_POST['modell']));
    $jhargang = addslashes(trim($_POST['jhargang']));
    $treibstoff = addslashes(trim($_POST['treibstoff']));
    $kilometerstand = addslashes(trim($_POST['kilometerstand']));
    $unfall = addslashes(trim($_POST['unfall']));
    $preis = addslashes(trim($_POST['preis']));
    $vorname = addslashes(trim($_POST['vorname']));
    $nachname = addslashes(trim($_POST['nachname']));
    $abholort = addslashes(trim($_POST['abholort']));
    $telefon = addslashes(trim($_POST['telefon']));
    $clientEmail = addslashes(trim($_POST['email']));
    $bemerkungen = addslashes(trim($_POST['bemerkungen']));

    $array = array('markeMessage' => '', 'modellMessage' => '', 'jhargangMessage' => '', 'treibstoffMessage' => '', 'kilometerstandMessage' => '', 'unfallMessage' => '', 'preisMessage' => '', 'vornameMessage' => '', 'nachnameMessage' => '', 'abholortMessage' => '', 'telefonMessage' => '', 'emailMessage' => '', 'bemerkungenMessage' => '');

    if($marke == '') {
    	$array['markeMessage'] = 'KEIN Marke!';
    }
    if($modell == '') {
        $array['modelMessage'] = 'WÄHLEN Modell!';
    }
    if($jhargang == '') {
        $array['jhargangMessage'] = 'WÄHLEN Jhargang!';
    }
    if($treibstoff == '') {
        $array['treibstoffMessage'] = 'WÄHLEN Treibstoff!';
    }
    if($kilometerstand == '') {
        $array['kilometerstandMessage'] = 'WÄHLEN Kilometerstand!';
    }
    if($unfall == '') {
        $array['unfallMessage'] = 'WÄHLEN Unfall!';
    }
    if($preis == '') {
        $array['preisMessage'] = 'KEIN Preis!';
    }
    if($vorname == '') {
        $array['vornameMessage'] = 'KEIN Vorname!';
    }
    if($nachname == '') {
        $array['nachnameMessage'] = 'KEIN Nachname!';
    }
    if($abholort == '') {
        $array['abholortMessage'] = 'KEIN Abholort!';
    }
    if($telefon == '') {
        $array['telefonMessage'] = 'KEIN Telefon!';
    }
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'KEIN Email!';
    }
    if($bemerkungen == '') {
        $array['bemerkungenMessage'] = 'KEIN bemerkungen!';
    }
    if($marke != '' && $modell == '' && $jhargang == '' && $treibstoff == ''&& $kilometerstand == '' && $unfall == '' && $preis == '' && $vorname == '' && $nachname == '' && $abholort == '' && $telefon == '' && isEmail($clientEmail) && $bemerkungen == '') {
        // Send email
        $message = "Message from: " . $name . "\r\n" . $message;
		$headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
		mail($emailTo, $subject . " (bootstrap contact form)", $message, $headers);
    }

    echo json_encode($array);

}

?>
