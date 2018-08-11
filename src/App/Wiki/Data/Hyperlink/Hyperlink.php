<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class Hyperlink extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var HyperlinkModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$id = parent::save();
return $id;
}
}