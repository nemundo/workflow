<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
use Nemundo\Model\Id\AbstractModelIdValue;
class MailId extends AbstractModelIdValue {
/**
* @var MailModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailModel();
}
}