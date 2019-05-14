<?php

//
// ──────────────────────────────────────────────────────────────────── I ──────────
//   :::::: A U T H B A L L   I N D E X : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────
//

//
// ───────────────────────────────────────────────────────────────── REQUIRES ─────
//
    require_once('controller/routeController.php');
    require_once('controller/homeController.php');
    require_once('controller/signupController.php');
    require_once('controller/signinController.php');
    require_once('controller/authController.php');
    require_once('controller/profileController.php');
//
// ──────────────────────────────────────────────────────────────── VARIABLES ─────
//
    $currentPage = null;
    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }
// ────────────────────────────────────────────────────────────────────────────────

//
// ───────────────────────────────────────────────────────────────────── HOME ─────
//
    if($currentPage == 'home' || $currentPage == null ){
        showHomePage();
    }
// ────────────────────────────────────────────────────────────────────────────────

//
// ────────────────────────────────────────────────────────────────── SIGN UP ─────
//
    if($currentPage == 'signup'){
        showSignUpPage();
    }
// ────────────────────────────────────────────────────────────────────────────────


//
// ────────────────────────────────────────────────────────────────── SIGN IN ─────
//
    if($currentPage == 'signin'){
        showSignInPage();
    }
// ────────────────────────────────────────────────────────────────────────────────

//
// ─────────────────────────────────────────────────────────── AUTHENTICATION ─────
//
    if($currentPage == 'auth'){
        session_start();
        if(isset($_SESSION['user_id'])){
            if(!isset($_SESSION['authenticated'])){
                showAuth();
            } else {
                showProfile();
            }
        } else {
            unset($_SESSION['user_id']);
            session_destroy();
            header('location: ./signin');             
        }
    }
// ────────────────────────────────────────────────────────────────────────────────

//
// ────────────────────────────────────────────────────────────────── PROFILE ─────
//
    if ($currentPage == 'profile') {
        session_start();
        if(isset($_SESSION['user_id'])){
            showProfile();
        } else {
            unset($_SESSION['user_id']);
            session_destroy();
            header('location: ./signin');             
        }
    }
// ────────────────────────────────────────────────────────────────────────────────
