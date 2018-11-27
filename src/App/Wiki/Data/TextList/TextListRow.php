<?php

namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var TextListModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    public $text;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->dataId = $this->getModelValue($model->dataId);
        $this->text = $this->getModelValue($model->text);
    }
}