@extends('central.home')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-6">
            <h4 class="page-title">Dashboard</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="col-6">
            <div class="text-right">
                <small>Users</small>
                <h5 class="text-info">3,458</h5>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-4">
                            <small>Wallet Balance</small>
                            <h4 class="mb-0">$3,567.53</h4>
                        </div>
                        <div class="chart ml-auto">
                            asdfadf
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover bg-red">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-4">
                            <small>Wallet Balance</small>
                            <h4 class="mb-0">$3,567.53</h4>
                        </div>
                        <div class="chart ml-auto">
                            asdfadf
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover bg-green">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-4">
                            <small>Wallet Balance</small>
                            <h4 class="mb-0">$3,567.53</h4>
                        </div>
                        <div class="chart ml-auto">
                            asdfadf
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Top Selling Products</h4>
                            <p class="card-subtitle">Overview of Top Selling Items</p>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <select class="custom-select">
                                    <option value="0" selected="">Monthly</option>
                                    <option value="1">Daily</option>
                                    <option value="2">Weekly</option>
                                    <option value="3">Yearly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Products</th>
                                <th class="border-top-0">License</th>
                                <th class="border-top-0">Support Agent</th>
                                <th class="border-top-0">Technology</th>
                                <th class="border-top-0">Tickets</th>
                                <th class="border-top-0">Sales</th>
                                <th class="border-top-0">Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle btn-info text-white">EA</a></div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-danger">Angular</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle btn-warning text-white">MA</a></div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Monster Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>Venessa Fern</td>
                                <td>
                                    <label class="label label-info">Vue Js</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle btn-success text-white">MP</a></div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-success">Bootstrap</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle btn-primary text-white">AA</a></div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Ample Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-purple">React</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card card-hover">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="font-w700">Product</th>
                                <th class="d-none d-sm-table-cell font-w700">Date</th>
                                <th class="font-w700">State</th>
                                <th class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">Price</th>
                                <th class="font-w700 text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="font-w600">iPhone X</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-warning">Pending..</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $999,99
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">MacBook Pro 15"</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-warning">Pending..</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $2.299,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">Nvidia GTX 1080 Ti</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-warning">Pending..</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $1200,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">Playstation 4 Pro</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-danger">Cancelled</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $399,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">Nintendo Switch</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $349,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">iPhone X</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $999,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">Echo Dot</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $39,99
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="font-w600">Xbox One X</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    $499,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="" class="js-tooltip-enabled" data-original-title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">File Tree</h4>
                    <div class="tree">
                        <ul>
                            <li><i class="fa fa-folder-open"></i> Project
                                <ul>
                                    <li><i class="fa fa-folder-open"></i> Opened Folder <span>- 15kb</span>
                                        <ul>
                                            <li><i class="fa fa-folder-open"></i> css
                                                <ul>
                                                    <li><i class="fa fa-code"></i> CSS Files <span>- 3kb</span>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><i class="fa fa-folder"></i> Folder close <span>- 10kb</span>
                                            </li>
                                            <li><i class="fab fa-html5"></i> index.html</li>
                                            <li><i class="fa fa-picture-o"></i> favicon.ico</li>
                                        </ul>
                                    </li>
                                    <li><i class="fa fa-folder"></i> Folder close <span>- 420kb</span>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card has-shadow">
                <div class="card-body border-top">
                    <h4 class="card-title">Stocks</h4>
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>APPL</td>
                                <td>$ 9,500</td>
                                <td class="color-green">+ 458</td>
                            </tr>
                            <tr>
                                <td>GOOG</td>
                                <td>$ 15,425</td>
                                <td class="color-red">- 1,632</td>
                            </tr>
                            <tr>
                                <td>AMD</td>
                                <td>$ 11,540</td>
                                <td class="color-green">+ 8,326</td>
                            </tr>
                            <tr>
                                <td>HGM</td>
                                <td>$ 15,855</td>
                                <td class="color-green">+ 11,326</td>
                            </tr>
                            <tr>
                                <td>MKR</td>
                                <td>$ 18,500</td>
                                <td class="color-red">- 6,586</td>
                            </tr>
                            <tr>
                                <td>APPL</td>
                                <td>$ 9,500</td>
                                <td class="color-green">+ 458</td>
                            </tr>
                            <tr>
                                <td>GOOG</td>
                                <td>$ 15,425</td>
                                <td class="color-red">- 1,632</td>
                            </tr>
                            <tr>
                                <td>AMD</td>
                                <td>$ 11,540</td>
                                <td class="color-green">+ 8,326</td>
                            </tr>
                            <tr>
                                <td>HGM</td>
                                <td>$ 15,855</td>
                                <td class="color-green">+ 11,326</td>
                            </tr>
                            <tr>
                                <td>MKR</td>
                                <td>$ 18,500</td>
                                <td class="color-red">- 6,586</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Purchased On</th>
                                <th>Status</th>
                                <th>Tracking No#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="https://bootadmin.org/images/icons/lulu/Desktop.png" style="width:50px" alt="iMac">
                                </td>
                                <td>iMac</td>
                                <td>Russell</td>
                                <td>22/08/2018</td>
                                <td>
                                    <span class="badge badge-success font-weight-100">Paid</span>
                                </td>
                                <td>#98BC85SD84</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://bootadmin.org/images/icons/lulu/Mobile.png" style="width:50px" alt="iPhone">
                                </td>
                                <td>iPhone</td>
                                <td>Carol</td>
                                <td>15/07/2018</td>
                                <td>
                                    <span class="badge badge-warning font-weight-100">Pending</span>
                                </td>
                                <td>#98SA3C9SC</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://bootadmin.org/images/icons/lulu/Clock.png" style="width:50px" alt="apple_watch">
                                </td>
                                <td>Apple Watch</td>
                                <td>Austin Pena</td>
                                <td>10/07/2018</td>
                                <td>
                                    <span class="badge badge-success font-weight-100">Paid</span>
                                </td>
                                <td>#98BC85SD84</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://bootadmin.org/images/icons/lulu/Headphones.png" style="width:50px" alt="mac_mouse">
                                </td>
                                <td>Headphones</td>
                                <td>Randy</td>
                                <td>22/04/2018</td>
                                <td>
                                    <span class="badge badge-default font-weight-100">Failed</span>
                                </td>
                                <td>#98SA3C9SC</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer>
    <p>&copy; Bootadmin. All Rights Reserved. <br />Designed and Developed by <a href="https://sazzad.me">Sazzad Hossain</a>.</p>
</footer>

@endsection