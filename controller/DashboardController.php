<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard - Manolo Bakes";
        $data['page_title'] = "Dashboard";
        $data['page_name'] = "Dashboard";
        $this->views->getView($this, "dashboard", $data);
    }
}
