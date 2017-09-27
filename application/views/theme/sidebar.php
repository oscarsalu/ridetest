<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                             </span>
                             <h2><a href="<?= base_url() ?>auth"><i class="fa fa-desktop"></i> Share Ride</a></h2>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('first_name')."  ".$this->session->userdata('last_name') ?></strong>
                             </span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?= base_url() ?>auth/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SR
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-star"></i> <span class="nav-label">Find a ride</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                    
                            <li><a href="<?= site_url('Getride') ?>">Book A Ride</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-magic"></i> <span class="nav-label">Offer a ride</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="<?= site_url('Bookrid') ?>">Booked Rides</a></li>
                            <li><a href="<?= site_url('Getride/create_getride') ?>">Offer Ride</a></li>
                            <li><a href="<?= site_url('Bookrid/index') ?>">All Offered rides</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

         <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome</span>
                </li>
                <li>
                    <a href="<?= base_url() ?>auth/login">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
                <div class="row  border-bottom white-bg dashboard-header">
                <section class="wrapper wrapper-content animated fadeIn">