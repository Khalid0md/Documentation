<?php
/**
 * Available global variables
 *
 * $BREADCRUMBS    Array<String>, Example ["cloud-platform","organizations","data-storage"]
 * $ANCHOR         String, Example "#remove-option-contract"
 * $DOCS_RESOURCES String path to the docs resources folder
 * $DOCS_ROOT      String path to the docs root folder
 *
 */

/**
 * Add if does not exist the a method to get the docs url key form the breadcrumbs
 */
if (!function_exists('DOCS_URL')) {

    /**
     * Example breadcrumb: ["cloud-platform","organizations","data-storage"]
     *
     * DOCS_URL() => "cloud-platform/organizations/data-storage"
     * DOCS_URL(0) => "cloud-platform"
     *
     * @return mixed
     */
    function DOCS_URL($key = null)
    {
        global $BREADCRUMBS;
        if ($key === null) {
            return join('/', $BREADCRUMBS);
        }
        return $BREADCRUMBS[$key];
    }
    
    /**
     * Export Vimeo Video Template
     */
    function DOCS_VIMEO($vimeoCode)
    {
        ?>
        <div class='sub-heading-content' data-bind='html: subheading.content'>
            <style>
                .videoWrapper {
                  position: relative;
                  padding-bottom: 56.25%; /* 16:9 */
                  height: 0;
                }
                .videoWrapper iframe {
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                }
            </style>
            <div class='videoWrapper'>
                <iframe src='https://player.vimeo.com/video/<?=$vimeoCode?>' width='640' height='360' frameborder='0' allow='autoplay; fullscreen' allowfullscreen=''></iframe>
            </div>
        </div>
        <?
    }
}

/**
 * Common Environment Variables
 */
$product = DOCS_URL(0);

$cloudPlatform      = $product == 'cloud-platform';
$writingAlgorithms  = $product == 'writing-algorithms';
$research           = $product == "research-environment";
$leanCli            = $product == "lean-cli";
$leanEngine         = $product == "lean-engine";
$localPlatform      = $product == "local-platform";

$kpi["dataset-size"]                   = "400TB";
$kpi["coarse-universe-size"]           = "10,000";
$kpi["fundamental-universe-size"]      = "5,000";
$kpi["live-algorithms-count"]          = "200,000";
$kpi["member-count"]                   = "220,000";
$kpi["us-equity-security-master-size"] = "30,000";
$kpi["volume-traded"]                  = "$22B";
   

