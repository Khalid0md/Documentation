<p>We model buying power and margin calls to ensure your algorithm stays within the margin requirements.</p>

<h4>Buying Power</h4>
<p>Kraken allows 1x leverage for most trades done in margin accounts. The following table shows pairs that have additional leverage available:<br></p> 



<?php 
echo file_get_contents(DOCS_RESOURCES."/brokerages/kraken-buying-power.html");
include(DOCS_RESOURCES."/brokerages/margin-calls.html"); 
?>

<p>For default buying power and margin rate models, see <a href="/docs/v2/writing-algorithms/reality-modeling/brokerages/supported-models/kraken#05-Buying-Power">Kraken Supported Models</a>.