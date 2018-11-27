<?php

namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;

use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;

class MailConfigTable extends BootstrapModelTable
{
    /**
     * @var MailConfigModel
     */
    public $model;

    protected function loadCom()
    {
        $this->model = new MailConfigModel();
    }
}