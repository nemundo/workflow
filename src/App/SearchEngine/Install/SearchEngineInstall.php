<?php
namespace Nemundo\Workflow\App\SearchEngine\Install;
use Nemundo\App\Script\Type\AbstractScript;
class SearchEngineInstall extends AbstractScript {
protected function loadScript() {
$this->scriptName = "searchengine-install";
$this->consoleScript= true;
}
public function run() {
}
}