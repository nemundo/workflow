<?php

namespace Nemundo\Workflow\App\Workflow\Com\Title;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class ProcessTitle extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public function getHtml()
    {

        $title = new AdminSubtitle($this);
        $title->content = $this->process->contentName;

        $p = new Paragraph($this);
        $p->content = $this->process->description;

        return parent::getHtml();

    }

}