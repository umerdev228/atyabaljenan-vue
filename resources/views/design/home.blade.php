<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="icon" href="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/31/7f/317fd2c69deab791235b99265df49060.jpg">
    <link rel="apple-touch-icon" href="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/31/7f/317fd2c69deab791235b99265df49060.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&amp;display=swap" rel="stylesheet">

    <title>Atyabiljenan</title>

    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
</head>
<body class="js-focus-visible">


<div id="root">
    <div class="App container-fluid h-100 english-font grayBackground" id="main">
        <div class="row" style="overflow-y: scroll;">
            <div class="col-lg-5 col-md-5 col-12 p-0 w-100 " style="overflow: hidden scroll; background-color: rgb(244, 245, 245); min-height: calc(100% - 60px); height: calc(100% - 60px);">
                <div class="p-0 h-100">
                    {{--                    <div class="d-lg-none d-xl-none d-md-none">--}}
                    {{--                        <div class=" w-100 detail_header" style="top: 0px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), transparent); background-color: transparent; z-index: 1000;">--}}
                    {{--                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1" tabindex="0" type="button" style="float: left; height: 50px; max-width: 30px; margin-left: 10px; margin-right: 0px; display: inline-block; z-index: 22;">--}}
                    {{--                                <span class="MuiButton-label">--}}
                    {{--                                    <svg id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: white;">--}}
                    {{--                                        <g>--}}
                    {{--                                            <g>--}}
                    {{--                                                <path d="M462.964,462.936l-24.546-272.01C436.296,167.594,417.03,150,393.603,150H361v-45C361,47.103,313.897,0,256,0 c-57.897,0-105,47.103-105,105v45h-32.604c-23.427,0-42.693,17.594-44.816,40.936l-24.544,271.99 C46.641,489.255,67.416,512,93.85,512h324.299C444.571,512,465.359,489.26,462.964,462.936z M346,240c8.271,0,15,6.729,15,15 s-6.729,15-15,15s-15-6.729-15-15S337.728,240,346,240z M181,105c0-41.355,33.645-75,75-75s75,33.645,75,75v45H181V105z M166,240 c8.271,0,15,6.729,15,15s-6.729,15-15,15s-15-6.729-15-15S157.728,240,166,240z M103.458,193.642 c0.707-7.777,7.13-13.642,14.938-13.642H151v32.58c-17.459,6.192-30,22.865-30,42.42c0,24.813,20.187,45,45,45s45-20.187,45-45 c0-19.555-12.541-36.228-30-42.42V180h150v32.58c-17.459,6.192-30,22.865-30,42.42c0,24.813,20.187,45,45,45s45-20.187,45-45 c0-19.555-12.541-36.228-30-42.42V180h32.604c7.809,0,14.231,5.865,14.938,13.632L429.148,422H82.851L103.458,193.642z  M418.149,482H93.85c-8.815,0-15.74-7.537-14.937-16.368L80.144,452h351.712l1.231,13.642 C433.888,474.446,426.977,482,418.149,482z">--}}

                    {{--                                                </path>--}}
                    {{--                                            </g>--}}
                    {{--                                        </g>--}}
                    {{--                                    </svg>--}}
                    {{--                                    <span class="MuiBadge-root">--}}
                    {{--                                        <span class="MuiBadge-badge MuiBadge-anchorOriginTopRightRectangle MuiBadge-colorPrimary">1</span>--}}
                    {{--                                    </span>--}}
                    {{--                                </span>--}}
                    {{--                                <span class="MuiTouchRipple-root"></span>--}}
                    {{--                            </button>--}}
                    {{--                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text back_arrow mt-1 languageMakeDisappearForLargeScreen" tabindex="0" type="button" style="float: right; height: 50px; margin-right: 10px; margin-left: 0px; font-size: 20px; padding-bottom: 15px; color: white; display: inline; z-index: 22;">--}}
                    {{--                                <span class="MuiButton-label">ع</span>--}}
                    {{--                                <span class="MuiTouchRipple-root"></span>--}}
                    {{--                            </button>--}}
                    {{--                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text  mt-1 languageMakeDisappearForLargeScreen" tabindex="0" type="button" style="float: right; height: 50px; max-width: 30px; display: inline-block; z-index: 22;">--}}
                    {{--                                <span class="MuiButton-label">--}}
                    {{--                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: white;">--}}
                    {{--                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>--}}
                    {{--                                    </svg>--}}
                    {{--                                </span>--}}
                    {{--                                <span class="MuiTouchRipple-root"></span>--}}
                    {{--                            </button>--}}
                    {{--                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text  mt-1" tabindex="0" type="button" style="float: right; height: 50px; max-width: 30px; display: inline-block;">--}}
                    {{--                                <span class="MuiButton-label">--}}
                    {{--                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: white;">--}}
                    {{--                                        <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"></path>--}}
                    {{--                                    </svg>--}}
                    {{--                                </span>--}}
                    {{--                                <span class="MuiTouchRipple-root"></span>--}}
                    {{--                            </button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-12 d-lg-none d-xl-none d-md-none p-0 m-0" style="height: 300px; width: 100%;">--}}
                    {{--                        <div class="changeToFixedBackground m-0 p-0" style="height: 100%; width: 75%; background: url(/images/images/background/1603610553.png) center center / cover no-repeat;"></div>--}}
                    {{--                    </div>--}}
                    <ul class="MuiList-root MuiList-padding" style="width: 100%; margin-top: 0; padding: 3px 0 0; background-color: white;">
                        <a class="makeLinkNormal" href="/contact">
                            <div class="MuiButtonBase-root MuiListItem-root pt-1 MuiListItem-button MuiListItem-alignItemsFlexStart" tabindex="0" role="button" aria-disabled="false" style="margin-left: 0px; padding-right: 0px; padding-left: 15px; padding-bottom: 4px;">
                                <div class="MuiListItemAvatar-root MuiListItemAvatar-alignItemsFlexStart">
                                    <div class="MuiAvatar-root MuiAvatar-rounded" style="width: 60px; height: 60px; margin-bottom: 9px;">
                                        <img src="https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/31/7f/317fd2c69deab791235b99265df49060.jpg" class="MuiAvatar-img">
                                    </div>
                                </div>
                                <div class="MuiListItemText-root ml-3 MuiListItemText-multiline">
                                    <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                                        <p style="font-size: 14px; font-weight: bold;">Sai Garden</p>
                                    </span><p class="MuiTypography-root MuiListItemText-secondary MuiTypography-body2 MuiTypography-colorTextSecondary MuiTypography-displayBlock">
                                        <span class="MuiTypography-root MuiTypography-body2 MuiTypography-colorTextPrimary" style="font-size: 0.9rem; color: rgb(95, 95, 95);">
                                            "The Art of Nature"
                                        </span>
                                    <div style="position: relative; bottom: -5px; left: 0px; direction: ltr; margin-top: 2px;">
                                        <span style="margin-right: 5px; margin-left: 0px;">
                                            <span order="1">
                                                <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: rgb(55, 173, 73); position: relative; top: 1px; width: 2px;">
                                                    <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span style="margin-right: 5px; margin-left: 5px;">
                                            <span order="2">
                                                <span style="position: relative; right: -4px; top: 1px;">
                                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="position: absolute; width: 2px; height: 12px; top: -3px; color: rgb(224, 51, 51);">
                                                        <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"></path>
                                                    </svg>
                                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: rgb(210, 210, 210); width: 2px;">
                                                        <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </span>
                                        <span style="margin-left: 5px; margin-right: 0px;">
                                            <span style="position: relative; top: 2px; font-weight: bold; border-radius: 3px; color: rgb(153, 153, 153);"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="MuiListItemIcon-root MuiListItemIcon-alignItemsFlexStart" style="margin: auto;">
                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
                                    </svg>
                                </div>
                                <span class="MuiTouchRipple-root"></span>
                            </div>
                        </a>
                    </ul>
                    <div style="height: auto; margin-top: 1px; background-color: white; border-bottom: 1px solid rgb(212, 213, 212);">
                        <form class="MuiPaper-root jss21 MuiPaper-elevation1 MuiPaper-rounded" style="direction: ltr;">
                            <div class="MuiInputBase-root jss22">
                                <input placeholder="Search for products" type="text" aria-label="Search for products" class="MuiInputBase-input" value="">
                            </div>
                            <button class="MuiButtonBase-root MuiIconButton-root jss23" tabindex="0" type="submit" aria-label="search">
                                <span class="MuiIconButton-label">
                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                    </svg>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </button>
                        </form>
                        <li class="MuiDivider-root" role="separator" style="height: 4px; background-color: rgb(244, 245, 245);"></li>
                        <div></div>
                        <div class="row m-0 w-100" style="border-top: 1px solid rgb(222, 226, 230);">
                            <div class="col-12">
                                <div class="scrollable-div">
                                    <div class="row border-bottom bg-white disable-scroll-bar" style="min-height: 65px; direction: ltr;">
                                        <div class="col-4 bg-white m-auto">
                                            <button class="MuiButtonBase-root MuiButton-root" tabindex="0" type="button" style="line-height: 3; width: 80px; max-height: 40px; text-transform: none; font-weight: bold; box-shadow: none; border-radius: 3px; padding: 0px;">
                                                <span class="MuiButton-label">Delivery</span>
                                                <span class="MuiTouchRipple-root"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span></span>
                    <div class="px-0" style="padding: 20px 0px;">
                        <div class="sc-bdVaJa imYUvI"><div class="sc-bwzfXH gwZiig">
                                <div class="sc-htpNat grBOFc" style="transform: translateX(0px);"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center justify-content-between m-0 w-100 " dir="ltr" style="transform: scale(0.983);">
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/sai-garden/products/round-geometric-terrarium-1-black_geo.JPG) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                Newest Products
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/30/f0/30f0780859ff78d04b55192e23da4c9e.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                HANDEMADE CLAY POTS
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/85/7f/857f3710a785308aefd25c622ba5ece0.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                CACTUS &amp; SUCCULENT TERRARIUM
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/07/e2/07e2fa79c6e9eac2cce5387c151b67a8.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                Cactus Plants
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/fc/5e/fc5e847aba3e631800c882171d408f39.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                Most Selling
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/ce/71/ce7150ff2e1d8704c6d6e0532032d4cb.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                Make Your Own
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/cd/92/cd9280185b57c4f7c651e78f917cc2e3.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                INDOOR PLANTS
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/ea/7a/ea7a268a976b2a2fd311f20e1bd92c6d.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                WOODEN PLATE
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/9f/4e/9f4ed8e3afaa4a43e882ba5e41479e79.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                CLASSIC VASES
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/04/7f/047f7587717ab2eb44ab18380d7ec496.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                CONCRETE &amp; CERAMIC
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/aa/31/aa31cb99a3f2b9b3a0a7b0f3f9b8c729.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                CHOCOLATE TERRARIUM
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/sai-garden/products/notes-Photo_Dec_19_11_10_42_PM.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">Sai Notes</p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/2d/d6/2dd6c171d100c798bac34e6ac5e29df3.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">GEOMETRIC</p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/64/ae/64ae5360a8e766aeb3e831d63ee088b9.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                SAI SIGNATURE
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/b7/2b/b72ba1f37e3bdaeb0d437a56689d9caf.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                MUBKHAR
                            </p>
                        </div>
                        <div class="" style="height: 164px; width: 45%; border-radius: 7px; margin-bottom: 3px; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/cache/0d/b7/0db76ecef188d59cfd282d428beeb086.jpg) center center / cover no-repeat; border: 1px solid white; min-height: 240px;">
                            <div style="background: black; width: 100%; height: 240px; opacity: 0.3; position: relative; text-align: center; border-radius: 7px; top: 0px; left: 0px;"></div>
                            <p style="top: -135px; left: 0px; position: relative; z-index: 3; display: block; color: white; font-size: 1.4rem;">
                                ACCESSORIES
                            </p>
                        </div>
                    </div>
                    <div class="free-space-115"></div>
                    <div class="free-space-50"></div>
                    <div class="action-button-english" style="background-color: white; padding-bottom: 8px; margin-bottom: 0px; height: 60px; z-index: 4;">
                        <button class="MuiButtonBase-root MuiButton-root MuiButton-contained mb-1  ml-1 mx-auto MuiButton-containedPrimary" tabindex="0" type="button" dir="ltr" style="width: 97%; height: 100%; box-shadow: none; text-transform: none;">
                            <span class="MuiButton-label">
                                <span class="px-1" style="position: absolute; left: 10px; top: 6px; line-height: 34px; background: rgba(0, 0, 0, 0.3); border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">1</span>
                                <span style="font-size: 1rem;">Review Order</span>
                                <span style="position: absolute; right: 10px; top: 6px; line-height: 34px; border-radius: 7px; min-width: 32px; height: 32px; font-size: 1rem;">19.000 KD</span>
                            </span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 h-100 d-md-none d-sm-none d-xs-none d-none d-lg-block d-md-block p-0" style="background-color: gray; overflow-y: hidden; position: fixed; left: 41.64vw; object-fit: fill;"><div>
                    <div>
                        <button class="MuiButtonBase-root MuiButton-root MuiButton-contained languageButtonLargeScreenEnglish header-button-cricle scale-up-center" tabindex="0" type="button" style="padding: 0px; border-radius: 20px; z-index: 3; position: fixed; top: 13px; right: 30px; display: none; max-width: 32px;">
                            <span class="MuiButton-label">ع</span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                        <button class="MuiButtonBase-root MuiButton-root MuiButton-contained SearchButtonLargeScreenEnglish header-button-cricle scale-up-center MuiButton-containedSizeSmall MuiButton-sizeSmall" tabindex="0" type="button" id="search_button" style="max-width: 32px; min-height: 30px; z-index: 3; position: fixed; top: 13px; right: 30px; display: none;">
                            <span class="MuiButton-label">
                                <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="color: black; width: 2px">
                                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                </svg>
                            </span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                        <button class="MuiButtonBase-root MuiButton-root MuiButton-contained menuButtonLargeScreenEnglish header-button-cricle scale-up-center MuiButton-containedSizeSmall MuiButton-sizeSmall" tabindex="0" type="button" style="max-width: 27px; min-height: 30px; z-index: 3; position: fixed; top: 13px; display: none;">
                            <span class="MuiButton-label">
                                <svg id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M462.964,462.936l-24.546-272.01C436.296,167.594,417.03,150,393.603,150H361v-45C361,47.103,313.897,0,256,0 c-57.897,0-105,47.103-105,105v45h-32.604c-23.427,0-42.693,17.594-44.816,40.936l-24.544,271.99 C46.641,489.255,67.416,512,93.85,512h324.299C444.571,512,465.359,489.26,462.964,462.936z M346,240c8.271,0,15,6.729,15,15 s-6.729,15-15,15s-15-6.729-15-15S337.728,240,346,240z M181,105c0-41.355,33.645-75,75-75s75,33.645,75,75v45H181V105z M166,240 c8.271,0,15,6.729,15,15s-6.729,15-15,15s-15-6.729-15-15S157.728,240,166,240z M103.458,193.642 c0.707-7.777,7.13-13.642,14.938-13.642H151v32.58c-17.459,6.192-30,22.865-30,42.42c0,24.813,20.187,45,45,45s45-20.187,45-45 c0-19.555-12.541-36.228-30-42.42V180h150v32.58c-17.459,6.192-30,22.865-30,42.42c0,24.813,20.187,45,45,45s45-20.187,45-45 c0-19.555-12.541-36.228-30-42.42V180h32.604c7.809,0,14.231,5.865,14.938,13.632L429.148,422H82.851L103.458,193.642z  M418.149,482H93.85c-8.815,0-15.74-7.537-14.937-16.368L80.144,452h351.712l1.231,13.642 C433.888,474.446,426.977,482,418.149,482z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                        <button class="MuiButtonBase-root MuiButton-root MuiButton-contained historyButtonLargeScreenEnglish header-button-cricle scale-up-center MuiButton-containedSizeSmall MuiButton-sizeSmall" tabindex="0" type="button" style="max-width: 27px; min-height: 30px; z-index: 3; position: fixed; top: 13px; display: none;">
                            <span class="MuiButton-label">
                                <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"></path>
                                </svg>
                            </span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                    </div>
                    <div class="changeToFixedBackground m-0 p-0" style="height: 100%; width: 100%; background: url(https://tapcom-live.ams3.cdn.digitaloceanspaces.com/media/sai-garden/covers/6AA9EB0E-EADA-4F31-AA4F-92A506AC384A.jpeg) center center / cover no-repeat; position: absolute;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>

