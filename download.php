<?php
	date_default_timezone_set('Asia/Calcutta'); 
    if(isset($_GET['file']))
	{
		$filen = $_GET['file'];
		if(file_exists("no-direct-access/".$filen))
		{
		    	header('Content-Type: application/download');
		    	header('Content-Disposition: attachment; filename="'.$filen.'"');
		    	header("Content-Length: " . filesize("no-direct-access/".$filen));
		    	$fp = fopen("no-direct-access/".$filen, "r");fpassthru($fp);
			fclose($fp);
			echo "Thank you for downloading NTeam.";
		}
		else
		{
		 	echo "Sorry, file not found";
		 	exit();
		}
	}
	else
	{
	 	echo "Sorry, file not found";
	 	exit();
	}
	/** Total **/
	$filePath = 'count.txt';
	$count = file_exists($filePath) ? file_get_contents($filePath) : 0;
	$newCount = $count + 1;
	file_put_contents($filePath, $newCount);   
	
	/** Day-wise **/
	echo strtotime('22-09-2008');
	$XMLName = 'stats/count.xml';
	$date = date('Y-m-d',time());
	$stats = simplexml_load_file($XMLName);
	$last = $stats->downloads->count() - 1;
	if($date == $stats->downloads[$last]->attributes())
	{	
		$stats->downloads[$last] += 1 ;
	}
	else
	{
		$actualLastDate = date('Y-m-d',( time() - (24*60*60) ) );
		while($stats->downloads[$last]->attributes() != $actualLastDate)
		{
			$lastDate = date('Y-m-d',strtotime($stats->downloads[$last]->attributes()) + 24*60*60);
			$lastNewDate = $lastDate+1;
			$stats->addChild("downloads","0");
			$stats->downloads[$last+1]->addAttribute("date","$lastDate");
			$last += 1;
		}
		$stats->addChild("downloads","1");
		$stats->downloads[$last+1]->addAttribute("date","$date");
	}
	$stats->asXML($XMLName);
?>