
<?php
	require_once "./Mailchimp.php" ;
?>

<?php
	
	$api_key = "Your api key here" ;
	

		$templates = new Mailchimp($api_key) ;
		$getTemplates = new Mailchimp_Templates($templates);


		$result = $getTemplates->getList();

		$res['records'] = $result;

		die(json_encode($res)) ;

