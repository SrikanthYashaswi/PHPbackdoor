# This is a simple utility to access and edit files in the directory.
I was inspired to write this when i felt it increasingly difficult to make small changes in live PHP websites.
This shell can create new files, edit files and read files.
also since there were chances that my changes can break the whole website, i also added a rollback command to reverse to previous code.

<h1>Usage</h1>
<h3>To login in index.html inputbox</h3><br>
<code>'@username:password'</code><br>
<h3>To logout</h3><br>
<code>'~'</code><br>
<h3>Create file</h3>
<code>!new file.html</code>
<h3>read file </h3>
<code>!read file.html</code>
<h3> Write file <h3>
<code>!read file.html  >  (check Write to activate textarea) > !write file.html </code>
<h3>List of other commands</h3>
<h4>--Most of the commands from cmd are supported except the commands that require elevated permission <h4>
