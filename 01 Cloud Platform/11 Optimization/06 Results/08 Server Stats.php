<p>The optimization results page displays a Server Statistics section to show the status of the nodes running the optimization job.</p>

<? DOCS_VIMEO(703026887); ?>

<p>The following image shows an example of the Server Statistics section:</p>

<img class='docs-image' src="https://cdn.quantconnect.com/i/tu/optimization-server-statistics.png" alt="Optimization server statstics">

<p>The following table describes the information that the Server Statistics section displays:</p>

<table class="table qc-table">
    <thead>
        <tr>
            <th style="width: 25%">Property</th>
            <th style="width: 75%">Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>CPU</td>
            <td>The total CPU usage and the CPU usage of each node</td>
        </tr>
        <tr>
            <td>RAM</td>
            <td>The total RAM usage of the RAM usage of each node</td>
        </tr>
        <tr>
            <td>HOST</td>
            <td>The node model and the number of nodes used to run the optimization</td>
        </tr>
        <tr>
            <td>Uptime</td>
            <td>The length of time that the optimization job has ran</td>
        </tr>
    </tbody>
</table>

<p>View the Server Statistics section to see the amount of CPU power and RAM the optimization job demands. If your algorithm is demanding a lot of resources, use more powerful nodes on the next optimization job or improve the efficiency of your algorithm.</p>
