<p>Follow these steps to rename a project:</p>
<ol>
    <li><a href='{$openProjectLink}'>Open the project</a>.</li>
    <?=$localPlatform ? "<li>In the left navigation menu, click the <img class='inline-icon' src='https://cdn.quantconnect.com/i/tu/vscode-qc-icon.jpg'> <span class='icon-name'>QuantConnect</span> icon.</li>" : "" ?>
    <li>In the Project panel, hover over the project name and then click the <span class='icon-name'>pencil</span> icon that appears.</li>
    <img class='docs-image' style='max-height: 120px' src='https://cdn.quantconnect.com/i/tu/rename-project-1.png' alt='Rename a project'>
    <li>In the <span class='field-name'>Name</span> field, enter the new project name and then click <span class='button-name'>Save Changes</span>.</li>
</ol>  
<p>
    <? include(DOCS_RESOURCES."/cli/project-name-rules.html")?>
</p>