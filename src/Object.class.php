<?php
namespace Deltamc\Graphic;

abstract class Object
{
    private $x;
    private $y;
    private $z;
    private $width;
    private $height;
    /**
     * Кординат X
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Кординат X
     * @param $x
     * @return $this
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Кординат Y
     * @return integer
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Кординат Y
     * @param integer $y
     * @return $this
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * z-index
     * @return mixed
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * z-index
     * @param integer $z
     * @return $this
     */
    public function setZ($z)
    {
        $this->z = $z;

        return $this;
    }

    /**
     * Ширена
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Ширена
     * @param integer $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Высота
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Высота
     * @param integer $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }


}