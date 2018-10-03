<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Model\Id\AbstractModelIdValue;
class FileId extends AbstractModelIdValue {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
}