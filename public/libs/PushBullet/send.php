<?php

require 'PushBullet.class.php';

try {

    $p = new PushBullet('3dBoFn7Gj5xbAqEkrahARyg4mJ7oH5Vs');

    print_r($p->getDevices());
    print_r($p->getContacts());
    print_r($p->getUserInformation());


    $p->pushNote('', 'Eduardo', 'Destruti');


//    print_r($p->getUserInformation()->name);
//    print_r($p->getUserInformation()->email);
//    print_r($p->getPushHistory(1400441645));

//    $p->pushNote('me@example.com', 'Hey!', 'It works!');

//    // Push to device s2GBpJqaq9IY5nx a note with a title 'Hey!' and a body 'It works!'
//    $p->pushNote('s2GBpJqaq9IY5nx', 'Hey!', 'It works!');
//
//    // Push to device gXVZDd2hLY6TOB1 a link with a title 'ivkos at GitHub', a URL 'https://github.com/ivkos' and body 'Pretty useful.'
//    $p->pushLink('gXVZDd2hLY6TOB1', 'ivkos at GitHub', 'https://github.com/ivkos', 'Pretty useful.');
//
//    // Push to device a91kkT2jIICD4JH a Google Maps address with a name 'Google HQ' and an address '1600 Amphitheatre Parkway'
//    $p->pushAddress('a91kkT2jIICD4JH', 'Google HQ', '1600 Amphitheatre Parkway');
//
//    // Push to device qVNRhnXxZzJ95zz a to-do list with a title 'Shopping List' and items 'Milk' and 'Butter'
//    $p->pushList('qVNRhnXxZzJ95zz', 'Shopping List', array('Milk', 'Butter'));
//
//    // Push to device 0PpyWzARDK0w6et the file '../pic.jpg' of MIME type image/jpeg
//    // Method accepts absolute and relative paths.
//    $p->pushFile('0PpyWzARDK0w6et', '../pic.jpg', 'image/jpeg');
//    // If the MIME type argument is omitted, an attempt to guess it will be made.
//    $p->pushFile('0PpyWzARDK0w6et', '../pic.jpg');
//
//
//    #### Pushing to multiple devices
//
//    // Push to all of your own devices, if you set the first argument to NULL or an empty string
//    $p->pushNote(NULL, 'Some title', 'Some text');
//    $p->pushNote('', 'Some title', 'Some text');
//
//
//
//    #### Delete methods
//
//    // Delete the push notification with the 'iden' specified
//    $p->deletePush('a91kkT2jIICD4JH');
//
//    // Delete the device with the 'iden' specified
//    $p->deleteDevice('s2GBpJqaq9IY5nx');
//
//    // Delete the contact with the 'iden' specified
//    $p->deleteContact('0PpyWzARDK0w6et');

} catch (PushBulletException $e) {
    // Exception handling
    die($e->getMessage());
}

?>