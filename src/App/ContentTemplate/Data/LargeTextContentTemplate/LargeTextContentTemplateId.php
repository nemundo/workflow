<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Model\Id\AbstractModelIdValue;
class LargeTextContentTemplateId extends AbstractModelIdValue {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextContentTemplateModel();
}
}