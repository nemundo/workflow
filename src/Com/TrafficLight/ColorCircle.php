<?php

namespace Nemundo\Workflow\Com\TrafficLight;


use Nemundo\Html\Block\Div;

class ColorCircle extends Div
{
    /**
     * @var int
     */
    public $size = 20;
    /**
     * @var string
     */
    public $color = TrafficLightColor::WHITE;

    public function getContent()
    {
        $style = 'background: ' . $this->color . ';border-radius: 50%;width: ' . $this->size . 'px;height: ' . $this->size . 'px; border-style: solid;border; border-width: 1px;';
        $this->addAttribute('style', $style);
        return parent::getContent();
    }
}