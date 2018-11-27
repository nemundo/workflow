<?php

namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamModel extends \Nemundo\Model\Definition\Model\AbstractModel
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
     */
    public $contentTypeId;

    /**
     * @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
     */
    public $contentType;

    /**
     * @var \Nemundo\Model\Type\Id\UniqueIdType
     */
    public $dataId;

    /**
     * @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
     */
    public $dateTime;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $subject;

    /**
     * @var \Nemundo\Model\Type\Text\LargeTextType
     */
    public $message;

    protected function loadModel()
    {
        $this->tableName = "stream_stream";
        $this->aliasTableName = "stream_stream";
        $this->label = "Stream";

        $this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

        $this->id = new \Nemundo\Model\Type\Id\IdType($this);
        $this->id->tableName = "stream_stream";
        $this->id->fieldName = "id";
        $this->id->aliasFieldName = "stream_stream_id";
        $this->id->label = "Id";
        $this->id->allowNullValue = "";
        $this->id->visible->form = false;
        $this->id->visible->table = false;
        $this->id->visible->view = false;
        $this->id->visible->form = false;

        $this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
        $this->contentTypeId->tableName = "stream_stream";
        $this->contentTypeId->fieldName = "content_type";
        $this->contentTypeId->aliasFieldName = "stream_stream_content_type";
        $this->contentTypeId->label = "Content Type";
        $this->loadContentType();

        $this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
        $this->dataId->tableName = "stream_stream";
        $this->dataId->fieldName = "data_id";
        $this->dataId->aliasFieldName = "stream_stream_data_id";
        $this->dataId->label = "Data Id";
        $this->dataId->allowNullValue = "";
        $this->dataId->visible->form = false;
        $this->dataId->visible->table = false;
        $this->dataId->visible->view = false;
        $this->id->visible->form = false;

        $this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
        $this->dateTime->tableName = "stream_stream";
        $this->dateTime->fieldName = "date_time";
        $this->dateTime->aliasFieldName = "stream_stream_date_time";
        $this->dateTime->label = "Date Time";
        $this->dateTime->allowNullValue = "";
        $this->dateTime->visible->form = false;

        $this->subject = new \Nemundo\Model\Type\Text\TextType($this);
        $this->subject->tableName = "stream_stream";
        $this->subject->fieldName = "subject";
        $this->subject->aliasFieldName = "stream_stream_subject";
        $this->subject->label = "Subject";
        $this->subject->allowNullValue = "";
        $this->subject->length = 255;

        $this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
        $this->message->tableName = "stream_stream";
        $this->message->fieldName = "message";
        $this->message->aliasFieldName = "stream_stream_message";
        $this->message->label = "Message";
        $this->message->allowNullValue = "";

    }

    public function loadContentType()
    {
        if ($this->contentType == null) {
            $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "stream_stream_content_type");
            $this->contentType->tableName = "stream_stream";
            $this->contentType->fieldName = "content_type";
            $this->contentType->aliasFieldName = "stream_stream_content_type";
            $this->contentType->label = "Content Type";
        }
    }
}