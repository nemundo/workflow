<?php

namespace Nemundo\Workflow\App\Stream\Data\Stream;

use Nemundo\Model\Data\AbstractModelUpdate;

class StreamUpdate extends AbstractModelUpdate
{
    /**
     * @var StreamModel
     */
    public $model;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    public function __construct()
    {
        parent::__construct();
        $this->model = new StreamModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        $this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
        $this->typeValueList->setModelValue($this->model->subject, $this->subject);
        $this->typeValueList->setModelValue($this->model->message, $this->message);
        parent::update();
    }
}