<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfigDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MailConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailConfigModel();
}
}