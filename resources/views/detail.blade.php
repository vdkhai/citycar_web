@extends('layouts.app')

@section('content')
<style>
    .main-wrap {
        flex: 1 1 auto;
        max-width: 100%;
        position: relative;
    }
    .car-detail-container {
        overflow-x: hidden;
    }
    .detail-head-wrapper {
        max-width: 1440px;
        margin: 0 auto;
    }
    .car-head-half-wrapper {
        box-sizing: border-box;
        width: 100%;
    }
    @media screen and (min-width: 1080px) {
        .car-head-half-wrapper {
            width: 65%;
        }
    }
    .car-head-half-wrapper .car-pictures-wrapper {
        position: relative;
        z-index: 0;
    }
    .car-base-infos-wrapper {
        position: relative;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 0 16px;
    }
    @media screen and (min-width: 1080px) {
        .car-base-infos-wrapper {
            width: 35%;
            font-size: 18px;
        }
    }
    .car-base-infos-wrapper .car-title-wrapper {
        flex-wrap: wrap;
        margin: 8px 0 4px;
        font-size: 20px;
        font-weight: 700;
        color: #2e2e2e;
    }
    @media screen and (min-width: 1080px) {
        .car-base-infos-wrapper .car-title-wrapper {
            font-size: 22px;
        }
    }
    .car-base-infos-wrapper .car-mileage {
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        color: #333;
    }
    .car-base-infos-wrapper .car-price-wrapper .price:first-child {
        font-size: 20px;
        font-weight: 700;
        color: #e9280d;
    }
    .car-base-infos-wrapper .car-price-wrapper .price:first-child .price-prefix {
        font-size: 14px;
        font-weight: 500;
    }
    .car-base-infos-wrapper .car-price-wrapper .price:nth-child(2) {
        font-size: 14px;
        color: #b2b2b2;
        text-decoration: line-through;
    }
    .car-details {
        padding: 32px 0 8px;
    }
    @media screen and (min-width: 1080px) {
        .car-details {
            padding: 40px 0 20px;
        }
    }

    .line-head {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .line-head-line {
        width: 32px;
        height: 3px;
        margin-bottom: 12px;
        background: #fdcf33;
    }
    .line-head-title {
        font-family: robotobold,sans-serif;
        font-weight: bold;
        font-size: 32px;
        line-height: 38px;
        color: #173559;
        white-space: nowrap;
    }
    .line-head-subtitle {
        max-width: 563px;
        margin-top: 8px;
        font-family: robotoregular,sans-serif;
        font-size: 12px;
        line-height: 18px;
        color: grey;
        text-align: center;
    }
    .car-detail-container .line-head-line {
        height: 4px;
        border-radius: 4px;
    }
    .car-detail-container .line-head-title {
        color: #2e2e2e;
    }
    .car-detail-container .line-head-subtitle {
        color: #959ca4;
    }
    @media screen and (min-width: 1080px) {
        .car-detail-container .line-head-subtitle {
            min-width: 800px;
        }
    }
    .car-details .car-details-body {
        max-width: 1264px;
        padding: 0 16px;
        margin: 16px auto 0;
    }
    @media screen and (min-width: 1080px) {
        .car-details .car-details-body {
            padding: 0 32px;
            margin-top: 24px;
        }
    }
    .car-details .car-details-body .car-details-content {
        display: flex;
        flex-wrap: wrap;
        padding-top: 20px;
        border-top: 1px solid #ebebeb;
    }
    @media screen and (min-width: 1080px) {
        .car-details .car-details-body .car-details-content {
            padding-top: 0;
        }
    }
    .car-details .car-details-body .detail-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 50%;
        padding: 0 8px;
        margin-bottom: 20px;
        font-size: 14px;
        text-align: center;
    }
    @media screen and (min-width: 1080px) {
        .car-details .car-details-body .detail-item {
            flex-direction: row;
            width: calc(50% - 43px);
            height: 50px;
            padding: 0;
            margin-bottom: 0;
            font-size: 16px;
            line-height: 1em;
            text-align: left;
            border-bottom: 1px solid #ebebeb;
        }
    }
    @media screen and (min-width: 1080px) {
        .car-details .car-details-body .detail-item:nth-child(2n) {
            margin-left: 86px;
        }
    }
    .car-details .car-details-body .detail-item .key {
        flex: 1;
        margin-bottom: 5px;
        font-family: robotoregular,sans-serif;
        color: #696c71;
    }
    @media screen and (min-width: 1080px) {
        .car-details .car-details-body .detail-item .key {
            margin-bottom: 0;
        }
    }
    .car-details .car-details-body .detail-item .value {
        font-family: robotobold, sans-serif;
        font-weight: bold;
        color: rgb(0, 0, 0);
    }
    @media screen and (min-width: 1080px) {
        .car-details .car-details-body .detail-item.last-row {
            border-bottom: none;
        }
    }
    
</style>

<div class="main-wrap">
    <div class="car-detail-container">
        <div class="car-detail-wrapper">
            <div class="detail-head-wrapper d-flex flex-wrap">
                <div class="car-head-half-wrapper">
                    <div class="car-pictures-wrapper">
                        <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                            <div class="carousel-indicators">
                                @foreach ($carPost['images'] as $key => $image)
                                    <button
                                        type="button"
                                        data-mdb-target="#carouselExampleIndicators"
                                        data-mdb-slide-to="{{ $key }}"
                                        @if ($key == 0) class="active" @endif
                                        aria-current="true"
                                        aria-label="Slide {{ $key }}"
                                    ></button>
                                @endforeach
                              
                            </div>
                            <div class="carousel-inner">
                                @foreach ($carPost['images'] as $key => $image)
                                    <div class="carousel-item @if ($key == 0) active @endif">
                                        <img
                                          src="{{ $image->url() }}"
                                          class="d-block w-100"
                                          alt="..."
                                        />
                                      </div>
                                @endforeach
                            </div>
                            <button
                              class="carousel-control-prev"
                              type="button"
                              data-mdb-target="#carouselExampleIndicators"
                              data-mdb-slide="prev"
                            >
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button
                              class="carousel-control-next"
                              type="button"
                              data-mdb-target="#carouselExampleIndicators"
                              data-mdb-slide="next"
                            >
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>
                </div>
                <div class="car-base-infos-wrapper">
                    <div class="base-infos-top-wrapper">
                        <div class="car-title-wrapper">
                            <span>
                                {{ $carPost['registrationDate'] ? Carbon\Carbon::createFromFormat('d/m/Y', $carPost['registrationDate'])->year : '' }}
                                {{ $carPost['carModel']['carBrand']['name'] }}
                                {{ $carPost['carModel']['title'] }}
                                {{ $carPost['title'] }}
                            </span>
                        </div>
                        <div class="car-mileage">
                            {{ $carPost['current_mileage'] ? number_format($carPost['current_mileage'], 0, '', '.') : 0 }} {{ Config::get('constants.DEFAULT_DISTANCE_UNIT') }}
                            |
                            {{ \App\Enums\CarTransmission::getDescription($carPost['transmission']) }}
                        </div>
                        <div class="car-price-wrapper">
                            <span class="price">
                                {{ number_format($carPost['price'], 0, '', '.') }}
                                <span class="price-prefix">
                                    {{ $carPost['currency'] }}
                                </span>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="car-details">
            <div class="line-head-box md">
                <div class="row no-gutters justify-center">
                    <div class="py-0 col-sm-12 col-md-6 col-lg-4 col">
                        <div class="line-head">
                            <div class="line-head-line"></div> 
                            <div class="line-head-title">Car Details</div>
                            <div class="line-head-subtitle"></div>
                        </div>
                    </div>
                </div>
                <div class="id-wrapper d-flex align-center justify-center">
                    <span class="id-text">ID: {{ $carPost['identify'] }}</span>
                </div>
                <div class="car-details-body">
                    <div class="car-details-content">
                        <div class="detail-item">
                            <span class="key">Fuel Type</span>
                            <span class="value">{{ \App\Enums\CarFuelType::getDescription($carPost['fuel_type']) }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Current Color</span>
                            <span class="value">{{ \App\Enums\CarColor::getDescription($carPost['current_color']) }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Seat</span>
                            <span class="value">{{ \App\Enums\CarSeat::getDescription($carPost['seat']) }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Registration Date</span>
                            <span class="value">{{ $carPost['registrationDate'] ? Carbon\Carbon::createFromFormat('d/m/Y', $carPost['registrationDate'])->format('M Y') : '' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Registration Type</span>
                            <span class="value">{{ \App\Enums\CarRegistrationType::getDescription($carPost['registration_type']) }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Current Mileage</span>
                            <span class="value">{{ $carPost['current_mileage'] ? number_format($carPost['current_mileage'], 0, '', '.') : 0 }} {{ Config::get('constants.DEFAULT_DISTANCE_UNIT') }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Spare Key</span>
                            <span class="value">{{ \App\Enums\YesNo::getDescription($carPost['spare_key']) }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="key">Service Book</span>
                            <span class="value">{{ \App\Enums\YesNo::getDescription($carPost['service_book']) }}</span>
                        </div>
                        @if ($carPost['principal_warranty'] == \App\Enums\YesNo::No)
                            <div class="detail-item last-row">
                                <span class="key">Principal Warranty</span>
                                <span class="value">{{ \App\Enums\YesNo::getDescription(\App\Enums\YesNo::No) }}</span>
                            </div>
                        @else
                            <div class="detail-item last-row">
                                <span class="key">Principal Warranty Exp Date</span>
                                <span class="value">{{ Carbon\Carbon::createFromFormat('d/m/Y', $carPost['principal_warranty_exp_date'])->format('M Y') }}</span>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection