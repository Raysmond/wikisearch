<?php
/**
 * SearchController
 *
 * @author: Raysmond
 * @created: 2013-12-27
 */

class SearchController extends RController
{
    public function actionIndex()
    {
        $query = Rays::getParam("query", null);
        if ($query != null && ($query = trim($query)) != "") {
            $apiUrl = "http://localhost:8080/WikiSearch/SearchServlet?query=" . $query;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $json = curl_exec($ch);
            $result = json_decode($json);
            $this->render("query", array("query" => $query, "result" => $result));
        } else
            $this->render("index");
    }
} 