<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Model\Id\AbstractModelIdValue;
class StreamGroupId extends AbstractModelIdValue {
/**
* @var StreamGroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
}