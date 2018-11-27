<?php

namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailValue extends \Nemundo\Model\Value\AbstractModelDataValue
{
    /**
     * @var MailModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MailModel();
    }
}