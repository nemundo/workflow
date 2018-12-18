<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MailModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailModel();
}
}