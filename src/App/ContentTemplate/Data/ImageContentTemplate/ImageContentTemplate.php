<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplate extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageContentTemplateModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new ImageContentTemplateModel();
}
public function save() {
$id = parent::save();
return $id;
}
}