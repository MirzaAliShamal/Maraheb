@extends('layouts.purchase')

@section('title', 'Dashboard')

@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Howdy, {{ purchaseManager()->first_name }}!!</h3>
            <div class="text">Ready to jump back in?</div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item">
                    <div class="left">
                        <i class="icon flaticon-briefcase"></i>
                    </div>
                    <div class="right">
                        <h4>22</h4>
                        <p>Applied Jobs</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item ui-red">
                    <div class="left">
                        <i class="icon la la-file-invoice"></i>
                    </div>
                    <div class="right">
                        <h4>9382</h4>
                        <p>Job Alerts</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item ui-yellow">
                    <div class="left">
                        <i class="icon la la-comment-o"></i>
                    </div>
                    <div class="right">
                        <h4>74</h4>
                        <p>Messages</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item ui-green">
                    <div class="left">
                        <i class="icon la la-bookmark-o"></i>
                    </div>
                    <div class="right">
                        <h4>32</h4>
                        <p>Shortlist</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
