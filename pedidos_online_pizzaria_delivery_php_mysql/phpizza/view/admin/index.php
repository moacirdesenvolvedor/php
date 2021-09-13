<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once 'site-base.php'; ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/icon.png">
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
        <!-- Bootstrap core CSS -->
        <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Http::base() ?>/assets/vendor/html5/html5.js"></script>
          <script src="<?= Http::base() ?>/assets/vendor/html5/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="js/jquery.codemirror/lib/codemirror.css">
        <link rel="stylesheet" type="text/css" href="js/jquery.codemirror/theme/ambiance.css">
        <link rel="stylesheet" type="text/css" href="js/jquery.vectormaps/jquery-jvectormap-1.2.2.css"  media="screen"/>
        <link href="css/style.css" rel="stylesheet" />	

    </head>
    <body class="animated">
        <div id="cl-wrapper">
            <div class="cl-sidebar">
                <?php require_once 'side_menu.php'; ?>
            </div>
            <div class="container-fluid" id="pcont">
                <!-- TOP NAVBAR -->
                <?php require_once 'top_menu.php'; ?>
                <div class="cl-mcont">	
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="fd-tile detail clean tile-purple">
                                <div class="content"><h1 class="text-left">170</h1><p>New Visitors</p></div>
                                <div class="icon"><i class="fa fa-flag"></i></div>
                                <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="fd-tile detail clean tile-green">
                                <div class="content"><h1 class="text-left">24</h1><p>New Comments</p></div>
                                <div class="icon"><i class="fa fa-comments"></i></div>
                                <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="block-flat">
                                <div class="header">							
                                    <h3>Visitors</h3>
                                </div>
                                <div class="content full-width">
                                    <div id="chart3-legend" class="legend-container"></div>
                                    <div id="chart3" style="height: 180px;"></div>
                                    <div class="counter-detail">
                                        <div class="counter"><div class="spk1"></div><p>New Visitors</p><h5>146</h5></div>
                                        <div class="counter"><div class="spk2"></div><p>Old Visitors</p><h5>109</h5></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-flat">
                                <div class="header">							
                                    <h3>Tasks</h3>
                                </div>
                                <div class="content">
                                    <div class="table-responsive">
                                        <table class="no-border hover list">
                                            <tbody class="no-border-y">
                                                <tr class="items">
                                                    <td style="width: 10%;"><span class="label label-warning">Task</span></td>
                                                    <td><p><strong>Graphics</strong><span>description</span></p></td>
                                                    <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-warning" style="width: 80%">80%</div></div></td>
                                                    <td class="text-right" style="width: 15%;"><a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="#"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                                <tr class="items">
                                                    <td><span class="label label-danger">File</span></td>
                                                    <td><p><strong>Contact_form.psd</strong><span>description</span></p></td>
                                                    <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-danger" style="width: 60%">60%</div></div></td>
                                                    <td class="text-right"><a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="#"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                                <tr class="items">
                                                    <td><span class="label label-success">Item</span></td>
                                                    <td><p><strong>Header</strong><span>description</span></p></td>
                                                    <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-success" style="width: 100%">100%</div></div></td>
                                                    <td class="text-right"><a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="#"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                                <tr class="items">
                                                    <td><span class="label label-info">Social</span></td>
                                                    <td><p><strong>Social Networks</strong><span>description</span></p></td>
                                                    <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-info" style="width: 100%">100%</div></div></td>
                                                    <td class="text-right"><a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="#"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>		
                                    </div>
                                </div>
                            </div>				

                        </div>
                        <div class="col-md-5">
                            <div class="block-flat">
                                <div class="header">							
                                    <h3>Services</h3>
                                </div>
                                <div class="content">
                                    <div id="site_statistics2" style="height: 165px; padding: 0px; position: relative;"></div>							
                                </div>
                                <div class="content">
                                    <table class="no-border hover">
                                        <thead class="no-border">
                                            <tr>
                                                <th style="width:50%;">Service</th>
                                                <th>Date</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="no-border-y">
                                            <tr>
                                                <td style="width:30%;"><i class="fa fa-cloud"></i>Cloud Services</td>
                                                <td>01/01/2014</td>
                                                <td class="text-right color-success"><i class="fa fa-angle-up"></i>33%</td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;"><i class="fa fa-inbox"></i> Hosting Space</td>
                                                <td>04/01/2014</td>
                                                <td class="text-right color-danger"><i class="fa fa-angle-down"></i>75%</td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;"><i class="fa  fa-envelope"></i> Mails Received</td>
                                                <td>07/01/2014</td>
                                                <td class="text-right color-primary"><i class="fa fa-angle-right"></i>256</td>
                                            </tr>
                                        </tbody>
                                    </table>						
                                </div>
                            </div>
                            <div class="block-flat dark-box visitors">				
                                <h4 class="no-margin">Visitors</h4>
                                <div class="row">
                                    <div class="counters col-md-4">
                                        <h1>477</h1>
                                        <h1>23</h1>
                                    </div>							
                                    <div class="col-md-8">
                                        <div id="ticket-chart" style="height: 140px;"></div>
                                    </div>							
                                </div>
                                <div class="row footer">
                                    <div class="col-md-6"><p><i class=" fa fa-square"></i> New Visitors</p></div>
                                    <div class="col-md-6"><p><i class=" return fa fa-square"></i> Returning Visitors</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="block ">
                                <div class="content  no-padding" id="world-map" style="height: 320px;"></div>
                                <div class="content">
                                    <table class="no-border">
                                        <thead class="no-border">
                                            <tr>
                                                <th style="width:50%;">Country</th>
                                                <th>New Visits</th>
                                                <th>Rebound</th>
                                                <th class="text-right">Visits</th>
                                            </tr>
                                        </thead>
                                        <tbody class="no-border-x no-border-y">
                                            <tr>
                                                <td style="width:30%;"><img src="images/flags/us.png" alt="flag" /> United States</td>
                                                <td>679</td>
                                                <td>27%</td>
                                                <td class="text-right">1800</td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;"><img src="images/flags/in.png" alt="flag" /> India</td>
                                                <td>349</td>
                                                <td>57%</td>
                                                <td class="text-right">1512</td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;"><img src="images/flags/gb.png" alt="flag" /> United Kingdom</td>
                                                <td>234</td>
                                                <td>50%</td>
                                                <td class="text-right">530</td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;"><img src="images/flags/br.png" alt="flag" /> Brazil</td>
                                                <td>34</td>
                                                <td>8%</td>
                                                <td class="text-right">340</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>				
                        </div>
                        <div class="col-md-5">
                            <div class="block widget-notes">
                                <div class="header dark"><h4>Notes</h4></div>
                                <div class="content">
                                    <div class="paper" contenteditable="true">
                                        Send e-mails.<br>
                                        <s>meeting at 4 pm.</s><br>
                                        <s>Buy some coffee.</s><br>
                                        Talk with Mom about John Doe.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="block widget-notes">
                                <div class="header dark"><h4>Console</h4></div>
                                <div class="content">
                                    <div id="console">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 

        </div>
        <!-- Right Chat-->
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right side-chat">
            <div class="header">
                <h3>Chat</h3>
            </div>
            <div class="sub-header">
                <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
            </div>
            <div class="content">
                <p class="title">Family</p>
                <ul class="nav nav-pills nav-stacked contacts">
                    <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
                    <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
                    <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Richard Avedon</a></li>
                    <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Allen Collins</a></li>
                </ul>

                <p class="title">Friends</p>
                <ul class="nav nav-pills nav-stacked contacts">
                    <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Jaime Garzon</a></li>
                    <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Dave Grohl</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Victor Jara</a></li>
                </ul>   

                <p class="title">Work</p>
                <ul class="nav nav-pills nav-stacked contacts">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Ansel Adams</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Gustavo Cerati</a></li>
                </ul>

            </div>
            <div id="chat-box">
                <div class="header">
                    <span>Richard Avedon</span>
                    <a class="close"><i class="fa fa-times"></i></a>
                </div>
                <div class="messages nano nscroller">
                    <div class="content">
                        <ul class="conversation">
                            <li class="odd">
                                <p>Hi Jane, how are you?</p>
                            </li>
                            <li class="text-right">
                                <p>Hello I was looking for you</p>
                            </li>
                            <li class="odd">
                                <p>Tell me what you need?</p>
                            </li>
                            <li class="text-right">
                                <p>Sorry, I'm late... see you</p>
                            </li>
                            <li class="odd unread">
                                <p>OK, call me later...</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="chat-input">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter a message...">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </nav>

        <script src="js/jquery.js"></script>
        <script src="js/jquery.cooki/jquery.cooki.js"></script>
        <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
        <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
        <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
        <script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="js/behaviour/core.js"></script>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
        <style type="text/css">
            #color-switcher{
                position:fixed;
                background:#272930;
                padding:10px;
                top:50%;
                right:0;
                margin-right:-109px;
            }

            #color-switcher .toggle{
                cursor:pointer;
                font-size:15px;
                color: #FFF;
                display:block;
                position:absolute;
                padding:4px 10px;
                background:#272930;
                width:25px;
                height:30px;
                left:-24px;
                top:22px;
            }

            #color-switcher p{color: rgba(255, 255, 255, 0.6);font-size:12px;margin-bottom:3px;}
            #color-switcher .palette{padding:1px;}
            #color-switcher .color{width:15px;height:15px;display:inline-block;cursor:pointer;}
            #color-switcher .color.purple{background:#7761A7;}
            #color-switcher .color.green{background:#19B698;}
            #color-switcher .color.red{background:#EA6153;}
            #color-switcher .color.blue{background:#54ADE9;}
            #color-switcher .color.orange{background:#FB7849;}
            #color-switcher .color.prusia{background:#476077;}
            #color-switcher .color.yellow{background:#fec35d;}
            #color-switcher .color.pink{background:#ea6c9c;}
            #color-switcher .color.brown{background:#9d6835;}
            #color-switcher .color.gray{background:#afb5b8;}
        </style>
        <div id="color-switcher">
            <p>Select Color</p>
            <div class="palette">
                <div class="color purple" data-color="purple"></div>
                <div class="color green" data-color="green"></div>
                <div class="color red" data-color="red"></div>
                <div class="color blue" data-color="blue"></div>
                <div class="color orange" data-color="orange"></div>
            </div>
            <div class="palette">
                <div class="color prusia" data-color="prusia"></div>
                <div class="color yellow" data-color="yellow"></div>
                <div class="color pink" data-color="pink"></div>
                <div class="color brown" data-color="brown"></div>
                <div class="color gray" data-color="gray"></div>
            </div>
            <div class="toggle"><i class="fa fa-angle-left"></i></div>
        </div>
        <script type="text/javascript">
            var link = $('link[href="css/style.css"]');

            if ($.cookie("css")) {
                link.attr("href", 'css/style-' + $.cookie("css") + '.css');
            }

            $(function () {
                $("#color-switcher .toggle").click(function () {
                    var s = $(this).parent();
                    if (s.hasClass("open")) {
                        s.animate({'margin-right': '-109px'}, 400).toggleClass("open");
                    } else {
                        s.animate({'margin-right': '0'}, 400).toggleClass("open");
                    }
                });

                $("#color-switcher .color").click(function () {
                    var color = $(this).data("color");
                    $("body").fadeOut(function () {
                        //link.attr('href','css/style-' + color + '.css');
                        $.cookie("css", color, {expires: 365, path: '/'});
                        window.location.href = "";
                        $(this).fadeIn("slow");
                    });
                });
            });
        </script>   
        <script src="js/jquery.codemirror/lib/codemirror.js"></script>
        <script src="js/jquery.codemirror/mode/xml/xml.js"></script>
        <script src="js/jquery.codemirror/mode/css/css.js"></script>
        <script src="js/jquery.codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="js/jquery.codemirror/addon/edit/matchbrackets.js"></script>
        <script src="js/jquery.vectormaps/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery.vectormaps/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/behaviour/dashboard.js"></script>
        <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
        <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
    </body>
</html>
