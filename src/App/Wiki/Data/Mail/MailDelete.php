<?php

namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailDelete extends \Nemundo\Model\Delete\AbstractModelDelete
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