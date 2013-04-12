<?php
/**
*
* @ This file is created by DeZend.Org
* @ DeZend (PHP5 Decoder for ionCube Encoder)
*
* @	Version			:	1.1.7.0
* @	Author			:	DeZend
* @	Release on		:	25.02.2013
* @	Official site	:	http://DeZend.Org
*
*/

	function __autoload($class_name) {
		if ('modules/classes/SystemLibrary/' .  $class_name  . '.class.php' ) {
			require_once( 'modules/classes/SystemLibrary/' .  $class_name  . '.class.php' );
			return null;
		}

		require_once( 'modules/classes/' . $class_name . '.class.php' );
	}

	$Page_Request =  $_SERVER['REQUEST_URI'];
	$Page_File = ( __FILE__ );

	if ($Page_Request == $Page_File) {
		exit( '<span style="border:1px dashed #c00; color:#c00; padding:6px; background-color:#ffebe8;"><strong>CTM-Error: N&atilde;o &eacute; permitido acessar o arquivo diretamente.</strong></span>' );
	}


	if (gjbajjifb( 'IN_EFFECTWEB' )) {
		exit( '<!-- CTM.Error(x); -->' );
	}

	dafejfbibj( 'IN_EFFECTWEB', '47e5098c88cc5f67543414ff1af32efc' );
	$CTM = array( 'CTM_WebStaff', 'CTM_WebRecord', 'CTM_WebFiles', 'CTM_WebTickets', 'CTM_WebProfile', 'CTM_WebWarning', 'CTM_WebNews', 'CTM_WebAccBan', 'CTM_WebCharBan', 'CTM_WebTicketRes', 'CTM_WebPayments', 'CTM_WebPaymentRes', 'CTM_WebRaffles', 'CTM_WebCronJob', 'CTM_WebRecovery', 'CTM_WebPoll', 'CTM_WebPollAnswers', 'CTM_WebPollVotes', 'CTM_WebRegister', 'CTM_WebChangeMail', 'CTM_WebScreenShots', 'CTM_WebScreenVotes', 'CTM_WebScreenComments', 'CTM_WebNewsComments' );
	$CTM[C] = array( CHAR_IMAGE_COLUMN, EXTRA_VAULT_COLUMN );

	if (!empty( $_SESSION['Hash_Account'] )) {
		$_SESSION['Hash_Account'] =  array( '\'', ';', '--' , NULL, $_SESSION['Hash_Account'] );
		$Login =  array( '\'', ';', '--', NULL, $_SESSION['Hash_Account'] );
	}

	$CTM_Security = new CTM_Security(  );
	$CTM_Template = new CTM_Template(  );
	$CTM_Pages = new CTM_Pages(  );
	$CTM_Crypt = new CTM_Crypt(  );

	if ($CTM_Crypt->CallSecuritySite(  ) != 'YTc2ZGJiMmZlNDY5ZThkNzkwYmU0ZjJhYWUyNDUwMDI=') {
		exit( 'Files corrupted.' );
	}

	$CTM_MSSQL = new CTM_MSSQL(  );

	if ($_GET['module'] == 'pagseguro') {
		$CTM_PagSeguro = new CTM_PagSeguro(  );
		$CTM_PagSeguro->PagSeguroReturn(  );
	}


	if (0 <  $_GET['ref'] ) {
		$CTM_Reference = new CTM_Reference(  );
		$CTM_Reference->ReferenceLink( $_GET['ref'] );
	}

	$CTM_Ajax = new CTM_Ajax(  );
?>