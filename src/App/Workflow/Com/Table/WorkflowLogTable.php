<?php

namespace Nemundo\Workflow\App\Workflow\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;


class WorkflowLogTable extends AbstractHtmlContainerList
{


    // include itself and child of child


    /**
     * @var AbstractWorkflowProcess
     */
    public $process;

    /**
     * @var bool
     */
    public $showDraftColumn = true;

    /**
     * @var bool
     */
    public $showDataIdColumn = false;


    public function getHtml()
    {

        $title = new AdminSubtitle($this);
        $title->content = 'Log';

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Type');
        if ($this->showDraftColumn) {
            $header->addText('Entwurf');
        }
        $header->addText('Betreff');
        $header->addText('Mitarbeiter');
        $header->addText('Datum/Zeit');

        if ($this->showDataIdColumn) {
            $header->addText('Data Id');
        }

        foreach ($this->process->getChild() as $child) {

            $row = new TableRow($table);
            $row->addText($child->contentLabel);
            if ($this->showDraftColumn) {
                $row->addYesNo($child->isDraft());
            }

            $row->addText($child->getSubject());
            $row->addText($child->userCreated->displayName);
            $row->addText($child->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            if ($this->showDataIdColumn) {
                $row->addText($child->dataId);
            }

        }

        return parent::getHtml();

    }

}