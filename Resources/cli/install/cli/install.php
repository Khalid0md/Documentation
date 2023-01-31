<p>Before you install the LEAN CLI, check if it's already installed.</p>
<div class='cli section-example-container'>
     <pre>$ lean --version</pre>
</div>
<p>If the LEAN CLI is already installed, <a href='/docs/v2/lean-cli/installation/installing-lean-cli#03-Stay-Up-To-Date'>upgrade it</a> instead of installing it again.</p>
    
<p>Follow these steps to install the LEAN CLI:</p>

<ol>
    <li><a href='<?=$pipLink?>'>Install pip</a>.</li>
    <li><a href='<?=$dockerLink?>'>Install Docker</a>.</li>
    <li>If you are on a Windows machine, open PowerShell as the adminstrator for the following commands.</li>
    <li>Install the LEAN CLI with pip.
    <div class='cli section-example-container'>
        <pre>$ pip install lean</pre>
     </div>
     <p>This command downloads all the CLI's dependencies and makes the <code>lean</code> command available in the terminal.</p>
         
     <p>If you get an error message and you're using Windows, open PowerShell as an administrator and run the command again.</p>
     </li>
    <li>If you use Linux, you may need to install <code>tkinter</code>
    <div class='cli section-example-container'>
        <pre>$ sudo apt-get install python3-tk</pre>
    </div>
    </li>
    <li>Verify the installation was successful.
    <div class='cli section-example-container'>
        <pre>$ lean --version</pre>
    </div>
    </li>
</ol>