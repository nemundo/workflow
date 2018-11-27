<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;

use Nemundo\Model\Id\AbstractModelIdValue;

class MessageDocumentId extends AbstractModelIdValue
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