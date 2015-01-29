<?php


namespace makari4\mpdf;

use Yii;
use yii\base\Component;

class Pdf extends Component
{
    const MODE_BLANK = '';
    const MODE_CORE = 'c';
    const MODE_UTF8 = 'utf-8';

    const FORMAT_A2 = 'A2';
    const FORMAT_A3 = 'A3';
    const FORMAT_A4 = 'A4';
    const FORMAT_A5 = 'A5';
    const FORMAT_A6 = 'A6';
    const FORMAT_LETTER = 'Letter';
    const FORMAT_LEGAL = 'Legal';
    const FORMAT_EXECUTIVE = 'Executive';
    const FORMAT_FOLIO = 'Folio';
    const FORMAT_LEDGER = 'Ledger';
    const FORMAT_TABLOID = 'Tabloid';

    const ORIENTATION_PORTRAIT = 'P';
    const ORIENTATION_LANDSCAPE = 'L';

    const DESTINATION_BROWSER = 'I';
    const DESTINATION_DOWNLOAD = 'D';
    const DESTINATION_FILE = 'F';
    const DESTINATION_STRING = 'S';

    protected $generator;

    public $mode = self::MODE_BLANK;
    public $format = self::FORMAT_A4;
    public $defaultFontSize = 0;
    public $defaultFont = '';
    public $marginLeft = 15;
    public $marginRight = 15;
    public $marginTop = 16;
    public $marginBottom = 16;
    public $marginHeader = 9;
    public $marginFooter = 9;
    public $orientation = self::ORIENTATION_PORTRAIT;
    public $customTtfFontPath;
    public $fontData;
    public $additionalFontData = [];

    public function init()
    {
        parent::init();
        if(isset($this->customTtfFontPath) && !defined('_MPDF_TTFONTPATH')){
            define('_MPDF_TTFONTPATH',$this->customTtfFontPath);
        }

        //$this->setGenerator();
    }

    public function setGenerator()
    {
        $this->generator = new \mPDF(
            $this->mode,
            $this->format,
            $this->defaultFontSize,
            $this->defaultFont,
            $this->marginLeft,
            $this->marginRight,
            $this->marginTop,
            $this->marginBottom,
            $this->marginHeader,
            $this->marginFooter,
            $this->orientation
        );
        if(isset($this->fontData)){
            $this->generator->fontdata = $this->fontData;
        }
        $this->generator->fontdata = array_merge($this->generator->fontdata,$this->additionalFontData);
    }

    /**
     * @return \mPDF
     */
    public function getGenerator()
    {
        if (!isset($this->generator) || !$this->generator instanceof \mPDF) {
            $this->setGenerator();
        }
        return $this->generator;
    }

}