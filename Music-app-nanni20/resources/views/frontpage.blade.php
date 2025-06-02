<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Music app Nanna </title>
    <script src="../js/search" ></script>
    <script src="{{ asset('js/toggleFeatureButtons.js') }}"></script>
    <link rel="stylesheet" href="{{asset('/css/frontpage.css')}}">
</head>

<body>
<header>
    @include('partials.header')
</header>

<div class="info-wrapper">
    <div class="Profile-wrapper">
        @include('partials.profile')
        <div class="feature-buttons">
            <button class="feature-button" data-target="trackhistory">Track history</button>
            <button class="feature-button" data-target="something1">something 1</button>
            <button class="feature-button" data-target="something2">something 2</button>
            <button class="feature-button" data-target="something3">something 3</button>
            <button class="feature-button" data-target="graph"> Graph </button>
        </div>
    </div>
    <!-- <div class="content-wrapper">
        <div class="left-column">
            @include('partials.info')
    @include('partials.artistinfo')
    </div> -->

    <div class="right-column">
        <div id="trackhistory" class="feature-section">
            @include('partials.trackhistory')
        </div>
        <div id="something1" class="feature-section">
            @include('partials.something1')
        </div>
        <div id="something2" class="feature-section">
            @include('partials.something2')
        </div>
        <div id="graph" class="feature-section">
            @include('partials.graph')
        </div>
        <div id="something3" class="feature-section">
            @include('partials.something3')
        </div>
    </div>
</div>
</div>
</body>
</html>





