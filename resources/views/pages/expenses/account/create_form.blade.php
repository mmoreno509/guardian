@inject('accountTypesEnum', 'App\Models\Expenses\AccountTypesEnum')

{{ csrf_field() }}

<div class="form-group">
    <label for="typeField">Type</label>
    <select name="type" id="typeField" class="form-control">
        @foreach($accountTypesEnum::getAll() as $typeKey => $typeName)
            <option value="{{ $typeKey }}" @if($typeKey == old('type')) selected @endif>{{ $typeName }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nameField">Name</label>
    <input type="text" name="name" id="nameField" class="form-control" value="{{ old('name') }}" required>
</div>

<hr/>

<div class="text-right">
    <button type="submit" class="btn btn-primary">Save</button>
</div>