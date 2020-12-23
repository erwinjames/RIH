<?php

require __DIR__ . "/../lib/PayMaya/PayMayaSDK.php";
require __DIR__ . "/../lib/PayMaya/API/Checkout.php";
require __DIR__ . "/../lib/PayMaya/API/Customization.php";
require __DIR__ . "/../lib/PayMaya/API/Webhook.php";
require __DIR__ . "/../lib/PayMaya/Core/CheckoutAPIManager.php";
require __DIR__ . "/../lib/PayMaya/Core/Constants.php";
require __DIR__ . "/../lib/PayMaya/Core/HTTPConfig.php";
require __DIR__ . "/../lib/PayMaya/Core/HTTPConnection.php";
require __DIR__ . "/../lib/PayMaya/Model/Checkout/Address.php";
require __DIR__ . "/../lib/PayMaya/Model/Checkout/Buyer.php";
require __DIR__ . "/../lib/PayMaya/Model/Checkout/Contact.php";
require __DIR__ . "/../lib/PayMaya/Model/Checkout/Item.php";
require __DIR__ . "/../lib/PayMaya/Model/Checkout/ItemAmount.php";
require __DIR__ . "/../lib/PayMaya/Model/Checkout/ItemAmountDetails.php";

function checkout()
{
    PayMayaSDK::getInstance()->initCheckout(
        env('pk-lNAUk1jk7VPnf7koOT1uoGJoZJjmAxrbjpj6urB8EIA'),
        env('sk-fzukI3GXrzNIUyvXY3n16cji8VTJITfzylz5o5QzZMC'),
        (\App::environment('production') ? 'PRODUCTION' : 'SANDBOX')
    );

    $sample_item_name = 'Product 1';
    $sample_total_price = 1000.00;

    $sample_user_phone = '1234567';
    $sample_user_email = 'test@gmail.com';
    
    $sample_reference_number = '1234567890';

    // Item
    $itemAmountDetails = new ItemAmountDetails();
    $itemAmountDetails->shippingFee = "14.00";
    $itemAmountDetails->tax = "5.00";
    $itemAmountDetails->subtotal = "50.00";
    $itemAmount = new ItemAmount();
    $itemAmount->currency = "PHP";
    $itemAmount->value = "69.00";
    $itemAmount->details = $itemAmountDetails;
    $item = new Item();
    $item->name = "Leather Belt";
    $item->code = "pm_belt";
    $item->description = "Medium-sized belt made from authentic leather";
    $item->quantity = "1";
    $item->amount = $itemAmount;
    $item->totalAmount = $itemAmount;
    

    // Checkout
    $itemCheckout = new Checkout();

    $user = new PayMayaUser();
    $user->contact->phone = $sample_user_phone;
    $user->contact->email = $sample_user_email;

    $itemCheckout->items = array($item);
    $itemCheckout->totalAmount = $itemAmount;
    $itemCheckout->requestReferenceNumber = "123456789";
    $itemCheckout->redirectUrl = array(
        "success" => "https://shop.com/success",
        "failure" => "https://shop.com/failure",
        "cancel" => "https://shop.com/cancel"
        );
    
        $itemCheckout->execute();

        echo $itemCheckout->id; // Checkout ID
        echo $itemCheckout->url; // Checkout URL;
}