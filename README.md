Yii2-mPDF
===================================

The mPdf integration for the Yii2 framework.
---------------


Install via Composer
-----------------------

```
    "repositories": [
            {
                "type": "vcs",
                "url": "git@github.com:makari4/mpdf.git"
            },
            {
                "type": "vcs",
                "url": "git@github.com:makari4/yii2-mpdf.git"
            }
        ],
    "require": {
        "makari4/yii2-mpdf":"1.0.0"
    },

```

Usage
----------------------

```

$pdf = new \makari4\mpdf\Pdf(
            [
                'mode'=>\makari4\mpdf\Pdf::MODE_UTF8,
                    'customTtfFontPath' => Yii::getAlias('@app') . DIRECTORY_SEPARATOR . 'ttffonts' . DIRECTORY_SEPARATOR,
                'additionalFontData' => [
                    "linlibertine" => array(
                        'R' => "LinLibertine_R.ttf",
                        'B' => "LinLibertine_RB.ttf",
                        'I' => "LinLibertine_RI.ttf",
                        'BI' => "LinLibertine_RBI.ttf",
                    ),
                ],
            ]
        );
        $pdfGenerator = $pdf->getGenerator();
        $pdfGenerator->WriteHTML('
            <p style="font-family: linlibertine; font-size: 100%;font-variant: small-caps;">Test message!</p>
            <p style="font-size: 100%;font-variant: small-caps;">Test message!</p>
        ');
        $pdfGenerator->Output();

```