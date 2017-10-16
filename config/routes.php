<?php

// Kirjautumislomakkeen esittäminen
$routes->get('/login', function() {
    MarjastajaController::kirjauduSisaan();
});

// Kirjautumisen käsittely
$routes->post('/login', function() {
    MarjastajaController::kasitteleKirjautuminen();
});

// Uloskirjautumisen käsittely
$routes->post('/logout', function(){
    MarjastajaController::kirjauduUlos();
});


$routes->get('/', function() {
    MarjaController::index();
});

$routes->get('/marjat', function() {
    MarjaController::index();
});

// Poistettava lopuksi, testireitti.
//$routes->get('/marjastaja/paikka', function() {
//    PaikkaController::show(1);
//});

$routes->get('/marjastaja/:id/paikat', function($id) {
    PaikkaController::paikat($id);
});

$routes->get('/marjastaja/:id/paikat/new', function($id) {
    PaikkaController::lisaaPaikka($id);
});

// Uuden paikan tallentaminen googlemaps-kartalta tehty get-komennolla ja parametreillä.
$routes->get('/marjastaja/:id/paikat/tallenna', function($id) {
    PaikkaController::tallennaPaikka($id);
});

// Uuden paikan tallentaminen lomakkeella.
$routes->post('/marjastaja/:id/paikat/save', function($id) {
    PaikkaController::tallennusKasittele($id);
});

//$routes->get('/marjastaja/:id/paikat/save', function($id) {
//    PaikkaController::savePaikkaForm($id);
//});


// Käynnin poistaminen.
$routes->post('/marjastaja/:marjastaja_id/paikat/:paikka_id/kaynti/:kaynti_id/poista', function($marjastaja_id, $paikka_id, $kaynti_id) {
    
    PaikkaController::poistaKaynti($marjastaja_id, $paikka_id, $kaynti_id);
});

// Käynnin editointinäkymä
$routes->get('/marjastaja/:marjastaja_id/paikat/:paikka_id/kaynti/:kaynti_id/muokkaa', function($marjastaja_id, $paikka_id, $kaynti_id) {
    PaikkaController::muokkaaKaynti($marjastaja_id, $paikka_id, $kaynti_id);
});


// Paikan poistaminen.
$routes->post('/marjastaja/:marjastaja_id/paikat/:paikka_id/poista', function($marjastaja_id, $paikka_id) {
    
    PaikkaController::poista($marjastaja_id, $paikka_id);
});

// Paikan editointinäkymä
$routes->get('/marjastaja/:marjastaja_id/paikat/:paikka_id/muokkaa', function($marjastaja_id, $paikka_id) {
    PaikkaController::muokkaa($marjastaja_id, $paikka_id);
});

$routes->get('/marjastaja/:marjastaja_id/paikat/:paikka_id', function($marjastaja_id, $paikka_id) {
//    Kint::dump($marjastaja_id);
//    Kint::dump($paikka_id);
    PaikkaController::nayta($marjastaja_id, $paikka_id);
});

// Paikan tietojen muuttaminen.
$routes->post('/marjastaja/:marjastaja_id/paikat/:paikka_id/saveChanged', function($marjastaja_id, $paikka_id) {
    
    PaikkaController::muokkausKasittele($marjastaja_id, $paikka_id);
});


// Poistettava lopuksi, testireitti. Vastaava oikea on toteutettu.
$routes->get('/marja', function() {
    HelloWorldController::marja();
});

$routes->get('/marjat/new', function() {
    MarjaController::lisaaMarja();
});

$routes->post('/marjat/new', function() {
    MarjaController::tallennaMarja();
});


$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});



$routes->get('/marja/:id', function($id) {
    MarjaController::nayta($id);
});

$routes->get('/marja/:id/rename', function($id) {
    MarjaController::muokkausNakyma($id);
});

$routes->post('/marja/:id/delete', function($id) {
    MarjaController::poista($id);
});


$routes->post('/marja/rename', function() {
    MarjaController::muutaNimeaKasittele();
});



