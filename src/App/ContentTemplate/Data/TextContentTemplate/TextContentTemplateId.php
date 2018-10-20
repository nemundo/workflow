<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextContentTemplateId extends AbstractModelIdValue {
/**
* @var TextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
}