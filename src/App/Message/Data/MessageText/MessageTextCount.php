<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MessageTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTextModel();
}
}