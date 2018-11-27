<?php

namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarModel extends \Nemundo\Model\Definition\Model\AbstractModel
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\DateTime\DateType
     */
    public $date;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $event;

    /**
     * @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
     */
    public $identificationTypeId;

    /**
     * @var \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType
     */
    public $identificationType;

    /**
     * @var \Nemundo\Model\Type\Id\UniqueIdType
     */
    public $identificationId;

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

    protected function loadModel()
    {
        $this->tableName = "calendar_calendar";
        $this->aliasTableName = "calendar_calendar";
        $this->label = "Calendar";

        $this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

        $this->id = new \Nemundo\Model\Type\Id\IdType($this);
        $this->id->tableName = "calendar_calendar";
        $this->id->fieldName = "id";
        $this->id->aliasFieldName = "calendar_calendar_id";
        $this->id->label = "Id";
        $this->id->allowNullValue = "";
        $this->id->visible->form = false;
        $this->id->visible->table = false;
        $this->id->visible->view = false;
        $this->id->visible->form = false;

        $this->date = new \Nemundo\Model\Type\DateTime\DateType($this);
        $this->date->tableName = "calendar_calendar";
        $this->date->fieldName = "date";
        $this->date->aliasFieldName = "calendar_calendar_date";
        $this->date->label = "Date";
        $this->date->allowNullValue = "";

        $this->event = new \Nemundo\Model\Type\Text\TextType($this);
        $this->event->tableName = "calendar_calendar";
        $this->event->fieldName = "event";
        $this->event->aliasFieldName = "calendar_calendar_event";
        $this->event->label = "Event";
        $this->event->allowNullValue = "";
        $this->event->length = 255;

        $this->identificationTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
        $this->identificationTypeId->tableName = "calendar_calendar";
        $this->identificationTypeId->fieldName = "identification_type";
        $this->identificationTypeId->aliasFieldName = "calendar_calendar_identification_type";
        $this->identificationTypeId->label = "Identification Type";

        $this->identificationId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
        $this->identificationId->tableName = "calendar_calendar";
        $this->identificationId->fieldName = "identification_id";
        $this->identificationId->aliasFieldName = "calendar_calendar_identification_id";
        $this->identificationId->label = "Identification Id";
        $this->identificationId->allowNullValue = "";
        $this->identificationId->visible->form = false;
        $this->identificationId->visible->table = false;
        $this->identificationId->visible->view = false;
        $this->id->visible->form = false;

        $this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
        $this->contentTypeId->tableName = "calendar_calendar";
        $this->contentTypeId->fieldName = "content_type";
        $this->contentTypeId->aliasFieldName = "calendar_calendar_content_type";
        $this->contentTypeId->label = "Content Type";

        $this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
        $this->dataId->tableName = "calendar_calendar";
        $this->dataId->fieldName = "data_id";
        $this->dataId->aliasFieldName = "calendar_calendar_data_id";
        $this->dataId->label = "Data Id";
        $this->dataId->allowNullValue = "";
        $this->dataId->visible->form = false;
        $this->dataId->visible->table = false;
        $this->dataId->visible->view = false;
        $this->id->visible->form = false;

        $index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
        $index->addType($this->identificationId);

    }

    public function loadIdentificationType()
    {
        if ($this->identificationType == null) {
            $this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType($this, "calendar_calendar_identification_type");
            $this->identificationType->tableName = "calendar_calendar";
            $this->identificationType->fieldName = "identification_type";
            $this->identificationType->aliasFieldName = "calendar_calendar_identification_type";
            $this->identificationType->label = "Identification Type";
        }
    }

    public function loadContentType()
    {
        if ($this->contentType == null) {
            $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "calendar_calendar_content_type");
            $this->contentType->tableName = "calendar_calendar";
            $this->contentType->fieldName = "content_type";
            $this->contentType->aliasFieldName = "calendar_calendar_content_type";
            $this->contentType->label = "Content Type";
        }
    }
}