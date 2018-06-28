<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Model\Id\AbstractModelIdValue;
class StreamTypeId extends AbstractModelIdValue {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
}