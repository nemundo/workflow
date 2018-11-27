<?php

namespace Nemundo\Workflow\App\Workflow\Data;

use Nemundo\Model\Collection\AbstractModelCollection;

class WorkflowCollection extends AbstractModelCollection
{
    protected function loadCollection()
    {
        $this->addModel(new \Nemundo\Workflow\App\Workflow\Data\MailConfig\MailConfigModel());
        $this->addModel(new \Nemundo\Workflow\App\Workflow\Data\Process\ProcessModel());
        $this->addModel(new \Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeModel());
        $this->addModel(new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowModel());
    }
}