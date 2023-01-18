<p>The following tables describes the methods that declare your dataset frequency:</p>

<table class="qc-table table">
    <thead>
        <tr>
            <th>Method</th>
            <th>Return Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>SupportedResolutions</code></td>
	    <td><code>List&lt;Resolution&gt;</code></td>
            <td>Gets the supported resolutions for this dataset. <a href='/docs/v2/our-platform/datasets/contributing-datasets/defining-data-sources/universe'>Universe data</a> must have hour or daily resolution.</td>
        </tr>
        <tr>
            <td><code>DefaultResolution</code></td>
	    <td><code>Resolution</code></td>
            <td>Gets the default resolution for this data and security type. If a member doesn't specify a resolution when they subscribe to your dataset, Lean uses the <code>DefaultResolution</code>.</td>
        </tr>
        <tr>
            <td><code>IsSparse</code></td>
	    <td><code>bool</code></td>
            <td>Indicates whether the data is sparse. If your dataset is not tick resolution and your dataset is missing data for at least one sample, it's sparse. If your dataset is sparse, we disable logging for missing files.</td>
        </tr>
    </tbody>
</table>

<?php echo file_get_contents(DOCS_RESOURCES."/enumerations/resolution.html"); ?>

<p>The following snippet provides an example implementation of the preceding methods:</p>

<div class="section-example-container">
    <pre>public class VendorNameDatasetName : BaseData
{
    public override List&lt;Resolution&gt; SupportedResolutions()
    {
        return DailyResolution;
    }

    public override Resolution DefaultResolution()
    {
        return Resolution.Daily;
    }

    public override bool IsSparseData()
    {
        return true;
    }
}</pre>
</div>

