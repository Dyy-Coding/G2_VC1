<?php

class SettingController extends BaseController {

    private $todayMoneyModel;



    public function __construct() {
        $this->todayMoneyModel = new TodayMoneyModel();
   
    }

    // Format currency or numerical values with decimal precision


    public function settingManagement() {
        try {
 
   

        

         

        
            $workers = $this->todayMoneyModel->getAllWorkers();
        

            // --- Prepare data for the view --- 
            $viewData = [

                'workers'                    => $workers,
   
                // Add last month's sales summary to the view
            ];

            // Render the dashboard view
            $this->renderView('adminView/setting/setting', $viewData);

        } catch (Exception $e) {
            error_log("Error in DashboardController - " . $e->getMessage());
            $this->renderView('errorPage', ['message' => "An error occurred while loading the dashboard. Please try again later."]);
        }
    }

}
