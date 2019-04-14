<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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