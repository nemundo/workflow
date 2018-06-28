<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StreamGroup MemberAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StreamGroup MemberModel
*/
public $model;

protected function loadSite() {
$this->model = new StreamGroup MemberModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}