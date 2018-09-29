<?php
namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
class MailConfigCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MailConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailConfigModel();
}
}