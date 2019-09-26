<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Web\EmailType
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

protected function loadModel() {
$this->tableName = "wiki_mail";
$this->aliasTableName = "wiki_mail";
$this->label = "Mail";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_mail";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_mail_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->to = new \Nemundo\Model\Type\Web\EmailType($this);
$this->to->tableName = "wiki_mail";
$this->to->fieldName = "to";
$this->to->aliasFieldName = "wiki_mail_to";
$this->to->label = "To";
$this->to->allowNullValue = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "wiki_mail";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "wiki_mail_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "wiki_mail";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "wiki_mail_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;

}
}