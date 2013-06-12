<?php
/**
 *
 * @author Konrad Turczynski <konrad.turczynski@schibsted.pl>
 */
namespace Dashboard\Controller;

use Dashboard\Model\DashboardManager;
use Whoops\Example\Exception;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class DashboardController extends AbstractActionController {
    /**
     * Renders page with dashboard skeleton.
     *
     * @throws \Whoops\Example\Exception
     * @return array|void
     */
    public function dashboardAction() {
        $configName = $this->params()->fromRoute('configName');

        $dashboardManager = new DashboardManager($configName, $this->serviceLocator);

        // TODO: konradt ->  prepare data for ViewModel

        return new ViewModel(array());
    }
}