<?php

namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var CalendarModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new CalendarModel();
        $this->label = $this->model->label;
    }
}