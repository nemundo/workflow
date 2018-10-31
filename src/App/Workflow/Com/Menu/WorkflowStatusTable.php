<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\FontAwesome\Icon\ArrowRightIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Workflow\App\Wiki\Data\Hyperlink\Hyperlink;

class WorkflowStatusTable extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;

    /**
     * @var AdminTable
     */
    private $table;

    protected function loadCom()
    {
        $this->table = new AdminTable($this);
    }


    public function addLogWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
        // public function addLogWorkflowStatus(AbstractContentType $workflowStatus)
    {

        $row = new TableRow($this->table);

        new CheckIcon($row);

        //$row->addText($workflowStatus->getSubject());
        $row->addText($workflowStatus->contentLabel);


        $row->addText($workflowStatus->userCreated->displayName);
        $row->addText($workflowStatus->dateTimeCreated->getShortDateLeadingZeroFormat());

    }


    public function addActiveWorkflowStatus(AbstractWorkflowStatus $workflowStatus, $active)
    {

        $row = new TableRow($this->table);

        if ($active) {
            new ArrowRightIcon($row);
            $row->addBoldText($workflowStatus->contentLabel);
            //$row->addBoldText($workflowStatus->getSubject());
        } else {

            $row->addEmpty();

            $hyperlink = new SiteHyperlink($row);
            //$hyperlink->site = $this->process->getViewSite();
            $hyperlink->site = new Site();  // $this->process->getViewSite();
            //$hyperlink->site->title = $workflowStatus->getSubject();
            $hyperlink->site->title = $workflowStatus->contentLabel;
            $hyperlink->site->addParameter(new ContentTypeParameter($workflowStatus->contentId));
            //$hyperlink->site->title = $workflowStatus->contentLabel;

        }

        $row->addEmpty();
        $row->addEmpty();

    }


    public function addMenu()
    {


        if ($this->process->dataId !== null) {

            if ($this->process->getStatus()->hasMenuSite()) {

                $row = new TableRow($this->table);
                $row->addEmpty();

                $list = new UnorderedList($row);
                $list->addCssClass('no-bullet');


                foreach ($this->process->getStatus()->getMenuSite() as $site) {

                    if ($site->isActiveWorkflowStatus()) {
                        $list->addText((new ArrowRightIcon())->getHtmlString() . ' ' . $site->title);
                    } else {

                        $hyperlink = new SiteHyperlink($list);
                        $hyperlink->site = $site;
                    }
                }


                $row->addEmpty();
                $row->addEmpty();

            }
        }


    }


    public function addNextWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
        // public function addNextWorkflowStatus(AbstractContentType $workflowStatus)
    {

        if ($workflowStatus->showStatus) {

            $row = new TableRow($this->table);

            $row->addEmpty();
            //$row->addText($workflowStatus->contentLabel);
            $row->addText($workflowStatus->getSubject());
            $row->addEmpty();
            $row->addEmpty();

        }

    }

}