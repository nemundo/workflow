<?php

namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfigForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm
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