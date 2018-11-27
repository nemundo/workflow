<?php

namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageModel extends \Nemundo\Model\Definition\Model\AbstractModel
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
     */
    public $toId;

    /**
     * @var \Nemundo\User\Data\User\UserExternalType
     */
    public $to;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $subject;

    /**
     * @var \Nemundo\Model\Type\Text\LargeTextType
     */
    public $text;

    /**
     * @var \Nemundo\Model\Type\Number\NumberType
     */
    public $count;

    protected function loadModel()
    {
        $this->tableName = "message_message";
        $this->aliasTableName = "message_message";
        $this->label = "Message";

        $this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

        $this->id = new \Nemundo\Model\Type\Id\IdType($this);
        $this->id->tableName = "message_message";
        $this->id->fieldName = "id";
        $this->id->aliasFieldName = "message_message_id";
        $this->id->label = "Id";
        $this->id->allowNullValue = "";
        $this->id->visible->form = false;
        $this->id->visible->table = false;
        $this->id->visible->view = false;
        $this->id->visible->form = false;

        $this->toId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
        $this->toId->tableName = "message_message";
        $this->toId->fieldName = "to";
        $this->toId->aliasFieldName = "message_message_to";
        $this->toId->label = "To";
        $this->loadTo();

        $this->subject = new \Nemundo\Model\Type\Text\TextType($this);
        $this->subject->tableName = "message_message";
        $this->subject->fieldName = "subject";
        $this->subject->aliasFieldName = "message_message_subject";
        $this->subject->label = "Subject";
        $this->subject->validation = true;
        $this->subject->allowNullValue = "";
        $this->subject->length = 255;

        $this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
        $this->text->tableName = "message_message";
        $this->text->fieldName = "text";
        $this->text->aliasFieldName = "message_message_text";
        $this->text->label = "Text";
        $this->text->allowNullValue = "";

        $this->count = new \Nemundo\Model\Type\Number\NumberType($this);
        $this->count->tableName = "message_message";
        $this->count->fieldName = "count";
        $this->count->aliasFieldName = "message_message_count";
        $this->count->label = "Count";
        $this->count->allowNullValue = "";
        $this->count->visible->form = false;
        $this->count->visible->table = false;
        $this->count->visible->view = false;

    }

    public function loadTo()
    {
        if ($this->to == null) {
            $this->to = new \Nemundo\User\Data\User\UserExternalType($this, "message_message_to");
            $this->to->tableName = "message_message";
            $this->to->fieldName = "to";
            $this->to->aliasFieldName = "message_message_to";
            $this->to->label = "To";
            $this->to->validation = true;
        }
    }
}