<?php
/**
 *
 */

class ExtController_Ext Extends Controller_Base
{

    public function index()
    {
    }

    public function manager_tree()
    {
        $template = $this->createTemplate();
        $template->render();
    }
}

?>
