<?php

namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentModel extends \Nemundo\Model\Definition\Model\AbstractModel
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
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $subject;

    /**
     * @var \Nemundo\Model\Type\Text\LargeTextType
     */
    public $message;

    /**
     * @var \Nemundo\Workflow\App\Identification\Model\IdentificationModelType
     */
    public $assignment;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $assignmentText;

    /**
     * @var \Nemundo\Model\Type\DateTime\DateType
     */
    public $deadline;

    /**
     * @var \Nemundo\Model\Type\Id\UniqueIdType
     */
    public $dataId;

    /**
     * @var \Nemundo\Model\Type\Number\YesNoType
     */
    public $archive;

    /**
     * @var \Nemundo\Model\Type\User\CreatedUserType
     */
    public $userCreatedId;

    /**
     * @var \Nemundo\User\Data\User\UserExternalType
     */
    public $userCreated;

    /**
     * @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
     */
    public $dateTimeCreated;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $source;

    protected function loadModel()
    {
        $this->tableName = "assignment_assignment";
        $this->aliasTableName = "assignment_assignment";
        $this->label = "Assignment";

        $this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

        $this->id = new \Nemundo\Model\Type\Id\IdType($this);
        $this->id->tableName = "assignment_assignment";
        $this->id->fieldName = "id";
        $this->id->aliasFieldName = "assignment_assignment_id";
        $this->id->label = "Id";
        $this->id->allowNullValue = "";
        $this->id->visible->form = false;
        $this->id->visible->table = false;
        $this->id->visible->view = false;
        $this->id->visible->form = false;

        $this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
        $this->contentTypeId->tableName = "assignment_assignment";
        $this->contentTypeId->fieldName = "content_type";
        $this->contentTypeId->aliasFieldName = "assignment_assignment_content_type";
        $this->contentTypeId->label = "Content Type";
        $this->loadContentType();

        $this->subject = new \Nemundo\Model\Type\Text\TextType($this);
        $this->subject->tableName = "assignment_assignment";
        $this->subject->fieldName = "subject";
        $this->subject->aliasFieldName = "assignment_assignment_subject";
        $this->subject->label = "Betreff";
        $this->subject->allowNullValue = "";
        $this->subject->length = 255;

        $this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
        $this->message->tableName = "assignment_assignment";
        $this->message->fieldName = "message";
        $this->message->aliasFieldName = "assignment_assignment_message";
        $this->message->label = "Message";
        $this->message->allowNullValue = "";

        $this->assignment = new \Nemundo\Workflow\App\Identification\Model\IdentificationModelType($this);
        $this->assignment->tableName = "assignment_assignment";
        $this->assignment->fieldName = "assignment";
        $this->assignment->aliasFieldName = "assignment_assignment_assignment";
        $this->assignment->label = "Assignment";
        $this->assignment->allowNullValue = "";

        $this->assignmentText = new \Nemundo\Model\Type\Text\TextType($this);
        $this->assignmentText->tableName = "assignment_assignment";
        $this->assignmentText->fieldName = "assignment_text";
        $this->assignmentText->aliasFieldName = "assignment_assignment_assignment_text";
        $this->assignmentText->label = "Verantwortlicher";
        $this->assignmentText->allowNullValue = "";
        $this->assignmentText->length = 255;

        $this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
        $this->deadline->tableName = "assignment_assignment";
        $this->deadline->fieldName = "deadline";
        $this->deadline->aliasFieldName = "assignment_assignment_deadline";
        $this->deadline->label = "Erledigen bis";
        $this->deadline->allowNullValue = "";

        $this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
        $this->dataId->tableName = "assignment_assignment";
        $this->dataId->fieldName = "data_id";
        $this->dataId->aliasFieldName = "assignment_assignment_data_id";
        $this->dataId->label = "Data Id";
        $this->dataId->allowNullValue = "";
        $this->dataId->visible->form = false;
        $this->dataId->visible->table = false;
        $this->dataId->visible->view = false;
        $this->id->visible->form = false;

        $this->archive = new \Nemundo\Model\Type\Number\YesNoType($this);
        $this->archive->tableName = "assignment_assignment";
        $this->archive->fieldName = "archive";
        $this->archive->aliasFieldName = "assignment_assignment_archive";
        $this->archive->label = "Archive";
        $this->archive->allowNullValue = "";

        $this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType($this);
        $this->userCreatedId->tableName = "assignment_assignment";
        $this->userCreatedId->fieldName = "user_created";
        $this->userCreatedId->aliasFieldName = "assignment_assignment_user_created";
        $this->userCreatedId->label = "User Created";
        $this->loadUserCreated();

        $this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
        $this->dateTimeCreated->tableName = "assignment_assignment";
        $this->dateTimeCreated->fieldName = "date_time_created";
        $this->dateTimeCreated->aliasFieldName = "assignment_assignment_date_time_created";
        $this->dateTimeCreated->label = "Date Time Created";
        $this->dateTimeCreated->allowNullValue = "";
        $this->dateTimeCreated->visible->form = false;

        $this->source = new \Nemundo\Model\Type\Text\TextType($this);
        $this->source->tableName = "assignment_assignment";
        $this->source->fieldName = "source";
        $this->source->aliasFieldName = "assignment_assignment_source";
        $this->source->label = "Source";
        $this->source->allowNullValue = "";
        $this->source->length = 255;

    }

    public function loadContentType()
    {
        if ($this->contentType == null) {
            $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "assignment_assignment_content_type");
            $this->contentType->tableName = "assignment_assignment";
            $this->contentType->fieldName = "content_type";
            $this->contentType->aliasFieldName = "assignment_assignment_content_type";
            $this->contentType->label = "Content Type";
        }
    }

    public function loadUserCreated()
    {
        if ($this->userCreated == null) {
            $this->userCreated = new \Nemundo\User\Data\User\UserExternalType($this, "assignment_assignment_user_created");
            $this->userCreated->tableName = "assignment_assignment";
            $this->userCreated->fieldName = "user_created";
            $this->userCreated->aliasFieldName = "assignment_assignment_user_created";
            $this->userCreated->label = "User Created";
            $this->userCreated->visible->form = false;
        }
    }
}