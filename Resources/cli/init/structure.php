<div class='section-example-container'>
<pre>.
├── data/
│&nbsp;&nbsp; ├── alternative/
│&nbsp;&nbsp; ├── cfd/
│&nbsp;&nbsp; ├── crypto/
│&nbsp;&nbsp; ├── equity/
│&nbsp;&nbsp; ├── forex/
│&nbsp;&nbsp; ├── future/
│&nbsp;&nbsp; ├── futureoption/
│&nbsp;&nbsp; ├── index/
│&nbsp;&nbsp; ├── indexoption/
│&nbsp;&nbsp; ├── market-hours/
│&nbsp;&nbsp; ├── option/
│&nbsp;&nbsp; ├── symbol-properties/
│&nbsp;&nbsp; └── readme.md
└── lean.json</pre>
</div>

<p>
    These files contain the following content:
</p>

<table class='qc-table table'>
    <thead>
        <tr>
            <th>File/Directory</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><span class='public-directory-name'>data /</span></td>
            <td>This directory contains the <?=$leanCli ? "<a href='/docs/v2/lean-cli/datasets/local-data'>local data</a>" : "local data"?> that is used when running the LEAN engine locally. This directory is filled with <a rel='nofollow' href='https://github.com/QuantConnect/Lean/tree/master/Data' target='_blank'>sample data from the QuantConnect/Lean repository</a>.</td>
        </tr>
    
        <tr>
            <td><span class='public-file-name'>lean.json</span></td>
            <td>This file contains the <?=$leanCli ? "<a href='/docs/v2/lean-cli/initialization/configuration#03-Lean-Configuration'>Lean configuration</a>" : "Lean configuration"?> that is used when running the LEAN engine locally. <?=$leanCli ? "" : "The configuration is stored as JSON with support for both single-line and multiline comments. The Lean configuration file is based on the <a href='https://github.com/QuantConnect/Lean/blob/master/Launcher/config.json' rel='nofollow' target='_blank'>Launcher/config.json</a> file from the Lean repository. When you create a new workspace, the latest version of this file is downloaded and stored on your local drive."?></td>
        </tr>
    </tbody>
</table>
