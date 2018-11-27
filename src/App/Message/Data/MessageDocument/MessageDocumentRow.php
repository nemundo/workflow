<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var MessageDocumentModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
     */
    public $document;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->document = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->document);
    }
}