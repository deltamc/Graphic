<?php
namespace deltamc\graphic;

class png extends GraphicGD
{
    public function save($file)
    {
        imagepng($this->out, $file, 9);
    }
}