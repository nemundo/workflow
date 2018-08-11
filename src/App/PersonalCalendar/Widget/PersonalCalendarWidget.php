<?php

namespace Nemundo\Workflow\App\PersonalCalendar\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarReader;
use Nemundo\Workflow\App\PersonalCalendar\Form\PersonalCalendarBuilderForm;

class PersonalCalendarWidget extends AbstractAdminWidget
{


    protected function loadWidget()
    {
        $this->widgetTitle = 'Personal Calendar';
        $this->widgetId = '';
    }


    public function getHtml()
    {

        $this->widgetTitle = 'Personal Calendar';

        new PersonalCalendarBuilderForm($this);

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Datum');
        $header->addText('Was');

        $reader = new PersonalCalendarReader();
        $reader->filter->andEqual($reader->model->userId, (new UserInformation())->getUserId());

        foreach ($reader->getData() as $calendarRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($calendarRow->date->getShortDateLeadingZeroFormat());
            $row->addText($calendarRow->subject);

        }


        return parent::getHtml();
    }

}