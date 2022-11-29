<?php
include 'StoreOwner.php';
include 'Affiliate.php';
include 'Customer.php';
include 'Order.php';


$storeOwner = new StoreOwner();
$storeOwner->setName('Moyes Store Owner');
$storeOwner->setBlance(0);
echo "Chủ cửa hàng tên: " . $storeOwner->getName() . " có số dư " . $storeOwner->printBlance() . "$";

$affiliate = new Affiliate();
$affiliate->setName('Affiliate John');
$affiliate->setBlance(0);

$affiliateSarah = new Affiliate();
$affiliateSarah->setName('Sarah');
$affiliateSarah->setBlance(0);
$affiliateSarah->setUpperAffiliate($affiliate);


$affiliateEva = new Affiliate();
$affiliateEva->setName('Eva');
$affiliateEva->setBlance(0);
$affiliateEva->setUpperAffiliate($affiliate);

$affiliateJimmy = new Affiliate();
$affiliateJimmy->setName('Jimmy');
$affiliateJimmy->setBlance(0);
$affiliateJimmy->setUpperAffiliate($affiliate);

$affiliateHenry = new Affiliate();
$affiliateHenry->setName('Henry');
$affiliateHenry->setBlance(0);
$affiliateHenry->setUpperAffiliate($affiliate);


echo "<br>Affilliate: " . $affiliate->getName() . " có các sub-affiliate tên lần lượt là " . $affiliate->printSubAff();

$customer1 = new Customer();
$customer1->setName('Customer 1');
$customer1->setAddress('Dong Anh - Ha Noi');
$customer1->setAffiliate($affiliateSarah);
$totalOrderOfCustomer1 = 800;
$customer1->placeOrder($storeOwner, $totalOrderOfCustomer1);
echo '<br>Khách hàng ' . $customer1->getName() . ' được ' . $customer1->getAffiliate()->getName() . ' giới thiệu đã mua ' . $totalOrderOfCustomer1 . '$, số dư hiện tại của chủ shop: ' . $storeOwner->printBlance() . '$';



$customer2 = new Customer();
$customer2->setName('Customer 2');
$customer2->setAddress('Dong Anh - Ha Noi');
$customer2->setAffiliate($affiliateEva);
$totalOrderOfCustomer2 = 800;
$customer2->placeOrder($storeOwner, $totalOrderOfCustomer2);
echo '<br>Khách hàng ' . $customer2->getName() . ' được ' . $customer2->getAffiliate()->getName() . ' giới thiệu đã mua ' . $totalOrderOfCustomer2 . '$, số dư hiện tại của chủ shop: ' . $storeOwner->printBlance() . '$';


$customer3 = new Customer();
$customer3->setName('Customer 3');
$customer3->setAddress('Dong Anh - Ha Noi');
$customer3->setAffiliate($affiliateJimmy);
$totalOrderOfCustomer3 = 800;
$customer3->placeOrder($storeOwner, $totalOrderOfCustomer3);
echo '<br>Khách hàng ' . $customer3->getName() . ' được ' . $customer3->getAffiliate()->getName() . ' giới thiệu đã mua ' . $totalOrderOfCustomer3 . '$, số dư hiện tại của chủ shop: ' . $storeOwner->printBlance() . '$';



$customer4 = new Customer();
$customer4->setName('Customer 4');
$customer4->setAddress('Dong Anh - Ha Noi');
$customer4->setAffiliate($affiliateHenry);
$totalOrderOfCustomer4 = 800;
$customer4->placeOrder($storeOwner, $totalOrderOfCustomer4);
echo '<br>Khách hàng ' . $customer4->getName() . ' được ' . $customer4->getAffiliate()->getName() . ' giới thiệu đã mua ' . $totalOrderOfCustomer4 . '$, số dư hiện tại của chủ shop: ' . $storeOwner->printBlance() . '$';


$customer5 = new Customer();
$customer5->setName('Customer 5');
$customer5->setAddress('Dong Anh - Ha Noi');
$customer5->setAffiliate($affiliateJimmy);
$totalOrderOfCustomer5 = 800;
$customer5->placeOrder($storeOwner, $totalOrderOfCustomer2);
echo '<br>Khách hàng ' . $customer5->getName() . ' được ' . $customer5->getAffiliate()->getName() . ' giới thiệu đã mua ' . $totalOrderOfCustomer5 . '$, số dư hiện tại của chủ shop: ' . $storeOwner->printBlance() . '$';


echo "<br>Số dư lần lượt của: " . $affiliate->printSubAff() . " có các số dư tương ứng lần lượt là " . $affiliate->printBlanceOfSubAff();
echo "<br>Affilliate: " . $affiliate->getName() . " có số dư là " . $affiliate->getBlance() . "$";
echo '<br>John => ' . $affiliate->withDraw(-20);
echo '<br>John => ' . $affiliate->withDraw(300);
echo '<br>John => ' . $affiliate->withDraw(150);
echo '<br>John => ' . $affiliate->withDraw(150);
echo '<br>Sarah => ' . $affiliateSarah->withDraw(50);
echo '<br>Tổng tiền của chủ cửa hàng: ' . $storeOwner->printBlance() . '$';

$customer6 = new Customer();
$customer6->setName('Customer 6');
$customer6->setAddress('Dong Anh - Ha Noi');

$affiliateNew = new Affiliate();
$affiliateNew->setName('Affiliate New');
$affiliateNew->setBlance(0);

echo '<br>Eva => ' . $affiliateEva->refer('Customer', $customer6);
echo '<br>Eva => ' . $affiliateEva->refer('Affiliate', $affiliateNew);
echo "<br>Eva => Tên khách hàng: " . $affiliateEva->printCustomers();
echo "<br>Eva => Tên sub-affiliate: " . $affiliateEva->printSubAff();

echo "<br>Henry => Tên khách hàng: " . $affiliateHenry->printCustomers();
echo "<br>Henry => Tên sub-affiliate: " . $affiliateHenry->printSubAff();
