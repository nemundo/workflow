<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ImageContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageContentTemplateModel();
}
}