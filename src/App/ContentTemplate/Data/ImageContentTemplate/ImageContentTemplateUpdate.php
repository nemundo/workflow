<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageContentTemplateUpdate extends AbstractModelUpdate {
/**
* @var ImageContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageContentTemplateModel();
}
public function update() {
parent::update();
}
}