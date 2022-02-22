import pathlib
import re
from urllib.request import urlopen

raw = urlopen("https://www.quantconnect.com/services/inspector?type=T:QuantConnect.Algorithm.QCAlgorithm").read().decode("utf-8") \
    .replace("true", "True") \
    .replace("false", "False") \
    .replace("null", "None")
raw_dict = eval(raw)
methods = raw_dict["methods"]

names = {}
descriptions = {}
args = {}
plots = {}
updates = {}
update_value = {}

for method in methods:
    if 'QuantConnect.Indicators' in str(method["method-return-type-full-name"]) \
    and str(method["method-return-type-short-name"]) != 'IndicatorBase<IndicatorDataPoint>':
        item = str(method["method-return-type-short-name"])
        names[item] = str(method["method-name"])
        args[item] = tuple(x["argument-name"] for x in method["method-arguments"] if not x["argument-optional"])
        plots[item] = []
        
        ind = urlopen(f"https://www.quantconnect.com/services/inspector?type=T:QuantConnect.Indicators.{item}").read().decode("utf-8") \
                .replace("true", "True") \
                .replace("false", "False") \
                .replace("null", "None")
        ind_dict = eval(ind)
        
        detail_description = str(ind_dict['description']).replace("Represents", "This indicator represents")
        if "Source: " in detail_description:
            link_split = detail_description.split("http")
            detail_description = link_split[0].replace("Source: ", f'<sup><a href="https{link_split[1]}">source</a></sup>')
        descriptions[item] = detail_description
        
        for prop in ind_dict["properties"]:
            prop_name = str(prop["property-name"])
            if "MovingAverageType" not in prop_name\
            and "IsReady" not in prop_name\
            and "WarmUpPeriod" not in prop_name\
            and "Name" not in prop_name\
            and "Samples" not in prop_name:
                plots[item].append(prop_name)
                
        while True:
            if "QuantConnect.Indicators.Indicator" in ind_dict["base-type-full-name"]:
                updates[item] = (0, tuple(("data[symbol].EndTime", "data[symbol].High")))
                update_value[item] = "time/decimal pair"
                break
            
            elif "QuantConnect.Indicators.BarIndicator" in ind_dict["base-type-full-name"]:
                updates[item] = (1, tuple(("data.QuoteBars[symbol]",)))
                update_value[item] = "a <code>TradeBar</code>, <code>QuoteBar</code>, or an <code>IndicatorDataPoint</code>"
                break
            
            elif "QuantConnect.Indicators.TradeBarIndicator" in ind_dict["base-type-full-name"]:
                updates[item] = (2, tuple(("data.Bars[symbol]",)))
                update_value[item] = "a <code>TradeBar</code>"
                break
            
            else:
                end = ind_dict["base-type-full-name"].split(".")[-1]
                ind = urlopen(f"https://www.quantconnect.com/services/inspector?type=T:QuantConnect.Indicators.{end}").read().decode("utf-8") \
                        .replace("true", "True") \
                        .replace("false", "False") \
                        .replace("null", "None")
                ind_dict = eval(ind)
        
i = 1

for full, short in dict(sorted(names.items())).items():
    name = " ".join(re.split('(?=[A-Z])', full))
    base = f"02 Writing Algorithms/02 User Guides/28 Indicators/07 Indicator Reference/{i:02}{name}"
    destination_folder = pathlib.Path(base)
    destination_folder.mkdir(parents=True, exist_ok=True)
    
    with open(destination_folder / "01 Introduction.html", "w", encoding="utf-8") as html_file:
        html_file.write(f"""<!-- Code generated by Indicator-Reference-Code-Generator.py -->
                        
<p>{descriptions[full]}</p>""")
    
    api = []
    with open("02 Writing Algorithms/04 API Reference/02.html", "r", encoding="utf-8") as fin:
        lines = fin.readlines()
        active = False
        
        for line in lines:
            if not active and f'<a id="{short}-header"></a>' in line:
                active = True
                
            if active and 'button class="method-tag"' not in line:
                api.append(line)
                
                if "</div>" in line and "    " not in line:
                    active = False
        
    with open(destination_folder / "02 Automatic Usage.html", "w", encoding="utf-8") as html_file:
        html_file.write(f"""<!-- Code generated by Indicator-Reference-Code-Generator.py -->
                        
<style>

    .method-container {{
        border: 1px solid #D9E1EB;
        border-top: 0;
        border-radius: 4px;
        margin-top: 2rem;
    }}

    .method-container > div {{
        padding-left: 1.5rem;
        padding-right: 1rem;
        margin-bottom: 2rem;
    }}

    .method-details > div {{
        margin-bottom: 2rem;
        display: block;
    }}

    .method-header {{
        background: #FBFCFD;
        border-bottom: 1px solid #D9E1EB;
        border-top: 1px solid #D9E1EB;
        padding: 1.5rem;
    }}

    .method-header > pre {{
        white-space: pre-line;
    }}

    .method-header:first-child {{
        border-radius: 4px 4px 0px 0px;
    }}

    .method-order {{
        color: #8F9CA3;
        font-size: 14px;
        margin-left: 0.5rem;
    }}

    .parameter-table{{
        margin: 2rem 0 2rem -0.25rem;
        display: block;
        overflow-x: auto;
    }}

    .parameter-table th {{
        padding-bottom: 1rem;
        text-align: left;
    }}

    .parameter-table td {{
        padding: 1rem 3rem 0 0;
        vertical-align: top;
    }}
    
    .show-hide-detail {{
        background: none;
        border: none;
        padding: 0;
        color: #069;
        cursor: pointer;
    }}

</style>

<script>
function ShowHide(event, idName) {{
    var x = document.getElementById(idName);
    if (x.style.display == "none") {{
        x.style.display = "block";
        event.target.innerHTML = "<span>Hide Details <img src='https://cdn.quantconnect.com/i/tu/api-chevron-hide.svg' alt='arrow-hide'></span>";
    }}
    else {{
        x.style.display = "none";
        event.target.innerHTML = "<span>Show Details <img src='https://cdn.quantconnect.com/i/tu/api-chevron-show.svg' alt='arrow-show'></span>";
    }}
}};
</script>
                        
<p><code>QCAlgorithm</code> provides a shortcut method, <code>{short}</code>, for the <code>{full}</code> indicator. It creates an <code>Indicator</code> object, sets up a consolidator to update the indicator, and then returns the indicator so you can use it in your algorithm.</p>
<p>The following reference table describes the <code>{short}</code> method:</p>

{"".join(api)}
<br/>
<p>The resolution of the indicator should be greater than or equal to the resolution of the security. For instance, if you subscribe to hourly data for a security, you should update its indicator with data that spans 1 hour or longer.</p>

<p>To retrieve the numerical value of the indicator, use its <code>Current.Value</code> attribute.</p>

<div class="section-example-container">
    <pre class="csharp">private {full} _{short.lower()};

// In Initialize()
var symbol = AddEquity("SPY").Symbol;
_{short.lower()} = {short}{str(args[full]).replace("'", "").replace('"', '').replace(',)', ')')};

// In OnData()
if (_{short.lower()}.IsReady)
{{
    var indicatorValue = _{short.lower()}.Current.Value;
}}</pre>
    <pre class="python"># In Initialize()
symbol = self.AddEquity("SPY").Symbol
self.{short.lower()} = self.{short}{str(args[full]).replace("'", "").replace('"', '').replace(',)', ')')}

# In OnData()
if self.{short.lower()}.IsReady:
    indicator_value = self.{short.lower()}.Current.Value
</pre>
</div>""")
        
    with open(destination_folder / "03 Manual Usage.html", "w", encoding="utf-8") as html_file:
        html_file.write(f"""<!-- Code generated by Indicator-Reference-Code-Generator.py -->
                        
<style>

    .method-container {{
        border: 1px solid #D9E1EB;
        border-top: 0;
        border-radius: 4px;
        margin-top: 2rem;
    }}

    .method-container > div {{
        padding-left: 1.5rem;
        padding-right: 1rem;
        margin-bottom: 2rem;
    }}

    .method-details > div {{
        margin-bottom: 2rem;
        display: block;
    }}

    .method-header {{
        background: #FBFCFD;
        border-bottom: 1px solid #D9E1EB;
        border-top: 1px solid #D9E1EB;
        padding: 1.5rem;
    }}

    .method-header > pre {{
        white-space: pre-line;
    }}

    .method-header:first-child {{
        border-radius: 4px 4px 0px 0px;
    }}

    .method-order {{
        color: #8F9CA3;
        font-size: 14px;
        margin-left: 0.5rem;
    }}

    .parameter-table{{
        margin: 2rem 0 2rem -0.25rem;
        display: block;
        overflow-x: auto;
    }}

    .parameter-table th {{
        padding-bottom: 1rem;
        text-align: left;
    }}

    .parameter-table td {{
        padding: 1rem 3rem 0 0;
        vertical-align: top;
    }}
    
    .show-hide-detail {{
        background: none;
        border: none;
        padding: 0;
        color: #069;
        cursor: pointer;
    }}

</style>

<script>
function ShowHide(event, idName) {{
    var x = document.getElementById(idName);
    if (x.style.display == "none") {{
        x.style.display = "block";
        event.target.innerHTML = "<span>Hide Details <img src='https://cdn.quantconnect.com/i/tu/api-chevron-hide.svg' alt='arrow-hide'></span>";
    }}
    else {{
        x.style.display = "none";
        event.target.innerHTML = "<span>Show Details <img src='https://cdn.quantconnect.com/i/tu/api-chevron-show.svg' alt='arrow-show'></span>";
    }}
}};
</script>

<p>You can create an <code>{full}</code> indicator that does not automatically update. This lets you update the indicator with any data you choose. The following reference table describes the <code>{full}</code> constructor.</p>
""")
        
        api_active = True
        
        for line in api:
            if "<code>*Nullable&lt;Resolution&gt;</code>" in line:
                api_active = False
                
            elif " )" in line or "</table>" in line:
                api_active = True
                
            if not api_active: continue
            
            elif "<p>Definition at" in line:
                html_file.write(f'            <p>Definition at <a href="https://github.com/QuantConnect/Lean/blob/master/Indicators/{full}.cs">file Indicators/{full}.cs.</a></p>\n')
                
            else:
                html_file.write(line.replace(f"<h3>{short}", f"<h3>{full}")\
                    .replace(f"QuantConnect.Algorithm.QCAlgorithm.{short}", f"QuantConnect.Indicators.{full}")\
                    .replace(f"ShowHide(event, '{short}", f"ShowHide(event, '{full}")\
                    .replace(f'id="{short}', f'id="{full}')\
                    .replace("Symbol", "*string")\
                    .replace("The symbol", "<i>(Optional)</i> The custom name of the indicator")\
                    .replace("symbol", "name"))

        html_file.write(f"""<br/>
<p>You can update the indicator automatically or manually.</p>

<h4>Automatic Update</h4>
<p>Create a consolidator and then call the <code>RegisterIndicator</code> method to update the indicator with the consolidated bars.</p>
        
<div class="section-example-container">
    <pre class="csharp">private {full} _{short.lower()};

// In Initialize()
_{short.lower()} = new {full}{str(tuple(args[full][i] for i in range(len(args[full])) if i != 0)).replace("'", "").replace('"', '').replace(',)', ')')};
_{short.lower()}.Updated += IndicatorUpdateMethod;

var thirtyMinuteConsolidator = new TradeBarConsolidator(TimeSpan.FromMinutes(30));
var symbol = AddEquity("SPY").Symbol;
SubscriptionManager.AddConsolidator(symbol, thirtyMinuteConsolidator);

RegisterIndicator(symbol, _{short.lower()}, thirtyMinuteConsolidator);

// In IndicatorUpdateMethod()
if (_{short.lower()}.IsReady)
{{
    var indicatorValue = _{short.lower()}.Current.Value;
}}</pre>
    <pre class="python"># In Initialize()
self.{short.lower()} = {full}{str(tuple(args[full][i] for i in range(len(args[full])) if i != 0)).replace("'", "").replace('"', '').replace(',)', ')')}
self.{short.lower()}.Updated += self.IndicatorUpdateMethod

thirty_minute_consolidator = TradeBarConsolidator(timedelta(minutes=30))
symbol = self.AddEquity("SPY").Symbol
self.SubscriptionManager.AddConsolidator(symbol, thirty_minute_consolidator)

self.RegisterIndicator(symbol, self.{short.lower()}, thirty_minute_consolidator)

# In IndicatorUpdateMethod()
if self.{short.lower()}.IsReady:
    indicator_value = self.{short.lower()}.Current.Value</pre>
</div>

<h4>Manual Update</h4>
<p>Updating your indicator manually enables you to control when the indicator is updated and what data you use to update it. To manually update the indicator, call the <code>Update</code> method that with {update_value[full]}. The indicator will only be ready after you prime it with enough data.</p>

<div class="section-example-container">
    <pre class="csharp">private {full} _{short.lower()};
private Symbol _symbol;

// In Initialize()
_{short.lower()} = new {full}{str(tuple(args[full][i] for i in range(len(args[full])) if i != 0)).replace("'", "").replace('"', '').replace(',)', ')')};
_symbol = AddEquity("SPY").Symbol;

// In OnData()
if ({"data" if updates[full][0] == 0 else "data.QuoteBars" if updates[full][0] == 1 else "data.Bars"}.ContainsKey(_symbol))
{{
    _{short.lower()}.Update{str(updates[full][1]).replace("'", "").replace('"', '').replace(',)', ')').replace("symbol", "_symbol")};
}}
if (_{short.lower()}.IsReady)
{{
    var indicatorValue = _{short.lower()}.Current.Value;
}}</pre>
    <pre class="python"># In Initialize()
self.{short.lower()} = {full}{str(tuple(args[full][i] for i in range(len(args[full])) if i != 0)).replace("'", "").replace('"', '').replace(',)', ')')}
self.symbol = self.AddEquity("SPY").Symbol

# In OnData()
if {"data" if updates[full][0] == 0 else "data.QuoteBars" if updates[full][0] == 1 else "data.Bars"}.ContainsKey(self.symbol):
    self.{short.lower()}.Update{str(updates[full][1]).replace("'", "").replace('"', '').replace(',)', ')').replace("symbol", "self.symbol")}
if self.{short.lower()}.IsReady:
    indicator_value = self.{short.lower()}.Current.Value</pre>
</div>""")
        
    with open(destination_folder / "04 Visualization.html", "w", encoding="utf-8") as html_file:
        html_file.write(f"""<!-- Code generated by Indicator-Reference-Code-Generator.py -->
                        
<p>We provide a helper method which aims to make plotting indicators simple. For further information on the charting API please see our <a href="/docs/v2/writing-algorithms/user-guides/charting">Charting</a> section.</p>
                        
<div class="section-example-container">
    <pre class="csharp">private {full} _{short.lower()};

// In Initialize()
var symbol = AddEquity("SPY").Symbol;
_{short.lower()} = {short}{str(args[full]).replace("'", "").replace('"', '').replace(',)', ')')};

// In OnData()
if (_{short.lower()}.IsReady)
{{
""")
        
        for x in plots[full]:
            html_file.write(f'''    Plot("My Indicators", "{short}{" ".join(re.split("(?=[A-Z])", x))}", _{short.lower()}.{x});
''')
                            
        html_file.write(f"""}}</pre>
    <pre class="python"># In Initialize()
symbol = self.AddEquity("SPY").Symbol
self.{short.lower()} = self.{short}{str(args[full]).replace("'", "").replace('"', '').replace(',)', ')')}

# In OnData()
if self.{short.lower()}.IsReady:
""")
                            
        for x in plots[full]:
            html_file.write(f'''    self.Plot("My Indicators", "{short}{" ".join(re.split("(?=[A-Z])", x))}", self.{short.lower()}.{x});
''')
                            
        html_file.write(f"""</pre>
</div>""")
        
    i += 1