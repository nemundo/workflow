<?php

namespace Nemundo\Workflow\App\Wiki\Data\Mail;

use Nemundo\Model\Data\AbstractModelUpdate;

class MailUpdate extends AbstractModelUpdate
{
    /**
     * @var MailModel
     */
    public $model;

    /**
     * @var string
     */
    public $to;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $text;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MailModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->to, $this->to);
        $this->typeValueList->setModelValue($this->model->subject, $this->subject);
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        parent::update();
    }
}