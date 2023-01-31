<p><? if ($cloudPlatform) { ?>The live trading results page has a <span class='button-name'>Stop</span> button to immediately stop your algorithm from executing. <? } ?><? if ($leanCli) { ?>The <code>lean live stop</code> command immediately stops your algorithm from executing. <? } ?><? if($leanCliCloud) { ?>The <code>lean cloud live stop</code> command immediately stops your algorithm from executing. <? } ?>When you stop a live algorithm, your portfolio holdings are retained. Stop your algorithm if you want to perform any of the following actions:</p>

<ul><? if ($cloudPlatform) { ?>
        <li>Update your project's code files</li>
        <li>Upgrade the <a href='/docs/v2/cloud-platform/organizations/resources#04-Live-Trading-Nodes'>live trading node</a></li>
        <li>Update the settings you entered into the deployment wizard</li>
        <li>Place manual orders through your brokerage account instead of the web IDE</li><? } ?>
    <? if ($leanCli) { ?>
        <li>Update your project's code files</li>
        <li>Upgrade the <a href='/docs/v2/cloud-platform/organizations/resources#04-Live-Trading-Nodes'>live trading node</a></li>
        <li>Update the settings you entered into the deployment command</li>
    <? } ?>
    <? if ($leanCliCloud) { ?>
        <li>Update your project's code files</li>
        <li>Update the settings you entered into the deployment command</li>
    <? } ?>
</ul>

<p>Furthermore, if you receive new securities in your portfolio because of a reverse merger, you also need to stop and redeploy the algorithm.</p>    

<p>LEAN actively terminates live algorithms when it detects interference outside of the algorithm's control to avoid conflicting race conditions between the owner of the account and the algorithm, so avoid manipulating your brokerage account and placing manual orders on your brokerage account while your algorithm is running. If you need to adjust your brokerage account holdings, stop the algorithm, manually place your trades, and then redeploy the algorithm.</p>

<? if ($cloudPlatform) { ?>
    <p>Follow these steps to stop your algorithm:</p>
    <ol>
        <li>Open your algorithm's <a href='/docs/v2/cloud-platform/live-trading/results#02-View-Live-Results'>live results page</a>.</li>
        <li>Click <span class='button-name'>Stop</span>.</li>
        <li>Click <span class='button-name'>Stop</span> again.</li>
    </ol> 
<? } ?>