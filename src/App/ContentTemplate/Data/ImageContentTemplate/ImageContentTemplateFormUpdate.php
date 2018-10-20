<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
use Nemundo\Model\Form\ModelFormUpdate;
class ImageContentTemplateFormUpdate extends ModelFormUpdate {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new ImageContentTemplateModel();
}
}