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
<template x-if="!$store.state.isLoading && $store.gallery.objects.length > 0">
    <section class="c-frame" x-data="$store.gallery">
        <template x-for="(object, index) in $store.gallery.objects">
            <div class="c-frame__frame" x-data="object" :id="'image-' + index" :class="displayingObjectIndex !== index && 'is-hidden'">
                <img class="c-frame__image c-frame__image--background" :src="imageUrl" :alt="title">
                <img class="c-frame__image c-frame__image--foreground" :src="imageUrl" :alt="title">
            </div>
        </template>
    </section>
</template>

<!-- Art info -->
<div class="c-info__trigger" @click="$store.state.toggleSidebar()"></div>
<template x-if="!$store.state.isLoading && $store.gallery.objects.length > 0">
    <aside class="c-info" :class="$store.state.isSidebarOpen && 'is-visible'" x-data="{object: $store.gallery.objects[$store.gallery.displayingObjectIndex]}">
        <h1 class="c-info__title" x-text="object.title"></h1>
        <p class="c-info__subtitle">
            <time x-text="object.date">1889</time>
            | <span x-text="object.department"></span>
        </p>
        <template x-if="object.artist">
            <p class="c-info__author" x-text="object.artist"></p>
        </template>
    </aside>
</template>

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
<template x-if="$store.state.hasError">
    <div class="c-alert">
        <p class="c-alert__title">Error</p>
        <p class="c-alert__message">Please wait a few minutes and try again</p>
    </div>
</template>
</body>

</html>
