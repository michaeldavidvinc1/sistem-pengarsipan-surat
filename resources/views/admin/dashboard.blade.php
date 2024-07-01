@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1">Welcome back, Admin!</h6>
                <h5 class="mb-0">Dashboard</h5>
            </div>
        </div>

        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-user-circle fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Surat Masuk</h6>
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
                            <h6 class="mb-0 text-muted">Surat Keluar</h6>
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
                            <h6 class="mb-0 text-muted">Disposisi</h6>
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
                            <h6 class="mb-0 text-muted">Petugas</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="145">23</span>
                            </p>
                        </div>
                    </div>

                    <span class="text-muted"><i class="uil uil-analysis"></i> 0.0%</span>
                </a>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card" style="width: 100%">
                    <img class="img-fluid" src="assets/hero.jpg" alt="">
                </div>
            </div>
        </div><!--end row-->
    </div>
@endsection
