@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1">Welcome back, User!</h6>
                <h5 class="mb-0">Dashboard</h5>
            </div>
        </div>

        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-envelope fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Surat Masuk</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                    data-target="{{ $surat_masuk }}">0</span></p>
                        </div>
                    </div>
                </a>
            </div><!--end col-->

            <div class="col mt-4">
                <a href="#!"
                    class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-envelope-check fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Surat Keluar</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                    data-target="{{ $surat_keluar }}">0</span></p>
                        </div>
                    </div>

                </a>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card" style="width: 100%; ">
                    <img class="img-fluid" src="assets/hero.jpg" alt="">
                </div>
            </div>
        </div><!--end row-->
    </div>
@endsection
