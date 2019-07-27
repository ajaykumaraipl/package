<!doctype html>
<html lang="en">

<head>
    <title>PrioHub - Marketplace for forms </title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="fonts/fontawsome/css/all.min.css" rel="stylesheet">
    <link href="fonts/roboto/roboto-fonts.css" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="js/select2/select2.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/scrollbar/simplebar.css" type="text/css" media="screen" />
    <link href="css/prio-component-style.css" rel="stylesheet">
    <link href="css/common-sales-panel.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">

    <!--JS-->
    <script src="js/bin/jquery-2.1.1.min.js"></script>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

    <script src="js/custom/custom-js.js"></script>

    <!--plugins-->
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/select2/select2.js"></script>
    <script src="js/scrollbar/simplebar.js"></script>
    <script src="js/custom/dashboard.js"></script>
    <script src="js/custom/common.js"></script>

    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <!--plugins-->
    <!-- //JS-->
</head>

<body>
    
    <div class="main-content-dashboard">
            <div class="inner-main-content-dashboard">
                <div class="main-content-prio-row main-content-prio-row1">
                    <div class="left-prio-row">
                        <p class="title">Publications</p>
                        <p class="subtitle">{{ count($articles) }} POSTS</p>
                    </div><!--
                 --><div class="right-prio-row">
                        <div class="options-for-checked-checkboxes">
                            <div class="option option1">
                                <p data-action="Unpublish">Unpublish</p><!--
                             --><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                    <g id="Group_158" data-name="Group 158" transform="translate(-176.5 -88.5)">
                                    <g id="Group_157" data-name="Group 157" transform="translate(177 89)">
                                        <path id="Path_150" data-name="Path 150" d="M193,91.182A2.143,2.143,0,0,0,190.818,89H179.182A2.143,2.143,0,0,0,177,91.182v11.636A2.143,2.143,0,0,0,179.182,105h11.636A2.143,2.143,0,0,0,193,102.818Z" transform="translate(-177 -89)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    </g>
                                    <line id="Line_115" data-name="Line 115" x2="6.889" y2="6.889" transform="translate(181.555 93.555)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    <line id="Line_116" data-name="Line 116" x1="6.889" y2="6.889" transform="translate(181.555 93.555)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    </g>
                                </svg>
                            </div><!--
                         --><div class="option option2 delete-lightbox1">
                                <p data-action="Delete">Delete</p><!--
                             --><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                    <g id="Group_103710" data-name="Group 103710" transform="translate(-352.5 -88.5)">
                                    <g id="Group_67" data-name="Group 67" transform="translate(353 89)">
                                        <path id="Path_57" data-name="Path 57" d="M355,92v11.66a2.148,2.148,0,0,0,2.188,2.186h8.752a2.148,2.148,0,0,0,2.188-2.186V92" transform="translate(-353.564 -89.846)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                        <line id="Line_29" data-name="Line 29" x2="16" transform="translate(0 2.154)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                        <line id="Line_30" data-name="Line 30" y1="2.154" transform="translate(8)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    </g>
                                    <line id="Line_31" data-name="Line 31" y2="7.899" transform="translate(361 94.155)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    <line id="Line_32" data-name="Line 32" y2="7.899" transform="translate(363.909 94.155)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    <line id="Line_33" data-name="Line 33" y2="7.899" transform="translate(358.091 94.155)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                                    </g>
                                </svg>
                            </div>
                        </div><!--
                     --><div class="search-newpost-div">
                            <div class="search-div">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18.604" height="18.604" viewBox="0 0 18.604 18.604">
                                    <path id="Shape" d="M13.489,11.946h-.813l-.288-.278a6.7,6.7,0,1,0-.72.72l.278.288v.813l5.146,5.136,1.533-1.533Zm-6.175,0a4.631,4.631,0,1,1,4.631-4.631A4.625,4.625,0,0,1,7.315,11.946Z" transform="translate(-0.375 -0.375)" fill="#bcbcbc" stroke="#fafafa" stroke-width="0.5"/>
                                </svg>  
                            </div><!--
                        --><div class="newpost-button-div">
                                <a class="waves-effect waves-light newpost-button" href="{{ url("/article/create") }}">+ New post</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content-prio-row main-content-prio-row2 table-row2">
                    <div class="selectall-sm-div">
                        <label class="prio-checkbox prio-checkbox-title small">
                            <input type="checkbox" name="chkMain[]" class="filled-in all-checkboxes"/>
                            <span></span>
                        </label><!--
                     --><p>Select all</p>
                    </div>
                    <form method="post" action="{{ url('articles/bulk/action') }}" id="bulkaction">
                        @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th class="column column1">
                                        <div class="checkbox-info">
                                            <p>Select all</p>
                                        </div>
                                        <label class="prio-checkbox prio-checkbox-title small">
                                            <input type="checkbox" name="chkMain[]" class="filled-in all-checkboxes"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="column column2">Article ID
                                        <div class="title-arrows">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-top">
                                            <path id="round-keyboard_arrow_down-24px" d="M7.791,0a.584.584,0,0,1,0,.9L4.5,3.814a.778.778,0,0,1-1.009,0L.209.9a.584.584,0,0,1,0-.9Z" transform="translate(8 4) rotate(180)" fill="#6d6d6d"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-bottom">
                                                <path id="round-keyboard_arrow_down-24px" d="M14.2,9.264a.584.584,0,0,1,0,.9l-3.286,2.918a.778.778,0,0,1-1.009,0L6.617,10.16a.584.584,0,0,1,0-.9Z" transform="translate(-6.407 -9.263)" fill="#6d6d6d"/>
                                            </svg>  
                                        </div>
                                    </th>
                                    <th class="column column3">Title
                                        <div class="title-arrows">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-top">
                                                <path id="round-keyboard_arrow_down-24px" d="M7.791,0a.584.584,0,0,1,0,.9L4.5,3.814a.778.778,0,0,1-1.009,0L.209.9a.584.584,0,0,1,0-.9Z" transform="translate(8 4) rotate(180)" fill="#6d6d6d"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-bottom">
                                                <path id="round-keyboard_arrow_down-24px" d="M14.2,9.264a.584.584,0,0,1,0,.9l-3.286,2.918a.778.778,0,0,1-1.009,0L6.617,10.16a.584.584,0,0,1,0-.9Z" transform="translate(-6.407 -9.263)" fill="#6d6d6d"/>
                                            </svg>  
                                        </div>
                                    </th>
                                    <th class="column column4">Date
                                        <div class="title-arrows">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-top">
                                                <path id="round-keyboard_arrow_down-24px" d="M7.791,0a.584.584,0,0,1,0,.9L4.5,3.814a.778.778,0,0,1-1.009,0L.209.9a.584.584,0,0,1,0-.9Z" transform="translate(8 4) rotate(180)" fill="#6d6d6d"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-bottom">
                                                <path id="round-keyboard_arrow_down-24px" d="M14.2,9.264a.584.584,0,0,1,0,.9l-3.286,2.918a.778.778,0,0,1-1.009,0L6.617,10.16a.584.584,0,0,1,0-.9Z" transform="translate(-6.407 -9.263)" fill="#6d6d6d"/>
                                            </svg>  
                                        </div>
                                    </th>
                                    <th class="column column5">Type
                                        <div class="title-arrows">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-top">
                                                <path id="round-keyboard_arrow_down-24px" d="M7.791,0a.584.584,0,0,1,0,.9L4.5,3.814a.778.778,0,0,1-1.009,0L.209.9a.584.584,0,0,1,0-.9Z" transform="translate(8 4) rotate(180)" fill="#6d6d6d"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-bottom">
                                                <path id="round-keyboard_arrow_down-24px" d="M14.2,9.264a.584.584,0,0,1,0,.9l-3.286,2.918a.778.778,0,0,1-1.009,0L6.617,10.16a.584.584,0,0,1,0-.9Z" transform="translate(-6.407 -9.263)" fill="#6d6d6d"/>
                                            </svg>  
                                        </div>
                                    </th>
                                    <th class="column column6">Status
                                        <div class="title-arrows">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-top">
                                                <path id="round-keyboard_arrow_down-24px" d="M7.791,0a.584.584,0,0,1,0,.9L4.5,3.814a.778.778,0,0,1-1.009,0L.209.9a.584.584,0,0,1,0-.9Z" transform="translate(8 4) rotate(180)" fill="#6d6d6d"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" class="arrow-bottom">
                                                <path id="round-keyboard_arrow_down-24px" d="M14.2,9.264a.584.584,0,0,1,0,.9l-3.286,2.918a.778.778,0,0,1-1.009,0L6.617,10.16a.584.584,0,0,1,0-.9Z" transform="translate(-6.407 -9.263)" fill="#6d6d6d"/>
                                            </svg>  
                                        </div>
                                    </th>
                                    <th class="column column7"></th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach ($articles as $articleKey => $article)
                                    <tr class={{ (($articleKey%2) == 1)?'even-tr':'' }}>
                                        @php
                                            $Status = 'draft';
                                            $background = '#1bb7c2';
                                            $tooltipStatus = 'publish';
                                            if($article->status == 1){
                                                $Status = 'published';
                                                $background = '#00dc81';
                                                $tooltipStatus = 'unpublish';
                                            }
                                            if($article->status == 2){
                                                $Status = 'unpublished';
                                                $background = '#ff4411';
                                                $tooltipStatus = 'publish';
                                            }
                                        @endphp
                                        <td class="column1">
                                            <div class="left-bar-active-table" style="background-color:{!! $background !!}"></div>
                                            <div class="bottom-bar-active-table" style="background-color:{!! $background !!}"></div>
                                            <label class="prio-checkbox dashboard-checkboxes-table small">
                                            <input type="checkbox" name="chk[]" value="{{ $article->id }}" class="filled-in" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class="column2"><span class="td-title">Article ID : </span><p>{{ $article->id }}</p></td>
                                        <td class="column3"><span class="td-title">Title : </span><p>{{ $article->title }}</p></td>
                                        <td class="column4"><span class="td-title">Date :</span><p>{{ $article->publish_date }}</p></td>
                                        <td class="column5"><span class="td-title">Type : </span><p>Articles</p></td>
                                        <td class="column6"><span class="td-title">Status : </span><div class="circle circle-{!! $Status !!}"></div><p>{!! ucfirst($Status) !!}</p></td>
                                        <td class="column7">
                                            <div class="inner-column7">
                                                <div class="icon icon1">
                                                    <div class="icon1-info">
                                                        <p>Duplicate</p>
                                                    </div>
                                                    <a href={{ url("/article/duplicate/$article->id") }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.5" height="21.5" viewBox="0 0 21.5 21.5">
                                                            <g id="Group_103721" data-name="Group 103721" transform="translate(-220.25 -132.25)">
                                                                <path id="Path_164" data-name="Path 164" d="M225,150.636a2.679,2.679,0,0,0,2.727,2.727h10.909a2.679,2.679,0,0,0,2.727-2.727V139.727A2.679,2.679,0,0,0,238.636,137H227.727A2.679,2.679,0,0,0,225,139.727Z" transform="translate(-0.364 -0.364)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <path id="Path_165" data-name="Path 165" d="M237.364,136.636v-.909A2.679,2.679,0,0,0,234.636,133H223.727A2.679,2.679,0,0,0,221,135.727v10.909a2.679,2.679,0,0,0,2.727,2.727h.909" transform="translate(0)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_129" data-name="Line 129" y2="7.273" transform="translate(232.818 141.182)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_130" data-name="Line 130" x1="7.273" transform="translate(229.182 144.818)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div><!--
                                            --><div class="icon icon2">
                                                    <div class="icon2-info">
                                                        <p>{!! ucfirst($tooltipStatus) !!}</p>
                                                    </div>
                                                    <a href={{ url("/article/$tooltipStatus/$article->id") }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.5" height="20.5" viewBox="0 0 20.5 20.5">
                                                            <g id="Group_103723" data-name="Group 103723" transform="translate(-176.25 -88.25)">
                                                                <g id="Group_157" data-name="Group 157" transform="translate(177 89)">
                                                                <path id="Path_150" data-name="Path 150" d="M196,91.591A2.545,2.545,0,0,0,193.409,89H179.591A2.545,2.545,0,0,0,177,91.591v13.818A2.545,2.545,0,0,0,179.591,108h13.818A2.545,2.545,0,0,0,196,105.409Z" transform="translate(-177 -89)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                </g>
                                                                <line id="Line_115" data-name="Line 115" x2="8.304" y2="8.304" transform="translate(182.348 94.348)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_116" data-name="Line 116" x1="8.304" y2="8.304" transform="translate(182.348 94.348)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                            </g>
                                                        </svg>
                                                    </a>      
                                                </div><!--
                                            --><div class="icon icon3 delete-lightbox1">
                                                    <div class="icon3-info">
                                                        <p>Delete</p>
                                                    </div>
                                                    <a href={{ url("/article/delete/$article->id") }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.5" height="21.5" viewBox="0 0 21.5 21.5">
                                                            <g id="Group_103722" data-name="Group 103722" transform="translate(-352.25 -88.25)">
                                                                <g id="Group_67" data-name="Group 67" transform="translate(353 89)">
                                                                <path id="Path_57" data-name="Path 57" d="M355,92v14.545a2.679,2.679,0,0,0,2.727,2.727h10.909a2.679,2.679,0,0,0,2.727-2.727V92" transform="translate(-353.182 -89.273)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_29" data-name="Line 29" x2="20" transform="translate(0 2.727)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_30" data-name="Line 30" y1="2.727" transform="translate(10)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                </g>
                                                                <line id="Line_31" data-name="Line 31" y2="10" transform="translate(363 95.364)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_32" data-name="Line 32" y2="10" transform="translate(366.636 95.364)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                                <line id="Line_33" data-name="Line 33" y2="10" transform="translate(359.364 95.364)" fill="none" stroke="#bcbcbc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div><!--
                                            --><div class="edit-button-div">
                                                    <a href={{ url("/article/edit/$article->id") }} class="waves-effect waves-light edit-button">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $(".options-for-checked-checkboxes .option p").click(function(){
                    var input = $("<input>").attr("type", "hidden").attr("name", "action").val($(this).data('action'));
                    $('#bulkaction').append(input);
                    $( "#bulkaction" ).submit();
                });
            });
        </script> 
    </body>
    </html>