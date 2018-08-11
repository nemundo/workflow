<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
use Nemundo\Model\Site\AbstractModelAdminSite;
class FavoriteAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var FavoriteModel
*/
public $model;

protected function loadSite() {
$this->model = new FavoriteModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}