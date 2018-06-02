<?php

namespace Nemundo\Workflow\Com\TrafficLight;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Core\Type\DateTime\Date;

class DateTrafficLight extends AbstractHtmlContainerList
{

    /**
     * @var Date
     */
    public $date;

    public function getHtml()
    {

        $circle = new ColorCircle($this);

        if ($this->date !== null) {
            if ($this->date < ((new Date())->setNow())) {
                $circle->color = '#FF0000';
            }
        }

        return parent::getHtml();
    }


}