<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-fbRS2R41tajkVlErW9dc1brm';
Config::$clientKey = 'SB-Mid-client-STuz749NTQbZjtMy';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;

include "../../../config.php";
Config::$isSanitized = Config::$is3ds = true;
$order_id = $_GET['order_id'];

$query = "SELECT * FROM beli WHERE order_id='$order_id'";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_array($sql);

$email = $data['users_email'];
$biaya = $data['harga_beli'];
$nama = $data['nama_pembeli'];
// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $biaya, // no decimal allowed for creditcard
);
// Optional
$item_details = array (
    array(
        'id' => $order_id,
        'price' => $biaya,
        'quantity' => 1,
        'name' => "Pembayaran Aurellista Store"
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => $nama,
    'last_name'     => "",
    'email'         => $email,
    'phone'         => "",
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-fbRS2R41tajkVlErW9dc1brm\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html>
    <body>
        <button id="pay-button">Pay!</button>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>');
            };
        </script>
    </body>
</html>
