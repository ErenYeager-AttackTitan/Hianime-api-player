<?php
$player_api= ""
$id = $_GET['id'];
$ep = $_GET['ep'];

$json = file_get_contents("$player_api/api/stream?id=$id&ep=$ep&server=hd-1&type=sub");
$episode = json_decode($json, true);

$video = $episode['results']['streamingLink']['link']['file'];
$tracks = $episode['results']['streamingLink']['tracks']; // Subtitles
$introStart = $episode['results']['streamingLink']['intro']['start'];
$introEnd = $episode['results']['streamingLink']['intro']['end'];
$outroStart = $episode['results']['streamingLink']['outro']['start'];
$outroEnd = $episode['results']['streamingLink']['outro']['end'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-site-verification" content="N7osMJNJspc5KKkbo_sYTDsyOVWxHqMZFi_2A9emtTs" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ErenYeager-AttackTitan/jw-style/style.css">
    <meta name="robots" content="noindex, nofollow" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        .wrap #player {
            position: absolute;
            height: 100% !important;
            width: 100% !important;
        }

        .wrap .btn {
            position: absolute;
            top: 15%;
            left: 90%;
            transform: translate(-50%, -50%);
            background-color: white;
            color: black;
            font-size: 12px;
            padding: 6px 12px;
            border: 1px solid white;
            cursor: pointer;
            border-radius: 5px;
        }

        @media screen and (max-width: 600px) {
            .wrap .btn {
                font-size: 8px;
            }
        }
    </style>

    <div class="wrap">
        <div id="player"></div>
    </div>

    <script src='https://cdn.jsdelivr.net/gh/ErenYeager-AttackTitan/jwplayer/jw.js'></script>
    <script>
        const playerInstance = jwplayer("player").setup({
            controls: true,
            displaytitle: true,
            displaydescription: true,
            abouttext: "AnimeZia",
            aboutlink: "https://animezia.com",
            autostart: true,
            skin: { name: "netflix" },
            logo: { file: "", link: "" },
            playlist: [{
                title: "<?= $animeNameWithEP ?>",
                description: "<?= $animeNameWithEP ?>",
                image: "",
                sources: [{ "file": `https://goodproxy.eren-yeager-founding-titan-9.workers.dev/fetch?url=<?=$video?>` }],
                tracks: [
                    <?php foreach ($tracks as $track): ?>
                    {
                        file: "<?= $track['file'] ?>",
                        label: "<?= $track['label'] ?>",
                        kind: "<?= $track['kind'] ?>",
                        <?= isset($track['default']) && $track['default'] ? 'default: true,' : '' ?>
                    },
                    <?php endforeach; ?>
                ]
            }],
            advertising: {
                client: "vast",
                schedule: [{
                    offset: "pre",
                    tag: ""
                }]
            },
            events: {
                onReady: function() {
                    // Enable Skip Intro and Skip Outro buttons
                    const introStart = <?= $introStart ?>;
                    const introEnd = <?= $introEnd ?>;
                    const outroStart = <?= $outroStart ?>;
                    const outroEnd = <?= $outroEnd ?>;

                    // Create Skip Intro and Outro Buttons
                    $('<button>', {
                        text: 'Skip Intro',
                        class: 'skip-btn',
                        click: function() {
                            playerInstance.seek(introEnd);
                        }
                    }).appendTo('#player');

                    $('<button>', {
                        text: 'Skip Outro',
                        class: 'skip-btn',
                        click: function() {
                            playerInstance.seek(outroEnd);
                        }
                    }).appendTo('#player');

                    playerInstance.on("time", function(event) {
                        const currentTime = event.position;

                        // Automatically skip intro if within the intro range
                        if (currentTime >= introStart && currentTime < introEnd) {
                            playerInstance.seek(introEnd);
                        }

                        // Automatically skip outro if within the outro range
                        if (currentTime >= outroStart && currentTime < outroEnd) {
                            playerInstance.seek(outroEnd);
                        }
                    });
                }
            }
        });

 playerInstance.on("ready", function() {
        


        // Move the timeslider in-line with other controls
       function _0x4f2a(){const _0xfa02f3=['insertBefore','Backward\x2010\x20Seconds','transform','5625728xhvJDv','676207iRnOYL','none','getContainer','nextElementSibling','forEach','.jw-spacer','6VEpRzT','2190088RRBjkd','9JxBILB','3030461FPaPlN','display','.jw-button-container','ariaLabel','seek','2991576pDJDBo','4516835sGtOCF','2piCEpC','getPosition','replaceChild','714032PzqJKY','Forward\x2010\x20Seconds','querySelector','.jw-display-icon-next','.jw-icon-rewind','scaleX(-1)','.jw-display-icon-rewind','100uIMjWu','parentNode','style'];_0x4f2a=function(){return _0xfa02f3;};return _0x4f2a();}const _0x3bbac1=_0x4544;(function(_0xc446d7,_0x24dc21){const _0x32891b=_0x4544,_0x1c51b3=_0xc446d7();while(!![]){try{const _0x1c92a8=-parseInt(_0x32891b(0x111))/0x1*(-parseInt(_0x32891b(0x100))/0x2)+parseInt(_0x32891b(0x11f))/0x3+parseInt(_0x32891b(0x118))/0x4+parseInt(_0x32891b(0xff))/0x5*(-parseInt(_0x32891b(0x117))/0x6)+-parseInt(_0x32891b(0x11a))/0x7+-parseInt(_0x32891b(0x110))/0x8*(parseInt(_0x32891b(0x119))/0x9)+parseInt(_0x32891b(0x10a))/0xa*(parseInt(_0x32891b(0x103))/0xb);if(_0x1c92a8===_0x24dc21)break;else _0x1c51b3['push'](_0x1c51b3['shift']());}catch(_0x702cd1){_0x1c51b3['push'](_0x1c51b3['shift']());}}}(_0x4f2a,0xcac47));function _0x4544(_0x5017e7,_0x1e2523){const _0x4f2a22=_0x4f2a();return _0x4544=function(_0x454450,_0x118037){_0x454450=_0x454450-0xff;let _0x207852=_0x4f2a22[_0x454450];return _0x207852;},_0x4544(_0x5017e7,_0x1e2523);}const playerContainer=playerInstance[_0x3bbac1(0x113)](),buttonContainer=playerContainer[_0x3bbac1(0x105)](_0x3bbac1(0x11c)),spacer=buttonContainer[_0x3bbac1(0x105)](_0x3bbac1(0x116)),timeSlider=playerContainer['querySelector']('.jw-slider-time');buttonContainer[_0x3bbac1(0x102)](timeSlider,spacer);const player=playerInstance,rewindContainer=playerContainer[_0x3bbac1(0x105)](_0x3bbac1(0x109)),forwardContainer=rewindContainer['cloneNode'](!![]),forwardDisplayButton=forwardContainer['querySelector'](_0x3bbac1(0x107));forwardDisplayButton[_0x3bbac1(0x10c)]['transform']='scaleX(-1)',forwardDisplayButton[_0x3bbac1(0x11d)]=_0x3bbac1(0x104);const nextContainer=playerContainer[_0x3bbac1(0x105)](_0x3bbac1(0x106));nextContainer['parentNode'][_0x3bbac1(0x10d)](forwardContainer,nextContainer),playerContainer[_0x3bbac1(0x105)](_0x3bbac1(0x106))[_0x3bbac1(0x10c)][_0x3bbac1(0x11b)]=_0x3bbac1(0x112);const rewindControlBarButton=buttonContainer[_0x3bbac1(0x105)](_0x3bbac1(0x107));rewindControlBarButton[_0x3bbac1(0x11d)]=_0x3bbac1(0x10e);const forwardControlBarButton=rewindControlBarButton['cloneNode'](!![]);forwardControlBarButton[_0x3bbac1(0x10c)][_0x3bbac1(0x10f)]=_0x3bbac1(0x108),forwardControlBarButton['ariaLabel']=_0x3bbac1(0x104),rewindControlBarButton[_0x3bbac1(0x10b)]['insertBefore'](forwardControlBarButton,rewindControlBarButton[_0x3bbac1(0x114)]),[forwardDisplayButton,forwardControlBarButton][_0x3bbac1(0x115)](_0x57fe75=>{_0x57fe75['onclick']=()=>{const _0x364d9b=_0x4544;player[_0x364d9b(0x11e)](player[_0x364d9b(0x101)]()+0xa);};});
        // New Features
    
    });

    </script>
</body>
</html>
