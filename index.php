<?php

require_once __DIR__ . '/vendor/autoload.php';

use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Requests\SendNotificationsRequest;
use true9\OSWrapper\Requests\ViewDeviceRequest;
use true9\OSWrapper\Requests\ViewDevicesRequest;
use true9\OSWrapper\Requests\ViewNotificationRequest;
use true9\OSWrapper\Requests\ViewNotificationsRequest;

//$notificationRequest = new SendNotificationsRequest();
//$notificationRequest->setIncludedSegments(['Subscribed Users'])
//    ->setAppId('ABC-123')
//    ->setContents([
//        'en' => 'Test notification english content'
//    ])
//    ->setHeadings([
//        'en' => 'Test notification english heading'
//    ])
//    ->setData(null)
//    ->setUrl(null)
//    ->setChromeWebImage(null);
//
//die(dump($notificationRequest));

putenv('ONESIGNAL_API_KEY=NzBkOGEyNzEtZDY2OC00NzhiLTg5ODgtNTcxZDFlOWJjYjU5');

//$deviceReq = new ViewDevicesRequest();
//$deviceReq->setAppId('6e3d1a41-9fe2-44a9-9a5b-f081b8c44ebc');
//
//try {
//    die(dump($deviceReq->dispatch()));
//} catch (\true9\OSWrapper\Exceptions\IllegalArgumentException $e) {
//    die(dump($e));
//}

//$playerReq = new ViewDeviceRequest();
//$playerReq->setPlayerId('c33f8adc-c25a-44b7-8d41-13fd9d0c42b5-invalid-invalid-invalid')
//    ->setAppId('6e3d1a41-9fe2-44a9-9a5b-f081b8c44ebc');
//
//try {
//    die(dump($playerReq->dispatch()));
//} catch (IllegalArgumentException $e) {
//    die(dump($e));
//}

//$notificationsReq = new ViewNotificationsRequest();
//$notificationsReq->setAppId('6e3d1a41-9fe2-44a9-9a5b-f081b8c44ebc');
//
//try {
//    $output = $notificationsReq->dispatch();
//} catch (IllegalArgumentException $e) {
//    die(dump($e));
//}
//
//$notifications = $output->data['notifications'];
//print(count($notifications));

$notificationReq = new ViewNotificationRequest();
$notificationReq->setNotificationId('4e24d684-96b9-441c-a4c7-553d812441ab-invalid')
    ->setAppId('6e3d1a41-9fe2-44a9-9a5b-f081b8c44ebc');

$result = $notificationReq->dispatch();

die(dump($result));
