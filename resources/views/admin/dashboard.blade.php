@extends('layouts/app')
@section('konten')
<div class="row">
    <!-- task, page, download counter  start -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['jumlah_ppns'] }}</h4>
                        <h6 class="text-white m-b-0">Jumlah PPNS</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-1" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">290+</h4>
                        <h6 class="text-white m-b-0">PPNS Aktif</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-2" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">145</h4>
                        <h6 class="text-white m-b-0">Habis masa aktiif thn ini</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-3" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-lite-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">500</h4>
                        <h6 class="text-white m-b-0">PPNS area seluruh indonesia</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- task, page, download counter  end -->

</div>
@endsection