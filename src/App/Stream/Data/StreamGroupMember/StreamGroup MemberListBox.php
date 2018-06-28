<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamGroup MemberModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroup MemberModel();
$this->label = $this->model->label;
}
}