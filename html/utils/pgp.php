<?php
  $gpg = new gnupg();
  $gpg -> addencryptkey("DEADBEEFCAFEDEADBEEFCAFEDEADBEEFCAFE");
  $gpg -> adddecryptkey("DEADBEEFCAFEDEADBEEFCAFEDEADBEEFCAFE");

  $enc = $gpg -> encrypt("just a test");
  echo $enc;
?>