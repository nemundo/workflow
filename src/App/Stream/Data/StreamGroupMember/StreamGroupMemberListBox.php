<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamGroupMemberModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroupMemberModel();
$this->label = $this->model->label;
}
}