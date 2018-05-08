<div class='details'>* Required fields</div>

<label for='upgrade_type'>* Upgrade Type</label>
<input type='text' name='upgrade_type' id='upgrade_type' value='{{ old('upgrade_type', $project->upgrade_type) }}'>
@include('modules.error-field', ['field' => 'upgrade_type'])

<label for='frame_size'>* Frame Size </label>
<select name='frame_size' id='frame_size'>
    <option value='choose'> Choose one...</option>
    <option value='9FA'> Frame 9FA</option>
    <option value='7FA'> Frame 7FA</option>
    <option value='7EA'> Frame 7EA</option>
    <option value='71B'> Frame 71B</option>
    <option value='6FA'> Frame 6FA</option>
    <option value='61B'> Frame 61B</option>
    <option value='51P'> Frame 51P</option>
</select>
@include('modules.error-field', ['field' => 'frame_size'])

<label for='original_control'>* Original Control</label>
<input type='text'maxlength='8' name='original_control' id='original_control' value='{{ old('original_control', $project->original_control) }}'>
@include('modules.error-field', ['field' => 'original_control'])

<label for='fuel_type'>* Fuel Type </label>
<select name='fuel_type' id='fuel_type'>
    <option value='choose'> Choose one...</option>
    <option value='Natural Gas'> Natural Gas</option>
    <option value='Liquid'> Liquid</option>
    <option value='Dual'> Dual</option>
</select>
@include('modules.error-field', ['field' => 'original_control'])

<label for='operation'>* Operation</label>
<input type='text' maxlength='4' name='operation' id='operation' value='{{ old('operation', $project->operation) }}'>
@include('modules.error-field', ['field' => 'operation'])