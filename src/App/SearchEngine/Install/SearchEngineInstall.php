<?php
namespace Nemundo\Workflow\App\SearchEngine\Install;
use Nemundo\Dev\Script\AbstractScript;
class SearchEngineInstall extends AbstractScript {
protected function loadScript() {
$this->scriptName = "searchengine-install";
$this->consoleScript= true;
}
public function run() {
}
}