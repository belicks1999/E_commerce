<?php
require('stripe-php-master/init.php');

$publish="pk_test_51LwRWfLILwi1PdxytxH8PRjGKaGqz8MiFopG2wE9BsHfs8DkqN16RPAW421oka6Xf0VWXTRTZ3IQxRhstMXuy3Em00deNmGkXU";

$secret="sk_test_51LwRWfLILwi1PdxymSLLWUTxDpj07TwBewR1B15cFk5y06iQRbpFffPbNtDxtuCDDWJVekPazpeDgYdJ5aIVytlb00lJkK0avW";

\Stripe\Stripe::setApiKey($secret);

?>