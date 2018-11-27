<?php

namespace Nemundo\Workflow\App\Store\Data\TextStore;
class TextStoreRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var TextStoreModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $text;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->text = $this->getModelValue($model->text);
    }
}