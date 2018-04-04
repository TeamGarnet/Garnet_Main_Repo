<?php
include_once 'data/TrailData.class.php';
include_once 'models/TrailObject.class.php';

class TrailService {


    public function __construct() {
    }


    public function getAllTrailLocationInfo() {
        $trailDataClass = new TrailData();
        $allTrailData = $trailDataClass -> getAllTrailLocations();

        $allTrailObjects = array();

        foreach ($allTrailData as $trailArray) {
            $trailObject = new TrailObject($trailArray['idWiderAreaMap'], $trailArray['name'], stripcslashes($trailArray['description']), $trailArray['url'], $trailArray['longitude'], $trailArray['address'], $trailArray['city'], $trailArray['state'], $trailArray['zipcode']);

            array_push($allTrailObjects, $trailObject);
        }
        return $allTrailObjects;
    }

    public function formatTrailLocationsInfo() {
        $allTrailObjectsInfo = $this -> getAllTrailLocationInfo();
        $formattedTrailLocationInfo = "";

        foreach ($allTrailObjectsInfo as $trailObjectInfo) {
            $formattedTrailLocationInfo .= '<div style="margin-top: 4%; text-align:left;" class="locationContainer col-xs-12 col-sm-6 col-md-6 col-lg-6"><div id=""><div class="locationInfo"><p class="locationDescription">'
                . $trailObjectInfo -> getLineColor() . '</p><p class="locationName">'
                . $trailObjectInfo -> getName() . '</p><p style="text-align: left; class="locationDescription">'
                . $trailObjectInfo -> getDescription() . '</p><p style="text-align: left; class="locationDescription">Address: '
                . $trailObjectInfo->getAddress() .","
                . $trailObjectInfo->getCity() . " "
                . $trailObjectInfo->getState() . " "
                . $trailObjectInfo->getZipcode() . '</p><a href="'
                . $trailObjectInfo -> getUrl() . '" class="locationURL">Visit Site</a><hr class="style17"></div></div></div>';
        };


        return $formattedTrailLocationInfo;
    }

}