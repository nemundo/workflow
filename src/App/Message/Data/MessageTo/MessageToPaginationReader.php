<?php

namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var MessageToModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageToModel();
    }

    /**
     * @return MessageToRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new MessageToRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}