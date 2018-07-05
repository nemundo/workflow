<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MessageTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTextModel();
}
}