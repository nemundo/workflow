<?php

namespace Nemundo\Workflow\App\Workflow\Com\Doc;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;


class ProcessDoc extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public function getHtml()
    {


        $title = new AdminSubtitle($this);
        $title->content = 'Doc: ' . $this->process->name;


        $list = new UnorderedList($this);

        $status = $this->process->getStartWorkflowStatus();
        $list->addText($status->name);

        foreach ($status->getFollowingContentTypeList() as $nextStatus) {
            $list->addText($nextStatus->name);
        }

        return parent::getHtml();

    }

}