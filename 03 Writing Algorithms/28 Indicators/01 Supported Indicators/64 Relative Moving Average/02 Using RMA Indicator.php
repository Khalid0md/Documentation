<!-- Code generated by Indicator-Reference-Code-Generator.py -->
<? 
include(DOCS_RESOURCES."/qcalgorithm-api/_method_container.html");

$typeName = 'RelativeMovingAverage';
$helperName = 'RMA';
$helperArguments = '"SPY", 20';
$properties = array("ShortAverage","MediumAverage","LongAverage");
$updateParameterType = 'time/number pair, or an <code>IndicatorDataPoint</code>';
$constructorArguments = '20';
$updateParameterValue = 'bar.EndTime, bar.Close';
$hasMovingAverageTypeParameter = False;
$constructorBox = 'relative-moving-average';
include(DOCS_RESOURCES."/indicators/using-indicator.php");
?>