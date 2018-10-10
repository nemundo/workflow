<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentTextId extends AbstractModelIdValue {
/**
* @var ContentTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
}