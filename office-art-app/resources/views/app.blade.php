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

<body x-data="appState" x-init="loadObjects">
    <!-- Art frame -->
    <template x-if="!$store.isLoading && objects.length > 0">
        <section class="c-frame">
            <template x-for="(object, index) in objects">
                <div class="c-frame__frame" x-data="object" :id="'image-' + index" :class="displayingObjectIndex !== index && 'is-hidden'">
                    <img class="c-frame__image c-frame__image--background" :src="imageUrl" :alt="title">
                    <img class="c-frame__image c-frame__image--foreground" :src="imageUrl" :alt="title">
                </div>
            </template>
        </section>
        </section>
    </template>

    <!-- Art info -->
    <div class="c-info__trigger" @click="$store.sidebar.toggle()"></div>
    <template x-if="!$store.isLoading && objects.length > 0">
        <aside class="c-info" :class="$store.sidebar.isOpen && 'is-visible'">
            <h1 class="c-info__title" x-text="displayingObject.title"></h1>
            <p class="c-info__subtitle">
                <time x-text="displayingObject.date">1889</time>
                | <span x-text="displayingObject.department"></span>
            </p>
            <template x-if="displayingObject.artist">
                <p class="c-info__author" x-text="displayingObject.artist"></p>
            </template>
        </aside>
    </template>

    <!-- Loading screen -->
    <div class="c-loading" :class="!$store.isLoading && 'is-hidden'">
        <div class="c-loading__spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Alert box -->
    <template x-if="$store.errors.hasError">
        <div class="c-alert">
            <p class="c-alert__title">Error</p>
            <p class="c-alert__message">Please wait a few minutes and try again</p>
        </div>
    </template>
</body>

</html>
