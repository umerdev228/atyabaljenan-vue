<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    //
    public function index(){
        $token =  "JIHT9zBxgWqoUV0yNaJWx2-siO-JjF7HKceTEaeDR_vNbHIIUH65lqGOp3HvqlU6m14quhrXDhDS5PszKoY5oX6yxzgNYlV5L-SS74jsDNJMQNG35tA4J6pSPT2mUhejkgniuRDajyIWq6quGk5oT0lln_xi2SuR1onUf-1vgZOF4-poIVkv4vNotsoqqa2pRBx1LZiS4QEEfVvH4MQ9WQ0JPCbbI2pKL3L3FyGU8wR8bBmgbUnHRovKtkC75SP1_nsO5dYwPNjcqLtYI6qd5TsBT5UDTt8l9HZ99OJ7Ze4OJylQhj7roCkxksaPzZs5qJtnlaIa2QTvhvV7nsl6q03o9oZO0uFHTr1HlADk_bRlfNqSgieg6bqUT9mp3RTfryPPEf15XSyVPq0STnx4pgvpo-PtfeQxg-ECqz3QR1yq8r2cHk_d_0zWLRUqDxEAsrzKD4jLfW9piTZucxSKOq8SdI_XbUHTDQWfe14wke9RGE4U0fhT8VyZqKg7lJ41pLUf7cYcuNXMDO0vpF4qulquNIIRkXNTN0ltSnVlXC1HClDX2tRBK10danH4FelkYNwpu5vnYb7qPpXP-TuvDxnvEAUiHQdjaFZs6OcVOsOdyU5uoesSm2Ap4LtekbYYqrSQZw_z2Bzzm9WLLMfroaJ860j_bPwNi4ZXF8TsN2HZDWq1W08oiNvxVXCW0-v9OIV1HQ"; #token value to be placed here;
$basURL = "https://apitest.myfatoorah.com";
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "$basURL/v2/InitiatePayment",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"InvoiceAmount\": 100,\"CurrencyIso\": \"KWD\"}",
    CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
//    dd($response);
//    return "$response '<br />'";
}

####### Execute Payment ######
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "$basURL/v2/ExecutePayment",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"PaymentMethodId\":\"2\",\"CustomerName\": \"Ahmed\",\"DisplayCurrencyIso\": \"KWD\", \"MobileCountryCode\":\"+965\",\"CustomerMobile\": \"92249038\",\"CustomerEmail\": \"aramadan@myfatoorah.com\",\"InvoiceValue\": 100,\"CallBackUrl\": \"https://google.com\",\"ErrorUrl\": \"https://google.com\",\"Language\": \"en\",\"CustomerReference\" :\"ref 1\",\"CustomerCivilId\":12345678,\"UserDefinedField\": \"Custom field\",\"ExpireDate\": \"\",\"CustomerAddress\" :{\"Block\":\"\",\"Street\":\"\",\"HouseBuildingNo\":\"\",\"Address\":\"\",\"AddressInstructions\":\"\"},\"InvoiceItems\": [{\"ItemName\": \"Product 01\",\"Quantity\": 1,\"UnitPrice\": 100}]}",
    CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
dd($response);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "$response '<br />'";

}
    }
}
