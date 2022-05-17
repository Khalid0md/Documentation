<div>QuoteBars</div><div>-Definition: built by consolidating the bid and ask ticks from the exchanges into bars</div><div>- Add image from Handling Data docs</div><div>-Properties:</div><div>&nbsp;&nbsp;&nbsp; - Open, High, Low, Close, Bid, Ask, LastBidSize, and LastAskSize</div><div>&nbsp;&nbsp;&nbsp; - Bid and the Ask properties are Bar objects</div><div>&nbsp;&nbsp;&nbsp; - The QuoteBar Open, High, Low, and Close properties values are the mean of the respective Bid and Ask properties. (The Low of a QuoteBar is not always the mean. If there is no data for the bid/ask at the current slice, it selects either the AskLow or the BidLow) </div><div>-If there is little trading, or you are in the same time loop as when 
	you added the security, the time-slice may not have any data.</div><div>-Used to fill trades for second &amp; minute resolutions in backtesting</div><div>&nbsp;&nbsp;&nbsp;&nbsp; - Makes trades realistic by accounting for spread costs</div><div>-Quotes are only provided for tick-minute resolutions<br></div><div></div>

<img src="https://cdn.quantconnect.com/docs/i/dataformat-quotebar.png" class="img-responsive">

<div data-tree="QuantConnect.Data.Market.QuoteBar"></div>

<br>
-Add snippet of accessing QuoteBars in OnData