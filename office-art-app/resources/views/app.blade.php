<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Office Art</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
<section class="c-frame">
    <!-- Image 1 -->
    <div class="c-frame__frame">
        <img id="bg-1" class="c-frame__image c-frame__image--background" src="https://images.metmuseum.org/CRDImages/ep/original/DT1567.jpg" alt="">
        <img id="fg-1" class="c-frame__image c-frame__image--foreground" src="https://images.metmuseum.org/CRDImages/ep/original/DT1567.jpg" alt="">
    </div>

    <!-- Image 2 -->
    <div class="c-frame__frame">
        <img id="bg-2" class="c-frame__image c-frame__image--background" src="https://collectionapi.metmuseum.org/api/collection/v1/iiif/53459/208681/main-image" alt="">
        <img id="fg-2" class="c-frame__image c-frame__image--foreground" src="https://collectionapi.metmuseum.org/api/collection/v1/iiif/53459/208681/main-image" alt="">
    </div>
</section>

<aside class="c-info is-visible">
    <h1 class="c-info__title">Wheat Field with Cypresses</h1>
    <p class="c-info__subtitle">
        <time>1889</time>
        | European Art
    </p>
    <p class="c-info__author">
        <span class="c-info__author--name">Vincent van Gogh</span>
        <span class="c-info__author--nationality">Dutch</span>
    </p>
</aside>

<div class="c-loading is-hidden">
    <div class="c-loading__spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div class="c-alert">
    <p class="c-alert__title">Error</p>
    <p class="c-alert__message">Please wait a few moments and try again</p>
</div>
</body>

</html>
