<p>By default, LEAN subscribes to the Option contracts that have the following characteristics:</p>

<? echo file_get_contents(DOCS_RESOURCES."/universes/option/default-filter.html"); ?>

<p>LEAN adds all of the Option contracts that meet the filter requirements to the <a href="/docs/v2/writing-algorithms/key-concepts/time-modeling/timeslices">Slice</a> it passes to the <code>OnData</code> method. To adjust the universe of contracts, pass a filter function to the <code>AddFutureOption</code> method.</p>



<div class="section-example-container">
    <pre class="csharp">AddFutureOption(future.Symbol, optionFilterUniverse => optionFilterUniverse.Strikes(-1, 1));</pre>
    <pre class="python">self.AddFutureOption(future.Symbol, lambda option_filter_universe: option_filter_universe.Strikes(-1, 1))</pre>
</div>


<p>The following table describes the filter methods of the <code>OptionFilterUniverse</code> class:</p>

<?php echo file_get_contents(DOCS_RESOURCES."/universes/option/option-filter-universe.html"); ?>

<p>The preceding methods return an <code>OptionFilterUniverse</code>, so you can chain the methods together.</p>

<div class="section-example-container">
    <pre class="csharp">AddFutureOption(future.Symbol, optionFilterUniverse => optionFilterUniverse.Strikes(-1, 1).CallsOnly());</pre>
    <pre class="python">self.AddFutureOption(future.Symbol, lambda option_filter_universe: option_filter_universe.Strikes(-1, 1).CallsOnly())</pre>
</div>


<p>To perform thorough filtering on the <code>OptionFilterUniverse</code>, define an isolated filter method.</p>

<div class="section-example-container">
    <pre class="csharp"># In Initialize
AddFutureOption(future.Symbol, Selector);
        
private OptionFilterUniverse Selector(OptionFilterUniverse optionFilterUniverse)
{
    var symbols = optionFilterUniverse.PutsOnly();
    var strike = symbols.Select(symbol => symbol.ID.StrikePrice).Min();
    symbols = symbols.Where(symbol => symbol.ID.StrikePrice == strike);
    return optionFilterUniverse.Contracts(symbols);
}</pre>
    <pre class="python"># In Initialize
self.AddFutureOption(future.Symbol, self.contract_selector)

def contract_selector(self, option_filter_universe: OptionFilterUniverse) -> OptionFilterUniverse:
    symbols = option_filter_universe.PutsOnly()
    strike = min([symbol.ID.StrikePrice for symbol in symbols])
    symbols = [symbol for symbol in symbols if symbol.ID.StrikePrice == strike]
    return option_filter_universe.Contracts(symbols)</pre>
</div>

<?
$assetClass("Option");
include(DOCS_RESOURCES."/universes/option/filter-caveats.php");
?>

<p>By default, LEAN adds contracts to the <code>OptionChain</code> that pass the filter criteria at every time step in your algorithm. If a contract has been in the universe for a duration that matches the <code>MinimumTimeInUniverse</code> <a href='/docs/v2/writing-algorithms/universes/settings#02-Properties'>setting</a> and it no longer passes the filter criteria, LEAN removes it from the chain.</p>

