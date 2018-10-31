<?php

namespace Nemundo\Workflow\App\Workflow\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;


class WorkflowHistoryTable extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;


    public function getHtml()
    {

        $title = new AdminSubtitle($this);
        $title->content = 'History';

        $table = new AdminTable($this);

        $header = new TableHeader($table);

        $header->addText('Betreff');
        $header->addText('Mitarbeiter');
        $header->addText('Datum/Zeit');


        foreach ($this->process->getChild() as $child) {

            if ($child->showLog) {

                $row = new TableRow($table);

                $row->addText($child->getSubject());
                $row->addText($child->userCreated->displayName);
                $row->addText($child->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            }

        }

        return parent::getHtml();

    }

}