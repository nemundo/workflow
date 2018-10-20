<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class ImageContentTemplateTable extends BootstrapModelTable {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new ImageContentTemplateModel();
}
}