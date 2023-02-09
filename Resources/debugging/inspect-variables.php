<?
    $isBacktest = DOCS_URL(1) == "backtesting";
    $location = $isBacktest ? "algorithm" : "notebook" ;
?>

<p>After you launch the debugger, you can inspect the state of your <?=$location?> as it executes each line of code. You can inspect local variables or custom expressions. <span class='python'>The values of variables in your <?=$location?> are formatted in the IDE to improve readability. For example, if you inspect a variable that references a DataFrame, the debugger represents the variable value as the following:</span></p>

<img class='python docs-image' src='https://cdn.quantconnect.com/i/tu/debugger-dataframe.png' alt="Dataframe in a debugger variable view">

<h4>Local Variables</h4>
<p>The <span class='page-section-name'>Variables</span> section of the Run and Debug panel shows the local variables at the current breakpoint. If a variable in the panel is an object, click it to see its members. The panel updates as the <?=$location?> runs.</p>

    
<? if ($isBacktest) { ?>
<img class='python docs-image' src='https://cdn.quantconnect.com/i/tu/inspect-local-variables.gif' alt="Local variables in debugger view">
<img class='csharp docs-image' src='https://cdn.quantconnect.com/i/tu/navigate-variables-debugger-c-sharp.gif' alt="Local variables in debugger view">
<? } else { ?>
<img class='python docs-image' src='https://cdn.quantconnect.com/i/tu/research-environment-local-variables-py.gif' alt="Local variables in debugger view">
<? } ?>

<p>Follow these steps to update the value of a variable:</p>
<ol>
    <li>In the Run and Debug panel, right-click a variable and then click <span class='menu-name'>Set Value</span>.</li>
    <li>Enter the new value and then press <span class='key-combinations'>Enter</span>.</li>
</ol>

<h4>Custom Expressions</h4>
    
<? if ($isBacktest) { ?>
<p>The <span class='page-section-name'>Watch</span> section of the Run and Debug panel shows any custom expressions you add. For example, you can add an expression to show the current date in the backtest.</p>
<img class='csharp docs-image' src='https://cdn.quantconnect.com/i/tu/watch-variables-c-sharp.png' alt="Inspect custom variables in debugger view">
<img class='python docs-image' src='https://cdn.quantconnect.com/i/tu/watch-variables.png' alt="Inspect custom variables in debugger view">
<? } else { ?>
<p>The <span class='page-section-name'>Watch</span> section of the Run and Debug panel shows any custom expressions you add. For example, you can add an expression to show a <code>datetime</code> object.</p>
<img class='docs-image' src='https://cdn.quantconnect.com/i/tu/research-env-custom-expressions-debug.jpg' alt="Inspect custom variables in debugger view">
<? } ?>

<p>Follow these steps to add a custom expression:</p>
<ol>
    <li>Hover over the <span class='page-section-name'>Watch</span> section and then click the <span class='icon-name'>plus</span> icon that appears.</li>
    <li>Enter an expression and then press <span class='key-combinations'>Enter</span>.</li>
</ol>