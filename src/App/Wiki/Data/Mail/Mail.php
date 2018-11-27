<?php

namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class Mail extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var MailModel
     */
    protected $model;

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

    public function save()
    {
        $this->typeValueList->setModelValue($this->model->to, $this->to);
        $this->typeValueList->setModelValue($this->model->subject, $this->subject);
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        $id = parent::save();
        return $id;
    }
}