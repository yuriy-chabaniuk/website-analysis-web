<?php
/**
 * Created by: Yuriy Chabaniuk
 */


namespace App\Controllers;

use App\Core\Controller\Controller;


class ReportController extends Controller {

    private $client = null;

    public function __construct() {
        $client = curl_init();
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

        $this->client = $client;
    }

    public function __destruct() {
        curl_close($this->client);
    }

    public function hello() {

        return "<h1>Hooray</h1>";
    }

    public function report() {

        return $this->render('report', [
            'some' => 'Name'
        ]);
    }

    public function competitorReport() {
        return $this->render('competitor-report', [
            'some' => 'Name'
        ]);
    }

    public function getIndividualReport() {
        $request = $this->request->request;
        $url = $request->get('url');

        $analytics = [];
        if (!empty($url)) {
            $basicUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $url;

            $analytics = json_decode($this->doRequest($basicUrl));
        }

        return $this->json([
            'success' => true,
            'data' => [
                'analytics' => $analytics,
            ]
        ]);
    }

    public function getCompetitorReport() {
        $request = $this->request->request;

        $analyticsData = [];
        $topCompetitors = [];

        $url = $request->get('url');
        $competitorUrls = $request->get('competitors');
        if (!empty($url)) {
            $topCompetitors = $this->fetchCompetitorsInfo($url);

            $basicUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $url;

            $analytics = json_decode($this->doRequest($basicUrl));
            $analytics->url = $url;
            array_push($analyticsData, $analytics);
        }

        if (is_array($competitorUrls) && !empty($competitorUrls)) {
            foreach ($competitorUrls as $competitorUrl) {
                $basicUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $competitorUrl;

                $analytics = json_decode($this->doRequest($basicUrl));
                $analytics->url = $competitorUrl;

                array_push($analyticsData, $analytics);
            }
        }

        return $this->json([
            'success' => true,
            'data' => [
                'analytics' => $analyticsData,
                'topCompetitors' => $topCompetitors
            ]
        ]);
    }

    protected function doRequest($url) {
        if (is_null($this->client)) {
            $this->client = curl_init();
            curl_setopt($this->client, CURLOPT_RETURNTRANSFER, 1);
        }

        curl_setopt($this->client, CURLOPT_URL, $url);

        return curl_exec($this->client);
    }

    protected function fetchCompetitorsInfo($url) {
        // Fetch top organic competitors
        $organicCompetitorsUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/domain-competitors?url=" . $url . "&isOrganic=true";

        $topOrganicCompetitors = json_decode($this->doRequest($organicCompetitorsUrl));

        // Fetch top paid competitors

        $paidCompetitorsUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/domain-competitors?url=" . $url . "&isOrganic=false";
        $topPaidCompetitors = json_decode($this->doRequest($paidCompetitorsUrl));

        return [
            'organic' => $topOrganicCompetitors,
            'paid' => $topPaidCompetitors
        ];
    }
}