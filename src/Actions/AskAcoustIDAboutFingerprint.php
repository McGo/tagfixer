<?php

namespace McGo\TagFixer\Actions;

use GuzzleHttp\Client;
use McGo\TagFixer\Classes\FileInformation;

class AskAcoustIDAboutFingerprint
{
    protected $apiUrl = 'https://api.acoustid.org/v2/lookup';

    public function execute(FileInformation $fileInformation)
    {
        $apitoken = config('tagfixer.apikey');
        $url = $this->apiUrl.'?format=json&client='.$apitoken.'&meta=recordings+releases&duration='.$fileInformation->duration.'&fingerprint='.$fileInformation->fingerprint;
        $client = new Client();
        $response = $client->get($url);
        $json = $response->getBody()->getContents();

        $data = json_decode($json);
        $fileInformation->parseAcoustIDData($data);
        return $fileInformation;
    }
}
