<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><style type="text/css">
/*<![CDATA[*/
h1{
  font-size:20px;
  padding-bottom:8px;
}
p{
  color:#999;
  padding:7px;
  line-height:1.6em;
  width:500px;
}
/*]]>*/
</style>
<h1>Homkora API Documentation</h1><p><?php	require_once "/var/www/Homkora/app/vendors/markdown/markdown.php";$markdown___=new Markdown_Parser();echo  $markdown___->transform("Projects
=======

*****

**Retrieve Projects:**

Required Params: partner

  <?php

    \$url = 'http://homkora.com/projects.xml?partner=APIKEYHERE';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**Add Projects:**

Required Params: partner - title - description

  <?php

    \$url = 'http://homkora.com/projects/add.xml?partner=APIKEYHERE&title=test&description=test';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**Edit Projects:**

Required Params: partner - title and/or description

  <?php

    \$url = 'http://homkora.com/projects/edit/PROJECTID.xml?partner=APIKEYHERE&title=test&description=test';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

*****

Timers
=======

*****

**Retrieve Timer:**

Required Params: partner

  <?php

    \$url = 'http://homkora.com/timers.xml?partner=APIKEYHERE';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****
");?></p>