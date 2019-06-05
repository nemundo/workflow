<?php

require '../../../../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


$layout = new \Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout($html);
$layout->col1->columnWidth = 2;
$layout->col2->columnWidth = 10;


$menu = new \Nemundo\Workflow\App\Workflow\Com\Menu\StatusMenuTable($layout->col1);

$menu->addActiveMenu('Choice1');
$menu->addActiveMenu('Choice2');
$menu->addNextMenu('Next1');
$menu->addNextMenu('Next2');

$html->render();
