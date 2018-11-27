<?php

namespace Nemundo\Workflow\App\Message\Data\Message;
class MessagePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var MessageModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageModel();
    }

    /**
     * @return MessageRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new MessageRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}