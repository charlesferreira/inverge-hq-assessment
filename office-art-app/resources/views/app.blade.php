<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Office Art</title>
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" defer></script>
</head>

<body x-data>
<!-- Art frame -->
<section class="c-frame">
    <!-- Image 1 -->
    <div class="c-frame__frame" id="image-1">
        <img class="c-frame__image c-frame__image--background" src="" alt="">
        <img class="c-frame__image c-frame__image--foreground" src="" alt="">
    </div>

    <!-- Image 2 -->
    <div class="c-frame__frame" id="image-2">
        <img class="c-frame__image c-frame__image--background" src="https://images.metmuseum.org/CRDImages/ep/original/DT1567.jpg" alt="">
        <img class="c-frame__image c-frame__image--foreground" src="https://images.metmuseum.org/CRDImages/ep/original/DT1567.jpg" alt="">
    </div>
</section>

<!-- Art info -->
<div class="c-info__trigger" @click="$store.state.toggleSidebar()"></div>
<aside class="c-info" :class="$store.state.isSidebarOpen && 'is-visible'">
    <h1 class="c-info__title">Wheat Field with Cypresses</h1>
    <p class="c-info__subtitle">
        <time>1889</time>
        | European Art
    </p>
    <p class="c-info__author">Vincent van Gogh</p>
</aside>

<!-- Loading screen -->
<div class="c-loading" :class="!$store.state.isLoading && 'is-hidden'">
    <div class="c-loading__spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- Alert box -->
<div class="c-alert" :class="$store.state.hasError && 'is-visible'">
    <p class="c-alert__title">Error</p>
    <p class="c-alert__message">Please wait a few minutes and try again</p>
</div>
</body>

</html>
