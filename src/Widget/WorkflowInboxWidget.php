<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;


class WorkflowInboxWidget extends AbstractAdminWidget
{

    protected function loadCom()
    {

        //$this->widgetTitle = 'Workflow Inbox';
        $this->widgetTitle = 'Aufgaben';
        $this->widgetSite = WorkflowInboxSite::$site;

        parent::loadCom();

    }

    public function getHtml()
    {

        $reader = new WorkflowInboxReader();

        $reader->addUserIdFilter((new UserInformation())->getUserId());
        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $reader->addUsergroupIdFilter($usergroupId);
        }

        $table = new BootstrapClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Erledigen bis');


        foreach ($reader->getData() as $workflowRow) {

            $number = $workflowRow->workflowNumber . ' (' . $workflowRow->process->process . ')';

            $statusText = $workflowRow->workflowStatus->workflowStatusText;

            // $workflowRow->workflowStatus->workflowStatus

            $row = new BootstrapClickableTableRow($table);

            $trafficLight = new DateTrafficLight($row);
            $trafficLight->date = $workflowRow->deadline;

            $row->addText($number);
            $row->addText($workflowRow->subject);
            $row->addText($statusText);

            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $site = $workflowRow->process->getProcessClassObject()->getApplicationSite();
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }

        return parent::getHtml();

    }

}