<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>




<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Shop - Sign In</title>
    <meta name="description" content="Sign In" />
    <link rel="canonical" href="" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="<?php echo base_url()?>assets/style.bundle15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
<style>
    #kt_login_signin_submit {
        background-image: linear-gradient(to right, #0a7db1 , #63d1f5);
        width: 270px;
    }

    .form_item {
        background-image: linear-gradient(to right, #F24A2D , #EE3243);
    }

    .bg-dark-o-70{
    background-color: #F22E3D;
    }
    .error{
        color: red;
    }
    p.error1
    {
        color: red;
        display: none;
    }
    p.exit
    {
        position: absolute;
        bottom: 20px;
        left: 30px;
        z-index: 9;
        color: #ff0000;
        background: #fff;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 5px;
    }
</style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">

<div class="d-flex flex-column flex-root">
    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
    <!--begin::Login-->
    <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="width: 320px;background-image: url(<?php echo base_url()?>assets/background.png);">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden" style="margin-top: -50px;bosrder: 1px solid white; border-radius: 12px;">
                <!--begin::Login Sign in form-->
                <div class="login-signin" >
                    <div class="mb-5">
                       
                        <h2 style="color: #0a7db1">Sign In</h2>
                    </div>
                     <?php if ($this->session->flashdata('success_message')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success_message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif ($this->session->flashdata('error_message')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error_message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                     <?= form_open('login', ['class' => 'user']); ?>
                        <div class="form-group">
                            <input type="text" style="background: #ffffff40; border: 2px solid #0a7db1 !important;" class="form-control form-control-user <?= (form_error('username') ? 'is-invalid' : ''); ?>" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" style="background: #ffffff40; border: 2px solid #0a7db1 !important;" class="form-control form-control-user <?= (form_error('password') ? 'is-invalid' : ''); ?>" name="password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="1">
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                        </div>
                        <button type="submit" id="kt_login_signin_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-100 px-15 py-3">Login</button>
                        <?= form_close(); ?>
                  
                </div>
                <!--end::Login Sign in form-->

            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
