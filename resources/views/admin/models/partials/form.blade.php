<div class="row">
    <div class="col-md-6">
        {{--  <h5 class="mb-2 mt-4">Product Infomation</h5>  --}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ old('title', optional($carModel ?? null)['title']) }}">
                @error('title')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="carBrands">Brand</label>
                <select id="carBrands" class="form-control" name="car_brand_id">
                    <option value="">...</option>
                    @foreach ($carBrands as $carBrand)
                        <option @if ($carBrand['id'] == old('car_brand_id', optional($carModel['carBrand'] ?? null)['id'])) selected @endif value="{{ $carBrand['id'] }}">
                            {{ $carBrand['name'] }}
                        </option>
                    @endforeach
                </select>
                @error('car_brand_id')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<hr class="my-4">
