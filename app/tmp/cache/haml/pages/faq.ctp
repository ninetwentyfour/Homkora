<?php
require_once '/var/www/cake/app/vendors/haml/HamlHelpers.php';
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
<?php	require_once "/var/www/cake/app/vendors/markdown/markdown.php";$markdown___=new Markdown_Parser();echo  $markdown___->transform("What is Homkora?
=======

Homkora is a simple web based time tracking app. It was created to be a simpler alternative to existing time tracking apps.

Why should I care?
=======

Because it's fucking awesome. That's why.

What features does it have? Will it make me pie?
=======

No pie. Homkora keeps it simple by having projects and timers. That's it. Create projects to group your timers and get a grand total.

Can you add feature X?
=======

Probably not. But maybe. Send an email to contact@travisberry.com and I may add it.

Can I pay for an account with more features?
=======

Not right now. We are currently in beta so everyone has the same features and cost ($0). There is the idea of offering a premium service. But I don't know what that is yet. If you just want to give me money send an email to contact@travisberry.com and I will send you my address so you can mail a check.

Did you really just tell people they could send you money for no reason?
=======

Yes.

What is your privacy policy?
=======

Well this is teh internetz. If there's something you REALLY don't want to be public at some point, you shouldn't put it here. That said, Homkora will never sell or do anything bad with your data. Like all sites we may get hacked and lose it. (cough - gawker - cough) I will try to prevent that from happening though, but you never know.

");?>