<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentDelete extends \Nemundo\Model\Delete\AbstractModelDelete
{
    /**
     * @var MessageDocumentModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageDocumentModel();
    }
}