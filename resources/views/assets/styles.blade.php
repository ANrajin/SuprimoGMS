{{-- Applications Default Styles Are Defined --}}
<!-- simplebar CSS-->
<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
<!-- Bootstrap core CSS-->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
<!-- animate CSS-->
<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
<!-- Icons CSS-->
<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
<!-- Sidebar CSS-->
<link href="{{asset('assets/css/sidebar-menu.css')}}" rel="stylesheet" />
<!--Select Plugins-->
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>

<link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" />
@stack('styles')

<!-- Custom Style-->
<link href="{{asset('assets/css/app-style.css')}}" rel="stylesheet" />

<style>
.btn{
    padding: 3px 5px !important;
}
.table td {
	padding:1px !important;
	padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
@media print{
    body * { visibility: hidden; background: none !important; }
    .printcontent * { visibility: visible;}
    .printcontent { position: absolute; top:-90px; left: 0px;}
    #hide_button { visibility: hidden; }
} 
</style>