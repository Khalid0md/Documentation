<p>By our <a href='/terms'>terms and conditions</a>, you can not use the logs to export dataset information. The following table shows the amount of logs that each organization tier can produce:</p>
<?php echo file_get_contents(DOCS_RESOURCES."/log-limits.html"); ?>
<p>To avoid reaching the limits, we recommend logging sparsely, focusing on the change events instead of logging every time loop. Alternatively, you can use the <a href='../projects/debugging#03-Debugger'>debugger</a> to inspect objects during runtime. If you use the debugger, you should rarely reach the log limits.</p>
