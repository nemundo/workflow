<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
use Nemundo\Design\Bootstrap\Admin\BootstrapModelAdmin;
use Nemundo\Web\Action\ActionUrl;
use Nemundo\Com\Html\Basic\H3;
use Nemundo\Design\Bootstrap\Button\BootstrapButton;
use Nemundo\Model\Admin\Redirect\ModelDeleteRedirect;
use Nemundo\Model\Admin\Redirect\ModelEditRedirect;
use Nemundo\Web\Http\HttpRequest;
class TaskAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TaskModel();
}
}