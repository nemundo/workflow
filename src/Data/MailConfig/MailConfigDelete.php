<?php
namespace Nemundo\Workflow\Data\MailConfig;
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