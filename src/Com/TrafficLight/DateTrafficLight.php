<?php

namespace Nemundo\Workflow\Com\TrafficLight;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Core\Type\DateTime\Date;

class DateTrafficLight extends AbstractHtmlContainer
{

    /**
     * @var Date
     */
    public $date;

    public function getHtml()
    {

        //$circle = new ColorCircle($this);

        if ($this->date !== null) {

            $circle = new ColorCircle($this);
            if ($this->date < ((new Date())->setNow())) {
                $circle->color = '#FF0000';
            }
        }

        return parent::getHtml();
    }


}