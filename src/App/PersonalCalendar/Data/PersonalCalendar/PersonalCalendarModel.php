<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $subject;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "personal_calendar_personal_calendar";
$this->aliasTableName = "personal_calendar_personal_calendar";
$this->label = "PersonalCalendar";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "personal_calendar_personal_calendar";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "personal_calendar_personal_calendar_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->date = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->date->tableName = "personal_calendar_personal_calendar";
$this->date->fieldName = "date";
$this->date->aliasFieldName = "personal_calendar_personal_calendar_date";
$this->date->label = "Date";
$this->date->validation = true;
$this->date->allowNullValue = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "personal_calendar_personal_calendar";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "personal_calendar_personal_calendar_subject";
$this->subject->label = "Subject";
$this->subject->validation = true;
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "personal_calendar_personal_calendar";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "personal_calendar_personal_calendar_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "personal_calendar_personal_calendar_user");
$this->user->tableName = "personal_calendar_personal_calendar";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "personal_calendar_personal_calendar_user";
$this->user->label = "User";
$this->user->visible->form = false;
}
return $this;
}
}