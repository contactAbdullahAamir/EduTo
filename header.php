<?php ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Managemnt System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">


    <style>
    .btn {
        margin: 0;
    }

    /* Add your custom styles here */
    .navbar {
        background-color: #3F51B5 !important;
    }

    .navbar-brand {
        font-size: 26px;
        font-weight: bolder;
        margin-bottom: 10px;
        color: white !important;
        margin-top: 10px;
        font-weight: bolder;
    }

    .navbar-nav {
        margin-top: 5px;
        color: white !important;
        font-weight: bolder;
    }

    * {
        box-sizing: border-box;
    }

    /* Slideshow container */
    .slideshow-container {
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
        width: 100%;
        animation: fade 1s ease-in-out;
        /* Added fade animation */
    }
    .social-icons {
      display: flex;
      justify-content: center;
    }

    .social-icons .fa-stack {
      /* Adjust the margin as needed */
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }
    </style>
</head>

<body>