# ServerPDO
<span><img src="https://img.shields.io/github/issues/antreasoum/ServerPDO">
<img src="https://img.shields.io/github/forks/antreasoum/ServerPDO">
<img src="https://img.shields.io/github/stars/antreasoum/ServerPDO">
<img src="https://img.shields.io/github/license/antreasoum/ServerPDO"></span>

<h4>In order for this repo to work you should do the following:</h4>

<ol>
<li>Place the files in a folder called <b>"htdocs"</b> inside XAMP/MAMP/WAMP directory
<li>Create a database and name it however you like
<li>After creating the database, import in SQL this code:

  <i> CREATE TABLE  `users` ( <br>
  `user_id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,<br>
  `name` VARCHAR( 50 ) NOT NULL ,<br>
  `email` VARCHAR( 100 ) NOT NULL ,<br>
  `username` VARCHAR( 50 ) NOT NULL ,<br>
  `password` VARCHAR( 250 ) NOT NULL<br>
  ) ENGINE = INNODB ;</i>
 
<li>Configure this part of <b>"conn.php"</b> to your liking & change the <b>dbname=""</b> to the name you gave the database:

    $servername = "localhost";
    $username = "alpha";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=loginsystempdo", $username, $password);

Although the global default is:

    $servername = "localhost";
    $username = "root";
    $password = "";https://img.shields.io/github/issues/antreasoum/ServerPDO
