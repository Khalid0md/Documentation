<p>
    We regularly update the CLI to add new features and to fix issues. Therefore, it's important to keep both the CLI and the Docker images that the CLI uses up-to-date.
</p>

<?=$leanCli ? "<h4>Keep the CLI Up-To-Date</h4>" : "" ?>
<p>
    To update the CLI to the latest version, run <code>pip install --upgrade lean</code>. The CLI automatically performs a version check once a day and warns you in case you are running an outdated version.
</p>

<h4>Keep the Docker Images Up-To-Date</h4>
<p>
    Various commands like <code>lean backtest</code>, <code>lean optimize</code> and <code>lean research</code> run the LEAN engine in a Docker container to ensure all the required dependencies are available. When you run these commands for the first time the Docker image containing LEAN and its dependencies is downloaded and stored. Run these commands with the <code>--update</code> flag to update the images they use. Additionally, these commands automatically perform a version check once a week and update the image they use when you are using an outdated Docker image.
</p>
