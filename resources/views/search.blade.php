@extends('layouts.app')

@section('content')
<style>
    .result-card-header {
        padding-top: 10px;
    }
    .result-card-header-wrap {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        /* max-width: 1200px; */
        margin: 0 auto;
    }
    .result-card-header-total {
        font-size: 12px;
        line-height: 14px;
        color: #2e2e2e;
    }

    .card-content {
        position: relative;
        padding: 12px 16px;
        background: #fff;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .card-title {
        display: block;
        padding: 4px 0;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
        color: #2e2e2e;
    }
    .card-title-variant-engine, .card-title-year-brand-model {
        padding-right: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .card-car-other {
        font-size: 12px;
        line-height: 14px;
        color: #2e2e2e;
    }
    .card-other span:not(:last-child):after {
        padding-left: 4px;
        content: "|";
    }
    .card-price {
        color: #e9280d;
    }
    .card-price-total {
        display: inline-block;
        margin-right: 8px;
        font-size: 12px;
        font-weight: 500;
        line-height: 16px;
    }
    .card-price-total strong {
        font-size: 22px;
        font-weight: 700;
        line-height: 28px;
    }

    .card-head {
        position: relative;
        padding-top: 60%;
        height: 100%;
    }
    .card-image-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .card-image {
        width: 100%;
        height: 100%;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #cccccc;
        /* background-color: #f6f7f8; */
        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
    }
</style>

{{--  <div class="container-xl">  --}}
<div class="search-wrap">
    <div class="container-xl">
        @include('_search')
    </div>
</div>

<div class="result-wrap" style="background: #f6f7f8; margin-top:10px;">
    <div class="container-xl">
        <div class="result-card-header">
            <div class="result-card-header-wrap">
                <div class="result-card-header-total">
                    {{ $total }} results
                </div>
            </div>
        </div>
        <div class="row g-0">
            @foreach ($carPosts as $carPost)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="px-2 py-2">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-image-wrap">
                                    <a href="{{ route('detail', ['id' => $carPost['id']]) }}" target="_blank">
                                        <div class="card-image" style="background-image: url({{ optional($carPost['images'][0] ?? null)->url() }});">
                                        </div>
                                        {{--  <img width="100%" height="auto" src="{{ optional($carPost['images'][0] ?? null)->url() }}" class="card-img-top" alt="" />  --}}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-content">
                                    <a class="card-title" href={{ route('detail', ['id' => $carPost['id']]) }} target="_blank">
                                        <div class="card-title-year-brand-month">
                                            {{ $carPost['registrationDate'] ? Carbon\Carbon::createFromFormat('d/m/Y', $carPost['registrationDate'])->year : '' }}
                                            {{ $carPost['brand'] }}
                                        </div>
                                        <div class="card-title-variant-engine">
                                            {{ $carPost['model'] }}
                                            {{ $carPost['title'] }}
                                        </div>
                                    </a>
                                    <div class="card-other">
                                        <span>{{ $carPost['current_mileage'] ? number_format($carPost['current_mileage'], 0, '', '.') : 0 }} {{ Config::get('constants.DEFAULT_DISTANCE_UNIT') }}</span>
                                        <span>{{ \App\Enums\CarTransmission::getDescription($carPost['transmission']) }}</span>
                                        <span>{{ \App\Enums\State::getDescription($carPost['state']) }}</span>
                                    </div>
                                    <div class="card-price">
                                        <div class="card-price-total">
                                            <strong>{{ number_format($carPost['price'], 0, '', '.') }}</strong>
                                            {{ $carPost['currency'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    
            @include('layouts.pagination')
        </div>
    </div>
</div>
{{--  </div>  --}}
@endsection