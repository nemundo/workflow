<?php

namespace Nemundo\Workflow\App\News\Data\News;
class NewsRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var NewsModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $text;

    /**
     * @var \Nemundo\Core\Type\DateTime\DateTime
     */
    public $dateTime;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->title = $this->getModelValue($model->title);
        $this->text = $this->getModelValue($model->text);
        $this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
    }
}