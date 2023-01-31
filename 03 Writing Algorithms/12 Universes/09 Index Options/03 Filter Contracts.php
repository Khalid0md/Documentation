<? include(DOCS_RESOURCES."/universes/option/set-filter.php"); ?>


<p>The following table describes the filter methods of the <code>OptionFilterUniverse</code> class:</p>

<? 
include(DOCS_RESOURCES."/universes/option/option-filter-universe.html"); 
include(DOCS_RESOURCES."/universes/option/filter-examples.html");
$assetClass = "Option";
include(DOCS_RESOURCES."/universes/option/filter-caveats.php");
?>


<p>By default, LEAN adds contracts to the <code>OptionChain</code> that pass the filter criteria at every time step in your algorithm. If a contract has been in the universe for a duration that matches the <code>MinimumTimeInUniverse</code> <a href='/docs/v2/writing-algorithms/universes/settings#02-Properties'>setting</a> and it no longer passes the filter criteria, LEAN removes it from the chain</p>
