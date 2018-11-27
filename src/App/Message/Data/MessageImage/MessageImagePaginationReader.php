<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImagePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var MessageImageModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageImageModel();
    }

    /**
     * @return MessageImageRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new MessageImageRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}