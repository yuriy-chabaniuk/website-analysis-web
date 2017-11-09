<?php
/**
 * Created by: Yuriy Chabaniuk
 */


namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ReportController {

    private $client = null;

    public function __construct() {
        $client = curl_init();
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

        $this->client = $client;
    }

    public function __destruct() {
        curl_close($this->client);
    }

    public function getIndividualReport(Request $request, Response $response) {
        $params = $request->getParsedBody();

        $url = $params['url'];
        if (!empty($url)) {
            $basicUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $url;

            $analytics = json_decode($this->doRequest($basicUrl));

            $keywordPlacementUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/keyword-search-results-paid?url={$url}";
            $keywordPlacement = json_decode($this->doRequest($keywordPlacementUrl));
        }

        return $response->withJson([
            'success' => true,
            'data' => [
                'analytics' => $analytics,
                'keywordPlacement' => $keywordPlacement
            ]
        ]);
    }

    public function getCompetitorReport(Request $request, Response $response) {
        $params = $request->getParsedBody();

        $analyticsData = [];
        $topCompetitors = [];

        $url = $params['url'];
        $competitorUrls = $params['competitors'];
        if (!empty($url)) {
            $topCompetitors = $this->fetchCompetitorsInfo($url);

            $basicUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $url;

            $analytics = json_decode($this->doRequest($basicUrl));
            $analytics->url = $url;
            array_push($analyticsData, $analytics);
        }

        if (is_array($competitorUrls) && !empty($competitorUrls)) {
            foreach ($competitorUrls as $competitorUrl) {
                if (!empty($competitorUrl)) {
                    $basicUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/basic?url=" . $competitorUrl;

                    $analytics = json_decode($this->doRequest($basicUrl));
                    $analytics->url = $competitorUrl;

                    array_push($analyticsData, $analytics);
                }
            }
        }

        return $response->withJson([
            'success' => true,
            'data' => [
                'analytics' => $analyticsData,
                'topCompetitors' => $topCompetitors
            ]
        ], 200);
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

        $topOrganicCompetitors = array_map(function ($item) {
            $item->overlap = round($item->overlap, 2);

            return $item;
        }, json_decode($this->doRequest($organicCompetitorsUrl)));

        // Fetch top paid competitors

        $paidCompetitorsUrl = "https://c5wjveoci2.execute-api.us-east-1.amazonaws.com/beta/domain-competitors?url=" . $url . "&isOrganic=false";
        $topPaidCompetitors = array_map(function ($item) {
            $item->overlap = round($item->overlap, 2);

            return $item;
        }, json_decode($this->doRequest($paidCompetitorsUrl)));


        return [
            'organic' => $topOrganicCompetitors,
            'paid' => $topPaidCompetitors
        ];
    }
}