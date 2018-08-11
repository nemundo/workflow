<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
use Nemundo\Model\Data\AbstractModelUpdate;
class HyperlinkUpdate extends AbstractModelUpdate {
/**
* @var HyperlinkModel
*/
public $model;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $url;

public function __construct() {
parent::__construct();
$this->model = new HyperlinkModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->url, $this->url);
parent::update();
}
}