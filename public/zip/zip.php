<?php
function createZipAndDownload($files, $filesPath, $zipFileName)
{
    $zip = new \ZipArchive();
    if ($zip->open($zipFileName, \ZipArchive::CREATE) !== TRUE) {
        exit("cannot open <$zipFileName>\n");
    }
    foreach ($files as $file) {
        $zip->addFile($filesPath . $file, $file);
    }
    $zip->close();

    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename = $zipFileName");
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile("$zipFileName");
    exit;
}

$files = array('sample.php', 'sample.jpg', 'sample.pdf', 'sample.doc');

$filesPath = '/ROOT/FILE_PATH';

$zipName = 'document.zip';

echo createZipAndDownload($files, $filesPath, $zipName);
