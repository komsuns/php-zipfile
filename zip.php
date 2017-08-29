<?PHP
	$files = [];

	$zip = new ZipArchive();
	$tmp_file = tempnam('.','');
	$zip->open($tmp_file, ZipArchive::CREATE);
	
	foreach($files as $file){
		if(file_exists($file)){
			$download_file = file_get_contents($file);
			$zip->addFromString(basename($file),$download_file);
		}
	}

	$zip->close();

	header('Content-disposition: attachment; filename=Resumes.zip');
	header('Content-type: application/zip');
	readfile($tmp_file);
