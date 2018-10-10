<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
}