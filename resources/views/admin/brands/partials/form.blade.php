<div class="row">
    <div class="col-md-6">
        {{--  <h5 class="mb-2 mt-4">Product Infomation</h5>  --}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="identify">Name</label>
                <input type="text" id="identify" class="form-control" name="name" value="{{ old('name', optional($carBrand ?? null)['name']) }}">
                @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="logo">Logo</label>
                <input accept="image/*" type="file" id="logo" class="form-control-file" name="logo" />
                @error('logo')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <img id="preview" src="{{  optional($carBrand['image'] ?? null)->url() }}" alt="" style="background-color: white;" />
            </div>
        </div>
    </div>
</div>
<hr class="my-4">

<script type="text/javascript">
    $(document).ready(function() {
        $('main #logo').on('change', function(event) {
            $('#preview').attr('src', URL.createObjectURL(event.target.files[0]));
        });
    });
</script>