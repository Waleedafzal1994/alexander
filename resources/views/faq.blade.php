@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        #main {
            margin: 50px 0;
        }

        #main #faq .card {
            margin-bottom: 30px;
            border: 0;
        }

        .card-body {
            color: white;
        }

        #main #faq .card .card-header {
            border: 0;
            -webkit-box-shadows: 0 0 20px 0 rgba(213, 213, 213, 0.5);
            box-shadows: 0 0 20px 0 rgba(213, 213, 213, 0.5);
            border-radius: 2px;
            padding: 0;
        }

        #main #faq .card .card-header .btn-header-link {
            color: #fff;
            display: block;
            text-align: left;
            background: var(--color-background);
            padding: 20px;
        }

        #main #faq .card .card-header .btn-header-link:after {
            content: "\f106";
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            float: right;
        }

        #main #faq .card .card-header .btn-header-link.collapsed {
            background: var(--color-background);
            color: #fff;
        }

        #main #faq .card .card-header .btn-header-link.collapsed:after {
            content: "\f107";
        }

        #main #faq .card .collapsing {
            background: var(--color-secondary);
            line-height: 30px;
        }

        #main #faq .card .collapse {
            border: 0;
        }

        #main #faq .card .collapse.show {
            background: var(--color-secondary);
            line-height: 30px;
            color: white;
        }

    </style>

    <div class="header-page rounded">
        <div>
            <img src="/imgs/icons/faq.png" alt="" srcset="" style="height:64px;">
        </div>
        <div>
            <h1>Frequently Asked Questions (F.A.Q)</h1>
            <p>Here you may find answers to frequently asked questions.</p>
        </div>
    </div>


    <div class="container-fluid">
        <div id="main">
            <div class="container-fluid">
                <div class="accordion" id="faq">
                    <div class="card">
                        <div class="card-header" id="faqhead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                                aria-expanded="true" aria-controls="faq1">FAQ Item</a>
                        </div>

                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf
                                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda
                                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea
                                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                raw denim
                                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                                aria-expanded="true" aria-controls="faq2">FAQ Item</a>
                        </div>

                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf
                                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda
                                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea
                                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                raw denim
                                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                                aria-expanded="true" aria-controls="faq3">FAQ Item</a>
                        </div>

                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf
                                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod.
                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda
                                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea
                                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                raw denim
                                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
