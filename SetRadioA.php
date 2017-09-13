<?php
$mpcPause= "mpc pause";
$mpcClear= "mpc clear";
$mpcadd= "mpc add http://uk2.internet-radio.com:8024/stream";
$mpcPlay= "mpc play";

shell_exec($mpcPause);
shell_exec($mpcClear);
shell_exec($mpcadd);
shell_exec($mpcPlay);

?>
