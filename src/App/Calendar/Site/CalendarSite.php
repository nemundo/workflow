<?php

namespace Nemundo\Workflow\App\Calendar\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Type\UserSessionType;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Calendar\Data\Calendar\CalendarReader;

class CalendarSite extends AbstractSite
{

    /**
     * @var CalendarSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'Calendar';
        $this->title = 'Kalender';
        $this->url = 'calendar';
    }


    protected function registerSite()
    {
        CalendarSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $title = new AdminTitle($page);
        $title->content = $this->title;


        $row = new BootstrapRow($page);
        $col1 = new BootstrapColumn($row);
        $col1->columnWidth = 4;
        $col2 = new BootstrapColumn($row);
        $col2->columnWidth = 8;


        $list = new BootstrapHyperlinkList($col1);

        $site = clone(CalendarSite::$site);
        $site->title = (new UserSessionType())->displayName;
        $list->addSite($site);


        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            //    $this->filter->orEqual($this->model->identification, $usergroupId);
        }


        $table = new AdminClickableTable($col2);

        $header = new TableHeader($table);
        $header->addText('Datum');
        $header->addText('Was');
        $header->addText('Content Type');
        $header->addText('Identification Typ');
        $header->addText('Who');


        //$calendarReader = new CalendarIdentificationReader();

        $calendarReader = new CalendarReader();
        $calendarReader->model->loadContentType();
        $calendarReader->model->loadIdentificationType();


        $calendarReader->filter->orEqual($calendarReader->model->identificationId, (new UserSessionType())->userId);

        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $calendarReader->filter->orEqual($calendarReader->model->identificationId, $usergroupId);
        }


        foreach ($calendarReader->getData() as $calendarRow) {


            $contentType = $calendarRow->contentType->getContentTypeClassObject();

            $row = new BootstrapClickableTableRow($table);
            $row->addText($calendarRow->date->getShortDateLeadingZeroFormat());
            $row->addText($calendarRow->event);
            $row->addText($calendarRow->contentType->contentType);
            $row->addText($calendarRow->identificationType->identification);

            $identificationType = $calendarRow->identificationType->getIdentificationTypeClassObject();
            $row->addText($identificationType->getValue($calendarRow->identificationId));

            /*
            if ($contentType->viewSite !== null) {
                $row->addClickableSite($contentType->getViewSite($calendarRow->dataId));
            }*/


        }


        $page->render();


    }
}