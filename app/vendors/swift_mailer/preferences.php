<?php

/****************************************************************************/
/*                                                                          */
/* YOU MAY WISH TO MODIFY OR REMOVE THE FOLLOWING LINES WHICH SET DEFAULTS  */
/*                                                                          */
/****************************************************************************/

// Sets the default charset so that setCharset() is not needed elsewhere
Swift_Preferences::getInstance()->setCharset('utf-8');

// Without these lines the default caching mechanism is "array" but this uses
// a lot of memory.
// If possible, use a disk cache to enable attaching large attachments etc
<<<<<<< HEAD
// if (function_exists('sys_get_temp_dir') && is_writable(sys_get_temp_dir()))
// {
//   Swift_Preferences::getInstance()
//     -> setTempDir(sys_get_temp_dir())
//     -> setCacheType('disk');
// }
=======
if (function_exists('sys_get_temp_dir') && is_writable(sys_get_temp_dir()))
{
  Swift_Preferences::getInstance()
    -> setTempDir(sys_get_temp_dir())
    -> setCacheType('disk');
}
>>>>>>> caf9a442dffd98d2b3d60a3c5742ce6078d50f66
