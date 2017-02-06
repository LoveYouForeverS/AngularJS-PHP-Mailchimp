

<?php
	require_once "./Mailchimp.php" ;
?>

<?php
	
	/* 	First Create List and add several subscribers */
	/*  Please replace your API key and List ID */

	$api_key = "your api key" ;
	$list_id = "your list id" ;

	$title = $_GET['title'] ;
	$contents = $_GET['contents'] ;
	$template = $_GET['templateId'] ;
	
	

	$options = array(
      'list_id' => $list_id,
      'subject' => $title,
      'from_email' => 'alexandrpetrov1229@yahoo.com',
      'from_name' => 'AlexandrPetrov',
      'to_name' => 'Test Recipient',
      'template_id' => $template,
      'title' => $title
    );

	/* 		if you have customized template , please add your 'template_id' items */
	/* 		put the value of the dynamic contents to sections variable of content array */
	/* 		The hhh is key
			when using a your template instead of raw HTML, each key should be the unique mc:edit area name from the template that you modified.
	*/
    $content = array(
      
    	"sections" =>array("hhh" =>$contents),
    	
    );


	if (isset($title) && isset($contents) && isset($template)) {

		$campaign = new Mailchimp($api_key) ;

		$create_campaign = new Mailchimp_Campaigns($campaign);

		/* 	Create create_campaign 		*/
		$create_campaign->create('regular',$options,$content) ;
		

		/*	 Get the campaign ID.	Also you can get the template_id here.    */
		$cid = $create_campaign->getList();
		$cid = $cid['data'][0]['id'];
		

		/*		Ready and Send email !  if you have been ready as above , realease this two comments as follow ! */

	 	 $create_campaign->ready($cid);
	 	 $result =  $create_campaign->send($cid);
	 	 $results['record'] = $result['complete'];


	 	 if($result['complete']) {
	 	 	echo json_encode($results);
	 	 } else {
	 	 	echo json_encode($results) ;
	 	 }
	
	}

?>

