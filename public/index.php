<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

        $mpdf = new Mpdf(['tempDir' => __DIR__.'/../tmp']);

        $mpdf->setSourceFile('empty.pdf');
        
        $tplId = $mpdf->ImportPage(1);
        $mpdf->UseTemplate($tplId);

        $signScale = 18;
        $mpdf->Image('../pdfs/signature_obama.png', 70, 238, 300 / $signScale, 189 / $signScale, 'png', '', true, false);
        $mpdf->WriteFixedPosHTML('2022-04-20', 110, 241.5, 51, 7, 'auto');

        $mpdf->Output('test.pdf', Destination::INLINE);

