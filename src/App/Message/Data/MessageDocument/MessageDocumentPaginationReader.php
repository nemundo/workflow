<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
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

    /**
     * @return MessageDocumentRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new MessageDocumentRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}