<?php

namespace Nemundo\Workflow\App\MailConfig\Data;

use Nemundo\Model\Collection\AbstractModelCollection;

class MailConfigCollection extends AbstractModelCollection
{
    protected function loadCollection()
    {
        $this->addModel(new \Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigModel());
    }
}