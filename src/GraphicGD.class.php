<?php
namespace Deltamc\Graphic;

abstract class GraphicGD
{
    protected $out;
    protected $width;
    protected $height;
    protected $bgColor;

    public function __construct($width, $height, $bgColor = null)
    {
        $this->width   = $width;
        $this->height  = $height;
        $this->bgColor = $bgColor;

        $this->create();
    }

    public function create()
    {
        $this->out = imagecreatetruecolor($this->width, $this->height);

        $color = $this->color($this->bgColor);

        imagefilledrectangle($this->out, 0, 0, $this->width, $this->height, $color);
    }

    protected function color($color)
    {
        if (!is_array($color)) {
            $red   = 0;
            $green = 0;
            $blue  = 0;
            $color = ltrim($color, '#');
            sscanf($color, "%2x%2x%2x", $red, $green, $blue);

            return imageColorAllocate($this->out, $red, $green, $blue);
        }

        return imageColorAllocate($this->out, $color[0], $color[1], $color[2]);
    }

    public function addImage(Image $img)
    {
        $type       = $this->imageType( $img->getUrl() );
        $gdInfo     = gd_info();
        $originSize = getimagesize($img->getUrl());

        $originWidth  =  $originSize[0];
        $originHeight =  $originSize[1];

        switch ($type) {
            //gif
            case(1):
                if (!$gdInfo['GIF Create Support']) {
                    throw new Exception('GIF format not supported');
                }
                $imgGd = imagecreatefromGIF( $img->getUrl());
                break;
            //jpeg
            case(2):
                if (!$gdInfo['JPEG Support'] && !$gdInfo['JPG Support']) {
                    throw new Exception('JPEG format not supported');
                }
                $imgGd = imagecreatefromJPEG( $img->getUrl() );
                break;
            //png
            case(3):
                if (!$gdInfo['PNG Support']) {
                    throw new Exception('PNG format not supported');
                }
                $imgGd = imagecreatefromPNG( $img->getUrl() );
                break;
            default:
                throw new Exception('Graphic format not supported');
                break;
        }

        imageCopyResampled(
            $this->out,
            $imgGd,
            $img->getX(),
            $img->getY(),
            0,
            0,
            $img->getWidth(),
            $img->getHeight(),
            $originWidth,
            $originHeight
        );
    }

    function addText(Text $text)
    {
        $words = explode(' ', $text->getText());
        $textNew = '';
        $lines = [];
        foreach ($words as $word) {
            $box = imagettfbbox($text->getFontSize(), 0, $text->getFontFile(), $textNew.' '.$word);

            if ($box[2] > $text->getWidth()) {
                $lines[] = trim($textNew);
                $textNew = $word;
            } else {
                $textNew .= " ".$word;
            }
        }

        if (!empty($textNew)) $lines[] = trim($textNew);

        if ($text->getTextAlign() == Text::TEXT_ALIGN_CENTER || $text->getTextAlign() == Text::TEXT_ALIGN_RIGHT) {
            foreach ($lines as &$line) {
                do {
                    $lineTem = ' ' . $line;
                    if ($text->getTextAlign() == Text::TEXT_ALIGN_CENTER) $lineTem .= ' ';

                    $lineBox = imagettfbbox($text->getFontSize(), 0, $text->getFontFile(), $lineTem);
                    $line = $lineTem;

                } while($lineBox[2] < $text->getWidth());
            }
            unset($line);
        }

        $textNew = implode("\n", $lines);
        unset($lines);

        $color = $this->color($text->getColor());

        $xText = $text->getX();
        $yText = $text->getY() + $text->getFontSize();

        imagettftext($this->out, $text->getFontSize(), 0, $xText, $yText, $color, $text->getFontFile(), $textNew);
    }

    function imageType($url)
    {
        if(function_exists( 'exif_imagetype')) {
            return exif_imagetype($url);
        }

        $arr_from_img = getimagesize($url);
        return $arr_from_img['2'];
    }
}