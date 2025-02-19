<p>The <code>Reader</code> method of your custom data class takes one line of data from the source location and parses it into one of your custom objects. You can add as many properties to your custom data objects as you need, but the following table describes the properties you must set. When there is no useable data in a line, the method should return <code class="csharp">null</code><code class="python">None</code>. LEAN repeatedly calls the <code>Reader</code> method until the date/time advances or it reaches the end of the file.</p>

<table class="qc-table table">
    <thead>
        <tr>
            <th>Property</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>Symbol</code></td>
            <td>You can set this property to <code>config.Symbol</code>.</td>
        </tr>
        <tr>
            <td><code>Time</code></td>
            <td>The time when the data sample starts.</td>
        </tr>
        <tr>
            <td><code>EndTime</code></td>
            <td>The time when the data sample ends and when LEAN should add the sample to a <a href="/docs/v2/writing-algorithms/key-concepts/time-modeling/timeslices">Slice</a>.</td>
        </tr>
        <tr>
            <td><code>Value</code></td>
            <td>The default data point value.<br></td>
        </tr>
    </tbody>
</table>

<p>The following table describes the arguments the <code>Reader</code> method accepts:</p>

<table class="qc-table table">
    <thead>
        <tr>
            <th>Argument</th>
            <th>Data Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>config</code></td>
            <td><code>SubscriptionDataConfig</code></td>
            <td>The subscription configuration</td>
        </tr>
        <tr>
            <td><code>line</code></td>
            <td><code class="csharp">string</code><code class="python">str</code></td>
            <td>Content from the requested data source</td>
        </tr>
        <tr>
            <td><code>date</code></td>
            <td><code class="csharp">DateTime</code><code class="python">datetime</code></td>
            <td>Date of this source file</td>
        </tr>
        <tr>
            <td><code>isLiveMode</code></td>
            <td><code>bool</code></td>
            <td><code class="csharp">true</code><code class="python">True</code> if algorithm is running in live mode</td>
        </tr>
    </tbody>
</table>

<p>You can use these arguments to create <code>BaseData</code> objects from different sources.</p>

<div class="section-example-container">
<pre class="csharp">public class MyCustomDataType : BaseData
{
    public override BaseData Reader(
        SubscriptionDataConfig config,
        string line,
        DateTime date,
        bool isLive)
    {
        if (string.IsNullOrWhiteSpace(line.Trim()))
        {
            return null;
        }

        if (isLiveMode)
        {
            var custom = JsonConvert.DeserializeObject&lt;MyCustomDataType&gt;(line);
            custom.EndTime = DateTime.UtcNow.ConvertFromUtc(config.ExchangeTimeZone);
            return custom;
        }

        if (!char.IsDigit(line[0]))
        {
            return null;
        }

        var data = line.Split(',');
        return new MyCustomDataType()
        {
            Time = DateTime.ParseExact(data[0], "yyyyMMdd", CultureInfo.InvariantCulture),
            EndTime = Time.AddDays(1),
            Symbol = config.Symbol,
            Value = data[1].IfNotNullOrEmpty(
                s => decimal.Parse(s, NumberStyles.Any, CultureInfo.InvariantCulture)),
        };
    }
}
</pre>
<pre class="python">class MyCustomDataType(PythonData):
    def Reader(self,
         config: SubscriptionDataConfig,
         line: str,
         date: datetime,
         isLive: bool) -&gt; BaseData:

        if not line.strip():
            return None

        custom = MyCustomDataType()
        custom.Symbol = config.Symbol

        if isLiveMode:
            data = json.loads(line)
            custom.EndTime =  Extensions.ConvertFromUtc(datetime.utcnow(), config.ExchangeTimeZone)
            custom.Value = data["value"]
            return custom

        if not line[0].isdigit():
            return None

        data = line.split(',')
        custom.EndTime = datetime.strptime(data[0], '%Y%m%d') + timedelta(1)
        custom.Value = float(data[1])
        return custom
</pre>
</div>