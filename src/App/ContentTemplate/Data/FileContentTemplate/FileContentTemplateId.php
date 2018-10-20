<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
use Nemundo\Model\Id\AbstractModelIdValue;
class FileContentTemplateId extends AbstractModelIdValue {
/**
* @var FileContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
}
}