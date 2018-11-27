<?php

namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var MessageItemModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $messageId;

    /**
     * @var \Nemundo\Workflow\App\Message\Data\Message\MessageRow
     */
    public $message;

    /**
     * @var string
     */
    public $userCreatedId;

    /**
     * @var \Nemundo\User\Data\User\UserRow
     */
    public $userCreated;

    /**
     * @var \Nemundo\Core\Type\DateTime\DateTime
     */
    public $dateTimeCreated;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
     */
    public $contentType;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->messageId = $this->getModelValue($model->messageId);
        if ($model->message !== null) {
            $this->loadNemundoWorkflowAppMessageDataMessageMessagemessageRow($model->message);
        }
        $this->userCreatedId = $this->getModelValue($model->userCreatedId);
        if ($model->userCreated !== null) {
            $this->loadNemundoUserDataUserUseruserCreatedRow($model->userCreated);
        }
        $this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
        $this->dataId = $this->getModelValue($model->dataId);
        $this->contentTypeId = $this->getModelValue($model->contentTypeId);
        if ($model->contentType !== null) {
            $this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
        }
    }

    private function loadNemundoWorkflowAppMessageDataMessageMessagemessageRow($model)
    {
        $this->message = new \Nemundo\Workflow\App\Message\Data\Message\MessageRow($this->row, $model);
    }

    private function loadNemundoUserDataUserUseruserCreatedRow($model)
    {
        $this->userCreated = new \Nemundo\User\Data\User\UserRow($this->row, $model);
    }

    private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model)
    {
        $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
    }
}