<?php

namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarExternalType extends \Nemundo\Model\Type\External\ExternalType
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
     * @var \Nemundo\Model\Type\Id\IdType
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
     * @var \Nemundo\Model\Type\Id\IdType
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

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->externalModelClassName = CalendarModel::class;
        $this->externalTableName = "calendar_calendar";
        $this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id = new \Nemundo\Model\Type\Id\IdType();
        $this->id->fieldName = "id";
        $this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
        $this->id->label = "Id";
        $this->addType($this->id);

        $this->date = new \Nemundo\Model\Type\DateTime\DateType();
        $this->date->fieldName = "date";
        $this->date->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->date->aliasFieldName = $this->date->tableName . "_" . $this->date->fieldName;
        $this->date->label = "Date";
        $this->addType($this->date);

        $this->event = new \Nemundo\Model\Type\Text\TextType();
        $this->event->fieldName = "event";
        $this->event->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->event->aliasFieldName = $this->event->tableName . "_" . $this->event->fieldName;
        $this->event->label = "Event";
        $this->addType($this->event);

        $this->identificationTypeId = new \Nemundo\Model\Type\Id\IdType();
        $this->identificationTypeId->fieldName = "identification_type";
        $this->identificationTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->identificationTypeId->aliasFieldName = $this->identificationTypeId->tableName . "_" . $this->identificationTypeId->fieldName;
        $this->identificationTypeId->label = "Identification Type";
        $this->addType($this->identificationTypeId);

        $this->identificationId = new \Nemundo\Model\Type\Id\UniqueIdType();
        $this->identificationId->fieldName = "identification_id";
        $this->identificationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->identificationId->aliasFieldName = $this->identificationId->tableName . "_" . $this->identificationId->fieldName;
        $this->identificationId->label = "Identification Id";
        $this->addType($this->identificationId);

        $this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
        $this->contentTypeId->fieldName = "content_type";
        $this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName . "_" . $this->contentTypeId->fieldName;
        $this->contentTypeId->label = "Content Type";
        $this->addType($this->contentTypeId);

        $this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
        $this->dataId->fieldName = "data_id";
        $this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
        $this->dataId->label = "Data Id";
        $this->addType($this->dataId);

    }

    public function loadIdentificationType()
    {
        if ($this->identificationType == null) {
            $this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType(null, $this->parentFieldName . "_identification_type");
            $this->identificationType->fieldName = "identification_type";
            $this->identificationType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
            $this->identificationType->aliasFieldName = $this->identificationType->tableName . "_" . $this->identificationType->fieldName;
            $this->identificationType->label = "Identification Type";
            $this->addType($this->identificationType);
        }
        return $this;
    }

    public function loadContentType()
    {
        if ($this->contentType == null) {
            $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
            $this->contentType->fieldName = "content_type";
            $this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
            $this->contentType->aliasFieldName = $this->contentType->tableName . "_" . $this->contentType->fieldName;
            $this->contentType->label = "Content Type";
            $this->addType($this->contentType);
        }
        return $this;
    }
}