<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StreamGroupMemberAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StreamGroupMemberModel
*/
public $model;

protected function loadSite() {
$this->model = new StreamGroupMemberModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}