<?php

namespace Nemundo\Workflow\App\Calendar\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Workflow\App\Calendar\Site\CalendarSite;


class CalendarWidget extends AbstractAdminWidget
{


    protected function loadWidget()
    {
        $this->widgetTitle = 'Kalender';
        $this->widgetId = '';
    }

    protected function loadCom()
    {
        $this->widgetSite = CalendarSite::$site;
        parent::loadCom();


    }

    public function getHtml()
    {

        $this->widgetTitle = 'Kalender';

        /*
                $table = new AdminClickableTable($this);

                $header = new TableHeader($table);
                $header->addText('Datum/Zeit');
                $header->addText('Betreff');

                $calendarReader = new CalendarIdentificationReader();
                //$calendarReader->filter->andEqual($calendarReader->model->userId, (new UserSessionType())->userId);
                //$calendarReader->filter->andEqualOrGreater($calendarReader->model->date, (new Date())->setNow()->getDbFormat());
                $calendarReader->addOrder($calendarReader->model->date);

                //$calendarReader->limit = 5;

                foreach ($calendarReader->getData() as $calendarRow) {

                    $row = new BootstrapClickableTableRow($table);

                    $datum = $calendarRow->date->getShortDateLeadingZeroFormat();

                    $subject = $calendarRow->event;


                    $row->addText($datum);
                    $row->addText($subject);

                    /*
                    $type = $calendarRow->applicationType->getApplicationTypeClassNameObject();

                    if ($type !== null) {

                        if ($type->site !== null) {

                            $site = clone($type->site);
                            $parameter = clone($type->parameter);
                            $parameter->setValue($calendarRow->dataId);
                            $site->addParameter($parameter);
                            $row->addClickableSite($site);

                        }

                    }*/

        // }

        return parent::getHtml();

    }

}