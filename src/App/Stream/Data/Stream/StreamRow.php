<?php

namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var StreamModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
     */
    public $contentType;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var \Nemundo\Core\Type\DateTime\DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->contentTypeId = $this->getModelValue($model->contentTypeId);
        if ($model->contentType !== null) {
            $this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
        }
        $this->dataId = $this->getModelValue($model->dataId);
        $this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
        $this->subject = $this->getModelValue($model->subject);
        $this->message = $this->getModelValue($model->message);
    }

    private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model)
    {
        $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
    }
}