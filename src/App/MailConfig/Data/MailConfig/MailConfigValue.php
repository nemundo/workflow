<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfigValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MailConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailConfigModel();
}
}