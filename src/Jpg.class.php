<?php
namespace Deltamc\Graphic;

class Jpg extends GraphicGD
{
    public function save($file)
    {
        imagejpeg($this->out, $file, 100);
    }
}