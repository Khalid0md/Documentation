<p>We model the order fees of IB for each asset class. To check the latest fees, see the <a rel="nofollow" target="_blank" href="https://www.interactivebrokers.com/en/index.php?f=1590&amp;p=stocks2">Commissions</a> page on the IB website.</p>

<h4>US Equities</h4>
<p>US Equity trades cost $0.005/share with a $1 minimum fee and a 0.5% maximum fee.</p>

<h4>Equity Options and Index Options</h4>
<p>Equity Options and Index Options fees are a function of your monthly volume and the premium of the contract you trade. The following table shows the fees for each volume tier:</p>

<table class="table qc-table" id="fees-table">
   <thead>
      <tr>
         <th style="width: 33%">Monthly Volume (Contacts)<br></th>
         <th style="width: 33%">Premium ($)</th>
         <th style="width: 33%">Fee per Contract ($)</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>&lt;= 10,000</td>
         <td>&lt; 0.05</td>
         <td>0.25</td>
      </tr>
      <tr>
         <td>&lt;= 10,000</td>
         <td>0.05 &lt;= premium &lt; 0.10</td>
         <td>0.50</td>
      </tr>
      <tr>
         <td>&lt;= 10,000</td>
         <td>&gt;= 0.10</td>
         <td>0.70</td>
      </tr>
      <tr>
         <td>10,000 &lt; volume &lt;= 50,000</td>
         <td>&lt; 0.05<br></td>
         <td>0.25</td>
      </tr>
      <tr>
         <td>10,000 &lt; volume &lt;= 50,000</td>
         <td>&gt;= 0.05<br></td>
         <td>0.50</td>
      </tr>
      <tr>
         <td>50,000 &lt; volume &lt;= 100,000</td>
         <td>Any</td>
         <td>0.25</td>
      </tr>
      <tr>
         <td>&gt; 100,000</td>
         <td>Any</td>
         <td>0.15</td>
      </tr>
   </tbody>
</table>

<style>
#fees-table th {
    text-align: right;
}

#fees-table td {
    text-align: right;
}
</style>

<p>By default, LEAN models your fees at the tier with the lowest monthly volume. To adjust the fee tier, <a href='/docs/v2/writing-algorithms/reality-modeling/transaction-fees/supported-models#03-Interactive-Brokers-Model'>manually set the fee model</a> and provide a <code>monthlyOptionsTradeAmountInContracts</code> argument.</p>

<p>There is no fee to exercise Option contracts.</p>

<h4>Forex</h4>
<p>Forex fees are a function of your monthly Forex trading volume. The following table shows the fee tiers:</p>

<table class="table qc-table">
    <thead>
        <tr>
            <th>Monthly Volume (USD)</th>
            <th>Commission Rate (%)</th>
            <th>Minimum Fee ($)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><= 1B</td>
            <td>0.002</td>
            <td>2</td>
        </tr>
        <tr>
            <td>1B < volume <= 2B</td>
            <td>0.0015</td>
            <td>1.5</td>
        </tr>
        <tr>
            <td>2B < volume <= 5B</td>
            <td>0.001</td>
            <td>1.25</td>
        </tr>
        <tr>
            <td>> 5B</td>
            <td>0.0008</td>
            <td>1</td>
        </tr>
    </tbody>
</table>

<p>By default, LEAN models your fees at the tier with the lowest monthly volume. To adjust the fee tier, <a href='/docs/v2/writing-algorithms/reality-modeling/transaction-fees/supported-models#03-Interactive-Brokers-Model'>manually set the fee model</a> and provide a <code>monthlyForexTradeAmountInUSDollars</code> argument.</p>

<h4>US Futures</h4>
<p>US Futures fees depend on the contracts you trade. The following table shows the base fee per contract for each Future:</p>
<table class="table qc-table">
    <thead>
        <tr>
            <th>Contract Symbol</th>
            <th>Market</th>
            <th>Name</th>
            <th>Base Fee Per Contract ($)</th>
            <th>Exchange Fee Per Contract ($)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
           <td colspan='5'><b>E-mini Futures</b></th>
        </tr>
        <tr>
            <td>ES</td>
            <td>CME</td>
            <td>E-mini S&P 500 Futures</td>
            <td>0.85</td>
            <td>1.28</td>
        </tr>
        <tr>
            <td>NQ</td>
            <td>CME</td>
            <td>E-mini Nasdaq-100 Futures</td>
            <td>0.85</td>
            <td>1.28</td>
        </tr>
        <tr>
            <td>YM</td>
            <td>CBOT</td>
            <td>E-mini Dow ($5) Futures</td>
            <td>0.85</td>
            <td>1.28</td>
        </tr>
        <tr>
            <td>RTY</td>
            <td>CME</td>
            <td>E-mini Russell 2000 Index Futures</td>
            <td>0.85</td>
            <td>1.28</td>
        </tr>
        <tr>
            <td>EMD</td>
            <td>CME</td>
            <td>E-mini S&P MidCap 400 Futures</td>
            <td>0.85</td>
            <td>1.28</td>
        </tr>
        <tr>
           <td colspan='5'><b>Micro E-mini Futures</b></th>
        </tr>
        <tr>
            <td>MYM</td>
            <td>CBOT</td>
            <td>Micro E-mini Dow Jones Industrial Average Index Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>M2K</td>
            <td>CME</td>
            <td>Micro E-mini Russell 2000 Index Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>MES</td>
            <td>CME</td>
            <td>Micro E-mini Standard and Poor's 500 Stock Price Index Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>MNQ</td>
            <td>CME</td>
            <td>Micro E-mini Nasdaq-100 Index Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>2YY</td>
            <td>CBOT</td>
            <td>Micro 2-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>5YY</td>
            <td>CBOT</td>
            <td>Micro 5-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>10Y</td>
            <td>CBOT</td>
            <td>Micro 10-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>30Y</td>
            <td>CBOT</td>
            <td>Micro 30-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>MCL</td>
            <td>NYMEX</td>
            <td>Micro WTI Crude Oil Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>MGC</td>
            <td>COMEX</td>
            <td>Micro Gold Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
            <td>SIL</td>
            <td>COMEX</td>
            <td>Micro Silver Futures</td>
            <td>0.25</td>
            <td>0.3</td>
        </tr>
        <tr>
           <td colspan='5'><b>Cryptocurrency Futures</b></th>
        </tr>
        <tr>
            <td>BTC</td>
            <td>CME</td>
            <td>Bitcoin Futures</td>
            <td>5</td>
            <td>6</td>
        </tr>
        <tr>
            <td>MIB</td>
            <td>CME</td>
            <td>BTIC on Micro Bitcoin Futures</td>
            <td>2.25</td>
            <td>2.5</td>
        </tr>
        <tr>
            <td>MBT</td>
            <td>CME</td>
            <td>Micro Bitcoin Futures</td>
            <td>2.25</td>
            <td>2.5</td>
        </tr>
        <tr>
            <td>MET</td>
            <td>CME</td>
            <td>Micro Ether Futures</td>
            <td>0.2</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>MRB</td>
            <td>CME</td>
            <td>BTIC on Micro Ether Futures</td>
            <td>0.2</td>
            <td>0.2</td>
        </tr>
        <tr>
           <td colspan='5'><b>E-mini FX Futures</b></th>
        </tr>
        <tr>
            <td>E7</td>
            <td>CME</td>
            <td>E-mini Euro FX Futures</td>
            <td>0.5</td>
            <td>0.85</td>
        </tr>
        <tr>
            <td>J7</td>
            <td>CME</td>
            <td>E-mini Japanese Yen Futures</td>
            <td>0.5</td>
            <td>0.85</td>
        </tr>
        <tr>
           <td colspan='5'><b>Micro E-mini FX Futures</b></th>
        </tr>
        <tr>
            <td>M6E</td>
            <td>CME</td>
            <td>Micro Euro/U.S. Dollar (EUR/USD) Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>M6A</td>
            <td>CME</td>
            <td>Micro Australian Dollar/U.S. Dollar (AUD/USD) Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>M6B</td>
            <td>CME</td>
            <td>Micro British Pound Sterling/U.S. Dollar (GBP/USD) Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>MCD</td>
            <td>CME</td>
            <td>Micro Canadian Dollar/U.S.Dollar(CAD/USD) Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>MJY</td>
            <td>CME</td>
            <td>Micro Japanese Yen/U.S. Dollar (JPY/USD) Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>MSF</td>
            <td>CME</td>
            <td>Micro Swiss Franc/U.S. Dollar (CHF/USD) Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>M6J</td>
            <td>CME</td>
            <td>Micro USD/JPY Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>MIR</td>
            <td>CME</td>
            <td>Micro INR/USD Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>M6C</td>
            <td>CME</td>
            <td>Micro USD/CAD Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>M6S</td>
            <td>CME</td>
            <td>Micro USD/CHF Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
        <tr>
            <td>MNH</td>
            <td>CME</td>
            <td>Micro USD/CNH Futures</td>
            <td>0.15</td>
            <td>0.24</td>
        </tr>
    </tbody>
</table>

<p>If you trade a contract that's not in the preceding table, the base fee is $0.85/contract and the exchange fee is $1.60/contract.</p>

<p>In addition to the base fee and exchange fee, there is a $0.02/contract regulatory fee.</p>

<h4>Futures Options</h4>
<p>Futures Options fees depend on the contracts you trade. The following table shows the base fee per contract for each Future:</p>
<table class="table qc-table">
    <thead>
        <tr>
            <th>Contract Symbol</th>
            <th>Market</th>
            <th>Underlying Futures Name</th>
            <th>Base Fee Per Contract ($)</th>
            <th>Exchange Fee Per Contract ($)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
           <td colspan='5'><b>E-mini Futures Options</b></th>
        </tr>
        <tr>
            <td>ES</td>
            <td>CME</td>
            <td>E-mini S&P 500 Futures</td>
            <td>0.85</td>
            <td>0.55</td>
        </tr>
        <tr>
            <td>NQ</td>
            <td>CME</td>
            <td>E-mini Nasdaq-100 Futures</td>
            <td>0.85</td>
            <td>0.55</td>
        </tr>
        <tr>
            <td>YM</td>
            <td>CBOT</td>
            <td>E-mini Dow ($5) Futures</td>
            <td>0.85</td>
            <td>0.55</td>
        </tr>
        <tr>
            <td>RTY</td>
            <td>CME</td>
            <td>E-mini Russell 2000 Index Futures</td>
            <td>0.85</td>
            <td>0.55</td>
        </tr>
        <tr>
            <td>EMD</td>
            <td>CME</td>
            <td>E-mini S&P MidCap 400 Futures</td>
            <td>0.85</td>
            <td>0.55</td>
        </tr>
        <tr>
           <td colspan='5'><b>Micro E-mini Futures Options</b></th>
        </tr>
        <tr>
            <td>MYM</td>
            <td>CBOT</td>
            <td>Micro E-mini Dow Jones Industrial Average Index Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>M2K</td>
            <td>CME</td>
            <td>Micro E-mini Russell 2000 Index Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>MES</td>
            <td>CME</td>
            <td>Micro E-mini Standard and Poor's 500 Stock Price Index Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>MNQ</td>
            <td>CME</td>
            <td>Micro E-mini Nasdaq-100 Index Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>2YY</td>
            <td>CBOT</td>
            <td>Micro 2-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>5YY</td>
            <td>CBOT</td>
            <td>Micro 5-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>10Y</td>
            <td>CBOT</td>
            <td>Micro 10-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>30Y</td>
            <td>CBOT</td>
            <td>Micro 30-Year Yield Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>MCL</td>
            <td>NYMEX</td>
            <td>Micro WTI Crude Oil Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>MGC</td>
            <td>COMEX</td>
            <td>Micro Gold Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>SIL</td>
            <td>COMEX</td>
            <td>Micro Silver Futures</td>
            <td>0.25</td>
            <td>0.2</td>
        </tr>
        <tr>
           <td colspan='5'><b>Cryptocurrency Futures Options</b></th>
        </tr>
        <tr>
            <td>BTC</td>
            <td>CME</td>
            <td>Bitcoin Futures</td>
            <td>5</td>
            <td>5</td>
        </tr>
        <tr>
            <td>MIB</td>
            <td>CME</td>
            <td>BTIC on Micro Bitcoin Futures</td>
            <td>1.25</td>
            <td>2.5</td>
        </tr>
        <tr>
            <td>MBT</td>
            <td>CME</td>
            <td>Micro Bitcoin Futures</td>
            <td>1.25</td>
            <td>2.5</td>
        </tr>
        <tr>
            <td>MET</td>
            <td>CME</td>
            <td>Micro Ether Futures</td>
            <td>0.1</td>
            <td>0.2</td>
        </tr>
        <tr>
            <td>MRB</td>
            <td>CME</td>
            <td>BTIC on Micro Ether Futures</td>
            <td>0.1</td>
            <td>0.2</td>
        </tr>
    </tbody>
</table>

<p>If you trade a contract that's not in the preceding table, the base fee is $0.85/contract and the exchange fee is $1.60/contract.</p>

<p>In addition to the base fee and exchange fee, there is a $0.02/contract regulatory fee.</p>

<p>For default backtest fee model, see <a href="/docs/v2/writing-algorithms/reality-modeling/brokerages/supported-models/interactive-brokers#04-Fees">Interactive Brokers Supported Models</a>.