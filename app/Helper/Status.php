<?php
namespace App\Helper;

class Status
{
    public $error = [
        'USER_PASSWORD_NOT_MATCH' => [
            'errorCode' => 20000,
            'message' => 'User and password does not match.',
        ],
        'EMAIL_REGISTERED' => [
            'errorCode' => 20001,
            'message' => 'Email has been registered before.',
        ],
        'EMAIL_NOT_REGISTERED' => [
            'errorCode' => 20003,
            'message' => 'Email not registered.',
        ],
        'PHONE_REGISTERED' => [
            'errorCode' => 20002,
            'message' => 'Phone has been registered before.',
        ],

        'USER_NOT_FOUND' => [
            'errorCode' => 20100,
            'message' => 'User not found.',
        ],
        'USER_NOT_VERIFIED' => [
            'errorCode' => 20101,
            'message' => 'User not verified.',
        ],
        'MEMBER_ALREADY_VERIFIED' => [
            'errorCode' => 20102,
            'message' => 'Member already verified.',
        ],
        'CURRENT_PASSWORD_WRONG' => [
            'errorCode' => 20700,
            'message' => 'Current Password Wrong.',
        ],
        'PASSWORD_NOT_MATCH' => [
            'errorCode' => 20800,
            'message' => 'Password and confirm password not match.',
        ],


        'PRESS_NOT_FOUND' => [
            'errorCode' => 20200,
            'message' => 'Press not found.',
        ],

        'BILLING_ADDRESS_NOT_FOUND' => [
            'errorCode' => 20300,
            'message' => 'Billing address not found.',
        ],

        'SHIPPING_ADDRESS_NOT_FOUND' => [
            'errorCode' => 20400,
            'message' => 'Shipping address not found.',
        ],

        'CART_EMPTY' => [
            'errorCode' => 20500,
            'message' => 'Cart empty. Make a purchase first.',
        ],
        'ORDER_NOT_FOUND' => [
            'errorCode' => 20501,
            'message' => 'Order not found.',
        ],
        'ORDER_ALREADY_PAID' => [
            'errorCode' => 20502,
            'message' => 'Order already paid.',
        ],
        'COUPON_NOT_FOUND' => [
            'errorCode' => 30500,
            'message' => 'Coupon not found.',
        ],
        'MINIMUM_SPEND_NOT_REACH' => [
            'errorCode' => 30501,
            'message' => 'Minimum spend not reach.',
        ],
        'MAXIMUM_SPEND' => [
            'errorCode' => 30502,
            'message' => 'Exceeded maximum spend.',
        ],
        'PRODUCT_CANT_GET_DISCOUNT' => [
            'errorCode' => 30503,
            'message' => 'Product in your cart cant get discount.',
        ],
        'EXCEED_LIMIT_COUPON' => [
            'errorCode' => 30504,
            'message' => 'You Exceeded limit coupon.',
        ],
        'COUPON_EXCEED_USAGE_LIMIT' => [
            'errorCode' => 30505,
            'message' => 'Coupon exceed usage limit.',
        ],
        'GSS_MORE_DISCOUNT' => [
            'errorCode' => 30506,
            'message' => 'GSS Get more discount.',
        ],
        'COUPON_RESELLER_OWN_USAGE' => [
            'errorCode' => 30507,
            'message' => 'You cannot use your own reseller coupon.',
        ],

        'RESTRICTED_PRODUCT_COUNTRY' => [
            'errorCode' => 30600,
            'message' => 'Product cannot be shipped to your country.',
            'payload' => []
        ],
        'SINGAPORE_CANT_COD' => [
            'errorCode' => 30607,
            'message' => 'COD is not allowed to Singapore.',
        ],
        'COD_ONLY_KYLAZ' => [
            'errorCode' => 30608,
            'message' => 'COD is only for kylaz product.',
        ],
        '12_CANT_VOUCHER' => [
            'errorCode' => 30609,
            'message' => '12 12 Product cant use voucher.',
        ],
        'POINT_NOT_ENOUGH' => [
            'errorCode' => 30700,
            'message' => 'Your point is not enough.',
        ],
        'FREE_SHIPPING_NOT_AVAILABLE' => [
            'errorCode' => 30800,
            'message' => 'Free Shipping not available in your country.',
        ],
        'ONLY_PUSH_FIVE' => [
            'errorCode' => 30900,
            'message' => 'Each member only can push 5 times.',
        ],
        'NOT_BLACKFRIDAY_PRODUCT' => [
            'errorCode' => 30100,
            'message' => 'This product in not black friday product.',
        ],
        'ONLY_PUSH_ONE_PRODUCT' => [
            'errorCode' => 30110,
            'message' => 'Each member only can push 1 for each product.',
        ],

        'NOT_AUTHORIZED' => [
            'errorCode' => 40100,
            'message' => 'Not Authorized.',
        ],
        'FORBIDDEN' => [
            'errorCode' => 40300,
            'message' => 'Not Authorized.',
        ],
        'DATA_NOT_FOUND' => [
            'errorCode' => 40500,
            'message' => 'Data Not Found.',
        ],
        'ERROR_UPDATE_CART' => [
            'errorCode' => 40600,
            'message' => 'Update Cart Failed.',
        ],
        'PRODUCT_NOT_FOUND' => [
            'errorCode' => 40700,
            'message' => 'Product Not Found.',
        ],
        'SHIPPING_STATUS_FOUND' => [
            'errorCode' => 40900,
            'message' => 'Shipping status already in order.',
        ],
        'NOT_ENOUGH_STOCK' => [
            'errorCode' => 50010,
            'message' => 'not enough stock.',
        ],
    ];
}
