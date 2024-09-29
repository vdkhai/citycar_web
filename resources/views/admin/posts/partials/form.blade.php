<div class="row">
    <div class="col-md-6">
        {{--  <h5 class="mb-2 mt-4">Product Infomation</h5>  --}}
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="identify">ID</label>
                <input type="text" id="identify" class="form-control" name="identify" value="{{ old('identify', optional($carPost ?? null)['identify']) }}">
                @error('identify')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        
            <div class="form-group col-md-9">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ old('title', optional($carPost ?? null)['title']) }}">
                @error('title')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="price">Price</label>
                <div class="input-group mb-3">
                    <input type="text" id="price" class="form-control" aria-label="" name="price" value="{{ old('price', optional($carPost ?? null)['price']) }}">
                    <div class="input-group-append">
                        <span class="input-group-text">{{ Config::get('constants.DEFAULT_CURRENCY') }}</span>
                    </div>
                    @error('price')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="carBrands">Brand</label>
                <select id="carBrands" class="form-control" name="car_brand_id">
                    <option value="">...</option>
                    @foreach ($carBrands as $carBrand)
                        <option @if ($carBrand['id'] == old('car_brand_id', optional($carPost['carModel']['carBrand'] ?? null)['id'])) selected @endif value="{{ $carBrand['id'] }}">
                            {{ $carBrand['name'] }}
                        </option>
                    @endforeach
                </select>
                @error('car_brand_id')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="carModels">Model</label>
                <select id="carModels" class="form-control" name="car_model_id" data-car_model_id="{{ old('car_model_id', optional($carPost['carModel'] ?? null)['id']) }}">
                    <option value="">...</option>
                </select>
                @error('car_model_id')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <input type="hidden" name="car_brands" value="{{ json_encode($carBrands) }}" />
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="transmission">Transmission</label>
                <select id="transmission" class="form-control" name="transmission">
                    <option value="">...</option>
                    @foreach (\App\Enums\CarTransmission::getInstances() as $transmission)
                        <option @if ($transmission->value == old('transmission', optional($carPost ?? null)['transmission'])) selected @endif value="{{ $transmission->value }}">{{ $transmission->description }}</option>
                    @endforeach
                </select>
                @error('transmission')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="bodyType">Body Type</label>
                <select id="bodyType" class="form-control" name="body_type">
                    <option value="">...</option>
                    @foreach (\App\Enums\CarBodyType::getInstances() as $bodyType)
                        <option @if ($bodyType->value == old('body_type', optional($carPost ?? null)['body_type'])) selected @endif value="{{ $bodyType->value }}">{{ $bodyType->description }}</option>
                    @endforeach
                </select>
                @error('body_type')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="fuelType">Fuel Type</label>
                <select id="fuelType" class="form-control" name="fuel_type">
                    <option value="">...</option>
                    @foreach (\App\Enums\CarFuelType::getInstances() as $fuelType)
                        <option @if ($fuelType->value == old('fuel_type', optional($carPost ?? null)['fuel_type'])) selected @endif value="{{ $fuelType->value }}">{{ $fuelType->description }}</option>
                    @endforeach
                </select>
                @error('fuel_type')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="currentColor">Current Color</label>
                <select id="currentColor" class="form-control" name="current_color">
                    <option value="">...</option>
                    @foreach (\App\Enums\CarColor::getInstances() as $currentColor)
                        <option @if ($currentColor->value == old('current_color', optional($carPost ?? null)['current_color'])) selected @endif value="{{ $currentColor->value }}">{{ $currentColor->description }}</option>
                    @endforeach
                </select>
                @error('current_color')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="seat">Seat</label>
                <select id="seat" class="form-control" name="seat">
                    <option value="">...</option>
                    @foreach (\App\Enums\CarSeat::getInstances() as $seat)
                        <option @if ($seat->value == old('seat', optional($carPost ?? null)['seat'])) selected @endif value="{{ $seat->value }}">{{ $seat->description }}</option>
                    @endforeach
                </select>
                @error('seat')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="state">State</label>
                <select id="state" class="form-control" name="state">
                    <option value="">...</option>
                    @foreach (\App\Enums\State::getInstances() as $state)
                        <option @if ($state->value == old('state', optional($carPost ?? null)['state'])) selected @endif value="{{ $state->value }}">{{ $state->description }}</option>
                    @endforeach
                </select>
                @error('state')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        {{--  <div class="form-row">
            <div class="form-group col-md-6">
                <label for="thumbnail">Thumbnail</label>
                <input type="text" id="thumbnail" class="form-control" name="thumbnail" value="./assets/avatars/face-1.jpg">
                @error('thumbnail')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>  --}}
    </div>
    <div class="col-md-6">
        {{--  <h5 class="mb-2 mt-4">Post Infomation</h5>  --}}
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="registrationDate">Registration Date</label>
                <div class="input-group">
                    <input autocomplete="off" type="text" class="form-control drgpicker" id="registrationDate" name="registration_date" value="{{ old('registration_date', optional($carPost ?? null)['registration_date']) }}" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                    </div>
                    @error('registration_date')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="registrationType">Registration Type</label>
                <select id="registrationType" class="form-control" name="registration_type">
                    <option value="">...</option>
                    @foreach (\App\Enums\CarRegistrationType::getInstances() as $registrationType)
                        <option @if ($registrationType->value == old('registration_type', optional($carPost ?? null)['registration_type'])) selected @endif value="{{ $registrationType->value }}">{{ $registrationType->description }}</option>
                    @endforeach
                </select>
                @error('registration_type')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="currentMileage">Current Mileage</label>
                <div class="input-group mb-3">
                    <input type="text" id="currentMileage" class="form-control" aria-label="" name="current_mileage" value="{{ old('current_mileage', optional($carPost ?? null)['current_mileage']) }}">
                    <div class="input-group-append">
                        <span class="input-group-text">{{ Config::get('constants.DEFAULT_DISTANCE_UNIT') }}</span>
                    </div>
                    @error('current_mileage')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="spareKey" name="spare_key" value="{{ old('spare_key', optional($carPost ?? null)['spare_key']) }}" @if (old('spare_key', optional($carPost ?? null)['spare_key'])) checked @endif>
                            <label class="custom-control-label" for="spareKey">Spare Key</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="serviceBook" name="service_book" value="{{ old('service_book', optional($carPost ?? null)['service_book']) }}" @if (old('service_book', optional($carPost ?? null)['service_book'])) checked @endif>
                            <label class="custom-control-label" for="serviceBook">Service Book</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="principalWarranty" name="principal_warranty" value="{{ old('principal_warranty', optional($carPost ?? null)['principal_warranty']) }}" @if (old('principal_warranty', optional($carPost ?? null)['principal_warranty'])) checked @endif>
                            <label class="custom-control-label" for="principalWarranty">Principal Warranty</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="principalWarrantyExpDate">Principal Warranty Exp Date</label>
                        <div class="input-group">
                            <input autocomplete="off" type="text" class="form-control drgpicker" id="principalWarrantyExpDate" name="principal_warranty_exp_date" value="{{ old('principal_warranty_exp_date', optional($carPost ?? null)['principal_warranty_exp_date']) }}" aria-describedby="button-addon2" @if (!old('principal_warranty', optional($carPost ?? null)['principal_warranty']))) disabled @endif>
                            <div class="input-group-append">
                                <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                            </div>
                            @error('principal_warranty_exp_date')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  <hr class="my-4">  --}}

<link rel="stylesheet" href="{{ mix('image-uploader/css/image-uploader.min.css') }}">
<div class="row">
    <div class="col-md-12">
        <div class="input-field">
            <label class="active">Photos</label>
            <div class="input-images" style="padding-top: .5rem;"></div>
        </div>
        @error('photos')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
    @if (isset($carPost))
        @foreach ($carPost['images'] as $image)
            <input type="hidden" name="preloaded_photos[]" data-id={{ $image['id'] }} data-url={{ $image->url() }} />
        @endforeach
    @endif
</div>
<hr class="my-4">

<script type="text/javascript" src="{{ mix('image-uploader/js/image-uploader.min.js') }}"></script>
<script type="text/javascript">
    let carBrands = JSON.parse($('input[name="car_brands"]').val());
    let associativeCarBrands = {};
    for (const carBrand of carBrands) {
        // console.log(carBrand);
        associativeCarBrands[carBrand['id']] = [];
        for (const carModel of carBrand['car_models']) {
            // console.log(carModel);
            associativeCarBrands[carBrand['id']].push({
                'id': carModel['id'],
                'title': carModel['title']
            });
        };
    }

    $(document).ready(function() {
        $('#carBrands').on('change', function(event, car_model_id){
            $('#carModels').empty();
            $('#carModels').append('<option value="">...</option>');
            var value = $(this).val();

            if (value != "") {
                var carModels = associativeCarBrands[value];
                for (const carModel of carModels) {
                    if (typeof car_model_id !== 'undefined' && car_model_id == carModel['id']) {
                        $('#carModels').append('<option selected value="' + carModel['id'] + '">' + carModel['title'] + '</option>');
                    } else {
                        $('#carModels').append('<option value="' + carModel['id'] + '">' + carModel['title'] + '</option>');
                    }
                    
                }
            }
        });

        $("#carBrands > option").each(function() {
            if (this.selected) {
                var car_model_id = $('#carModels').data('car_model_id');
                $(this).parent().trigger('change', car_model_id);
            }
        });

        $('input[type="checkbox"]').on('click', function() {
            $(this).val(this.checked);        
        });
        
        $('#principalWarranty').on('click', function() {
            if (this.checked) {
                $('#principalWarrantyExpDate').prop("disabled", false);
            } else {
                $('#principalWarrantyExpDate').prop("disabled", true);
                $('#principalWarrantyExpDate').val('');
            }       
        });
    });

    // Image uploader
    let preloaded = [];
    $('input[name^="preloaded_photos"]').each(function(i){
        preloaded.push({
            id: $(this).data('id'),
            src: $(this).data('url')
        });
    });
                
    $('.input-images').imageUploader({
        preloaded: preloaded,
        imagesInputName: 'new_photos',
        preloadedInputName: 'old_photo_ids',
        maxSize: 2 * 1024 * 1024,
        maxFiles: 30
    });
</script>