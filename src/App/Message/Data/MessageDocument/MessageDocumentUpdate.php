<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;

use Nemundo\Model\Data\AbstractModelUpdate;

class MessageDocumentUpdate extends AbstractModelUpdate
{
    /**
     * @var MessageDocumentModel
     */
    public $model;

    /**
     * @var \Nemundo\Model\Data\Property\File\FileDataProperty
     */
    public $document;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageDocumentModel();
        $this->document = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->document, $this->typeValueList);
    }

    public function update()
    {
        parent::update();
    }
}