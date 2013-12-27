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

    public function actionException(Exception $e)
    {
        if ($e->getCode() == 404 || $e instanceof RPageNotFoundException) {
            $this->render("404");
        }
        if (Rays::app()->isDebug())
            print $e;
        else
            $this->render("exception", array("message" => $e->getMessage(), "code" => $e->getCode()));
    }
}
