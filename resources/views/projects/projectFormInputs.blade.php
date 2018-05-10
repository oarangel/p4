<div class='details' xmlns="http://www.w3.org/1999/xhtml">* Required fields</div>

<label for='upgrade_type'>* Upgrade Type   </label>
<input type='text' name='upgrade_type' id='upgrade_type' value='{{ old('upgrade_type', $project->upgrade_type) }}'>
@include('modules.error-field', ['field' => 'upgrade_type'])
<p class='ex1'> Enter the type of Turbine upgrade i.e Full Panel, Migration, Panel Insert.</p>
<div>
<label for='framesize_id'>* Framesize</label>
<select name='framesize_id' id='framesize_id'>
    <option value=''>Choose one...</option>
    @foreach($framesizesForDropdown as $id => $framesizeName)
     {{--   <option value='{{ $id }}' {{ (old('framesize_id', $project->$framesize_id) == $id) ? 'selected' : '' }}>{{ $framesizeName }}</option>--}}
        <option value='{{ $id }}'> {{ $framesizeName }}</option>
    @endforeach
</select>
@include('modules.error-field', ['field' => 'framesize_id'])
</div>

<div>
<label for='original_control'>* Original Control</label>
<input type='text' maxlength='8' name='original_control' id='original_control' value='{{ old('original_control', $project->original_control) }}'>
@include('modules.error-field', ['field' => 'original_control'])

    <p class='ex1'> Enter the current Turbine control model to be upgraded i.e MKIV, Mark V.</p>
</div>

<div>
<label for='fuel_type'>* Fuel Type </label>
<select name='fuel_type' id='fuel_type' {{ old('fuel_type', $project->fuel_type) }}>
    <option value='choose'> Choose one...</option>
    <option value='Natural Gas'> Natural Gas</option>
    <option value='Liquid'> Liquid</option>
    <option value='Dual'> Dual</option>
</select>
@include('modules.error-field', ['field' => 'original_control'])
</div>

<label for='operation'>* Operation</label>
<input type='text' maxlength='4' name='operation' id='operation' value='{{ old('operation', $project->operation) }}'>
@include('modules.error-field', ['field' => 'operation'])
    <p class='ex1'> *Enter the Turbine control operation i.e BASE, PEAK.</p>
@foreach($tagsForCheckboxes as $tagId => $tagName)
    <ul class='remove'>
        <li>
            <label>
                <input type='checkbox' name='tags[]' value='{{ $tagId }}'>
                {{ $tagName }}
            </label>
        </li>
    </ul>
@endforeach