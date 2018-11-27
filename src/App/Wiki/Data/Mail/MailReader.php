<?php

namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var MailModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MailModel();
    }

    /**
     * @return MailRow[]
     */
    public function getData()
    {
        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = $this->getModelRow($dataRow);
            $list[] = $row;
        }
        return $list;
    }

    /**
     * @return MailRow
     */
    public function getRow()
    {
        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);
        $dataRow = parent::getRow();
        $row = $this->getModelRow($dataRow);
        return $row;
    }

    /**
     * @return MailRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new MailRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}