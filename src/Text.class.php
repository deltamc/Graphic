<?php
namespace Deltamc\Graphic;

class Text extends Object
{
    protected $text;
    protected $color;
    protected $fontFile;
    protected $textAlign;
    protected $fontSize;
    protected $italic;
    protected $bold;

    const TEXT_ALIGN_LEFT   = 'left';
    const TEXT_ALIGN_RIGHT  = 'right';
    const TEXT_ALIGN_CENTER = 'center';


    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFontFile()
    {
        return $this->fontFile;
    }

    /**
     * @param mixed $fontFamily
     */
    public function setFontFile($fontFile)
    {
        $this->fontFile = $fontFile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextAlign()
    {
        return $this->textAlign;
    }

    /**
     * @param mixed $textAlign
     */
    public function setTextAlign($textAlign)
    {
        $this->textAlign = strtolower($textAlign);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFontSize()
    {
        return $this->fontSize;
    }

    /**
     * @param mixed $fontSize
     */
    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItalic()
    {
        return $this->italic;
    }

    /**
     * @param mixed $italic
     */
    public function setItalic($italic)
    {
        $this->italic = $italic;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBold()
    {
        return $this->bold;
    }

    /**
     * @param mixed $bold
     */
    public function setBold($bold)
    {
        $this->bold = $bold;
        return $this;
    }


}