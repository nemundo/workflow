<?php

namespace Nemundo\Workflow\App\PersonalTask\ContentItem;


use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\Workflow\App\PersonalTask\Site\PersonalTaskStatusChangeSite;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentItem;


class PersonalTaskContentItem extends ProcessContentItem
{


    public function getHtml()
    {

        $this->showBaseData = false;

        $personalTaskRow = (new PersonalTaskReader())->getRowById($this->dataId);

        //$this->workflowId = $personalTaskRow->workflowId;
        $this->statusChangeRedirectSite = PersonalTaskStatusChangeSite::$site;

        return parent::getHtml();

    }


    /*
    $workflow = new WorkflowContentItem($page);
    $workflow->showBaseData = false;
    $workflow->workflowId = $personalTaskRow->workflowId;
    $workflow->statusChangeRedirectSite = PersonalTaskStatusChangeSite::$site;*/


}