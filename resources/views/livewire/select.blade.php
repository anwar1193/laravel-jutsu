<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="country">Province</label>
            <select name="country" wire:model="country" class="form-control">
                <option>Choose a province</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->province_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- @if (count($cities) > 0) --}}
            <div class="form-group">
                <label for="city">City</label>
                <select name="city" wire:model="city" class="form-control">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->city_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        {{-- @endif --}}

    </div>
</div>