<?php
/**
 * SiteController
 *
 * @author: Raysmond
 * @created: 2013-12-27
 */

class SiteController extends RController
{
    public function actionAbout()
    {
        $this->render("about");
    }

    public function actionContact()
    {
        $this->render("contact");
    }
} 