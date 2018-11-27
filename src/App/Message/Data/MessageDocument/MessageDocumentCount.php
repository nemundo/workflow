<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentCount extends \Nemundo\Model\Count\AbstractModelDataCount
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