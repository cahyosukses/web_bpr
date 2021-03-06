<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo get_title('TITLE'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/base-admin-2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet" type="text/css">
        
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery/css/black-tie/jquery-ui-1.10.3.custom.css" />
        <script src="<?php echo base_url(); ?>assets/jquery/js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery/js/jquery-ui-1.10.3.custom.js"></script>
        <!--<script  type="text/javascript" src="http://www.codemashups.com/source/jquery/jquery-autocomplete-p1/js/jq-ac-script.js"></script>-->
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php if ($this->session->userdata('logged_in') == true) {
            ?>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="brand" href="#">EDP apps <sup>1.0.0</sup></a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <!--li  class="active"-->
                                <li><a href="<?php echo site_url('admin/welcome'); ?>">Home</a></li>
                                <li><a href="<?php echo site_url('admin/peoples'); ?>">Peoples</a></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        Settings
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('admin/settings'); ?>">Parameters</a></li>
                                        <li><a href="<?php echo site_url('admin/branches'); ?>">Branch Offices</a></li>
                                        <li><a href="<?php echo site_url('admin/banners'); ?>">Banners</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        Contents
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('admin/products'); ?>">Products</a></li>
                                        <li><a href="<?php echo site_url('admin/news'); ?>">News</a></li>
                                        <li><a href="<?php echo site_url('admin/suggestions'); ?>">Suggestions</a></li>
                                        <li><a href="<?php echo site_url('admin/galleries/albums/'); ?>" tabindex="-1">Create Album</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        SMS Banking
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#myModal" role="button" data-toggle="modal">Send Message</a></li>
                                        <li><a href="<?php echo site_url('admin/smscenters/inbox/'); ?>">Inbox</a></li>
                                        <li><a href="<?php echo site_url('admin/smscenters/outbox/'); ?>">Outbox</a></li>
                                        <li><a href="<?php echo site_url('admin/smscenters/sentitems/'); ?>">Sentitems</a></li>
                                        <li><a href="#">Template Message</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo site_url('admin/smscenters/config/'); ?>">Config Gammu</a></li>
                                    </ul>
                                </li>

                            </ul>
                            <ul class="nav pull-right">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <?php echo $this->session->userdata('full_name'); ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:;">Profile</a></li>
                                        <li><a href="javascript:;">Message <span class="badge badge-warning">0</span></a></li>
                                        <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo site_url('admin/users/sign_out'); ?>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>

            <!-- MODAL FORM SEND MESSAGE -->
            <!-- Button to trigger modal -->
            <script type="text/javascript">
                function Hitung() {                    
                    var curText = document.fmessage.textmessage.value.length;
                    var maxText = 160;
                    var sisa = maxText - curText;
                    var isi = document.getElementById('maxkarakter');
                    isi.innerHTML = sisa + ' karakter';
                }
            </script>        

            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Compose Message</h3>
                </div>
                <div class="modal-body">
                    <div id="replay-form" title="replay message">
                        <fieldset>
                            <?php
                            $attributes = array('name' => "fmessage");
                            echo form_open("admin/smscenters/send_messages/", $attributes);
                            ?>
                            <label for="hp">Handphone Number</label>
                            <input type="text" name="phone_number" class="input-block-level">
                            <span id="hp_verify" class="verify"></span><br>
                            <label for="message">Message</label>
                            <textarea name="textmessage" onKeyUp="Hitung()"maxlength="160"
                                      id="alamat" rows="5" cols="55" class="input-block-level"> </textarea>
                            </br><div id="maxkarakter"> 160 karakter </div></br>
                            <input type=submit name=ok id="tombol3" align=left value="Send Message" class="btn btn-secondary" />
    <?php echo form_close(); ?>
                        </fieldset>
                    </div>
                </div>
                <!--div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div-->
            </div>

<?php } ?>
        <div class="container" style="margin-top: 40px;">