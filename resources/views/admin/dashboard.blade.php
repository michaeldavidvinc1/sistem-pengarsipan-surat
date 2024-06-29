@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1">Welcome back, Admin!</h6>
                <h5 class="mb-0">Dashboard</h5>
            </div>

            <div class="mb-0 position-relative">
                <select class="form-select form-control" id="dailychart">
                    <option selected="">This Month</option>
                    <option value="aug">August</option>
                    <option value="jul">July</option>
                    <option value="jun">June</option>
                </select>
            </div>
        </div>

        <div class="row row-cols-xl-5 row-cols-md-2 row-cols-1">
            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-user-circle fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Visitor</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                    data-target="4589">2100</span></p>
                        </div>
                    </div>

                    <span class="text-danger"><i class="uil uil-chart-down"></i> 0.5%</span>
                </a>
            </div><!--end col-->

            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-usd-circle fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Revenue</h6>
                            <p class="fs-5 text-dark fw-bold mb-0">$<span class="counter-value"
                                    data-target="48575">35214</span></p>
                        </div>
                    </div>

                    <span class="text-success"><i class="uil uil-arrow-growth"></i> 3.84%</span>
                </a>
            </div><!--end col-->

            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-shopping-bag fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Orders</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                    data-target="4800">3402</span></p>
                        </div>
                    </div>

                    <span class="text-success"><i class="uil uil-arrow-growth"></i> 1.46%</span>
                </a>
            </div><!--end col-->

            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-store fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Items</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="145">23</span>
                            </p>
                        </div>
                    </div>

                    <span class="text-muted"><i class="uil uil-analysis"></i> 0.0%</span>
                </a>
            </div><!--end col-->

            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-users-alt fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Users</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="9">1.5</span>M
                            </p>
                        </div>
                    </div>

                    <span class="text-danger"><i class="uil uil-chart-down"></i> 0.5%</span>
                </a>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-xl-8 col-lg-7 mt-4">
                <div class="card shadow border-0 p-4 pb-0 rounded">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0 fw-bold">Sales Analytics</h6>

                        <div class="mb-0 position-relative">
                            <select class="form-select form-control" id="yearchart">
                                <option selected>2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
                    <div id="dashboard" class="apex-chart"></div>
                </div>
            </div><!--end col-->

            <div class="col-xl-4 col-lg-5 mt-4 rounded">
                <div class="card shadow border-0">
                    <div class="p-4 border-bottom">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0 fw-bold">Upcoming Activity</h6>

                            <a href="#!" class="text-primary">See More <i
                                    class="uil uil-arrow-right align-middle"></i></a>
                        </div>
                    </div>

                    <div class="p-4" data-simplebar style="height: 365px;">
                        <a href="javascript:void(0)"
                            class="features feature-primary key-feature d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-circle me-3">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 text-dark">Meeting with Developers</h6>
                                    <small class="text-muted">Today 6:00pm</small>
                                </div>
                            </div>

                            <i class="ti ti-arrow-up text-warning"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="features feature-success key-feature d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-circle me-3">
                                    <i class="ti ti-gift"></i>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 text-dark">Cally's Birthday</h6>
                                    <small class="text-muted">Tomorrow 10:00am</small>
                                </div>
                            </div>

                            <i class="ti ti-arrow-down text-success"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="features feature-primary key-feature d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-circle me-3">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 text-dark">Meeting with C.E.O</h6>
                                    <small class="text-muted">Today 6:00pm</small>
                                </div>
                            </div>

                            <i class="ti ti-arrow-down text-success"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="features feature-danger key-feature d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-circle me-3">
                                    <i class="ti ti-video-plus"></i>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 text-dark">Movie Night</h6>
                                    <small class="text-muted">Today 6:00pm</small>
                                </div>
                            </div>

                            <i class="ti ti-arrow-down text-success"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="features feature-primary key-feature d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-circle me-3">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 text-dark">Meeting with HR</h6>
                                    <small class="text-muted">Today 6:00pm</small>
                                </div>
                            </div>

                            <i class="ti ti-arrow-down text-success"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="features feature-success key-feature d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <div class="icon text-center rounded-circle me-3">
                                    <i class="ti ti-gift"></i>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 text-dark">Carlo's Birthday</h6>
                                    <small class="text-muted">Today 6:00pm</small>
                                </div>
                            </div>

                            <i class="ti ti-arrow-down text-success"></i>
                        </a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 mt-4">
                        <div class="card rounded shadow border-0 p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <h6 class="mb-0">Monthly Sales Report</h6>

                                <div class="text-end">
                                    <h5 class="mb-0">2384</h5>
                                    <h6 class="text-muted mb-0">September</h6>
                                </div>
                            </div>
                            <div id="sale-chart"></div>
                        </div>
                    </div><!--end col-->

                    <div class="col-xl-12 mt-4">
                        <div class="card rounded shadow border-0 p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <h6 class="mb-0">Weekly Top Products</h6>

                                <div class="text-end">
                                    <h6 class="text-muted mb-0">Last Week</h6>
                                </div>
                            </div>
                            <div id="top-product-chart"></div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->

            <div class="col-xl-8 mt-4">
                <div class="card border-0">
                    <div class="d-flex justify-content-between p-4 shadow rounded-top">
                        <h6 class="fw-bold mb-0">Invoice List</h6>

                        <ul class="list-unstyled mb-0">
                            <li class="dropdown dropdown-primary list-inline-item">
                                <button type="button" class="btn btn-icon btn-pills btn-soft-primary dropdown-toggle p-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="ti ti-dots-vertical"></i></button>
                                <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3">
                                    <a class="dropdown-item text-dark" href="#"> Paid</a>
                                    <a class="dropdown-item text-dark" href="#"> Unpaid</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="table-responsive shadow rounded-bottom" data-simplebar style="height: 545px;">
                        <table class="table table-center bg-white mb-0">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3">No.</th>
                                    <th class="border-bottom p-3" style="min-width: 220px;">Client Name
                                    </th>
                                    <th class="text-center border-bottom p-3">Amount</th>
                                    <th class="text-center border-bottom p-3" style="min-width: 150px;">
                                        Generate(Dt.)</th>
                                    <th class="text-center border-bottom p-3">Status</th>
                                    <th class="text-end border-bottom p-3" style="min-width: 100px;">
                                        Preview</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d01</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/01.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Howard Tanner</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$253</td>
                                    <td class="text-center p-3">23th Sept 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-danger rounded px-3 py-1">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d02</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/02.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Wendy Filson</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$482</td>
                                    <td class="text-center p-3">11th Sept 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-success rounded px-3 py-1">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d03</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/03.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Faye Bridger</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$546</td>
                                    <td class="text-center p-3">2nd Sept 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-danger rounded px-3 py-1">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d04</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/04.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Ronald Curtis</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$154</td>
                                    <td class="text-center p-3">1st Sept 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-danger rounded px-3 py-1">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d05</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/05.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Melissa Hibner</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$458</td>
                                    <td class="text-center p-3">1st Sept 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-success rounded px-3 py-1">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d06</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/06.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Randall Case</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$548</td>
                                    <td class="text-center p-3">28th Aug 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-success rounded px-3 py-1">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d07</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/07.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Jerry Morena</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$658</td>
                                    <td class="text-center p-3">25th Aug 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-danger rounded px-3 py-1">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d08</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/08.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Lester McNally</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$457</td>
                                    <td class="text-center p-3">20th Aug 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-danger rounded px-3 py-1">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d09</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/09.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Christopher Burrell</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$586</td>
                                    <td class="text-center p-3">15th Aug 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-success rounded px-3 py-1">
                                            Paid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->

                                <!-- Start -->
                                <tr>
                                    <th class="p-3">#d10</th>
                                    <td class="p-3">
                                        <a href="#" class="text-primary">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/client/10.jpg"
                                                    class="avatar avatar-ex-small rounded-circle shadow" alt="">
                                                <span class="ms-2">Mary Skeens</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">$325</td>
                                    <td class="text-center p-3">10th Aug 2021</td>
                                    <td class="text-center p-3">
                                        <div class="badge bg-soft-danger rounded px-3 py-1">
                                            Unpaid
                                        </div>
                                    </td>
                                    <td class="text-end p-3">
                                        <a href="invoice.html" class="btn btn-sm btn-primary">Preview</a>
                                    </td>
                                </tr>
                                <!-- End -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection
