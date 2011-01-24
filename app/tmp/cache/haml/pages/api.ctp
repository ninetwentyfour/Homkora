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

    \$url = 'http://api-homkora.apigee.com/projects.xml?partner=APIKEYHERE';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**Add Projects:**

Required Params: partner - title - description

  <?php

    \$url = 'http://api-homkora.apigee.com/projects/add.xml?partner=APIKEYHERE&title=test&description=test';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**Edit Projects:**

Required Params: partner - title and/or description

  <?php

    \$url = 'http://api-homkora.apigee.com/projects/edit/PROJECTID.xml?partner=APIKEYHERE&title=test&description=test';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**View Project:**

Required Params: partner

  <?php

    \$url = 'http://api-homkora.apigee.com/projects/view/PROJECTID.xml?partner=APIKEYHERE';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

*****

Timers
=======

*****

**Retrieve Timers:**

Required Params: partner

  <?php

    \$url = 'http://api-homkora.apigee.com/timers.xml?partner=APIKEYHERE';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**Add Timer:**

Required Params: partner - title - description - projectId - projectName - time

  <?php

    \$time = urlencode('00:00:00');

    \$url = 'http://api-homkora.apigee.com/timers/add.xml?partner=APIKEYHERE&title=EXAMPLE&description=EXAMPLE&projectId=EXAMPLE
    &projectName=EXAMPLE&time='.\$time;

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**Edit Timer:**

Required Params: partner

Optional Params: title - description - projectId - projectName - time

  <?php

    \$time = urlencode('00:00:00');

    \$url = 'http://api-homkora.apigee.com/timers/edit/TIMERID.xml?partner=APIKEYHERE&time='.\$time;

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:

*****

**View Timer:**

Required Params: partner

  <?php

    \$url = 'http://api-homkora.apigee.com/timers/view/TIMERID.xml?partner=APIKEYHERE';

    \$xml = simplexml_load_file(\$url);

    print_r(\$xml);

  ?>

Expected Result:
");?></p>