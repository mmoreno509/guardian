@inject('transactionTypesEnum', 'App\Models\Expenses\TransactionTypesEnum')

{{ csrf_field() }}

@if(!empty($category))
    <input type="hidden" name="_method" value="PUT">
@endif

<div class="form-group">
    <label for="typeField">Type</label>
    @if(empty($category))
        <select name="type" id="typeField" class="form-control">
            @foreach($transactionTypesEnum::getAll() as $typeKey => $typeName)
                <option value="{{ $typeKey }}" @if($typeKey == old('type', empty($category) ? null : $category->type  )) selected @endif>{{ $typeName }}</option>
            @endforeach
        </select>
    @else
        <input type="hidden" name="type" value="{{ $category->type }}"/>
        <input type="text" class="form-control" value="{{ $category->type_name }}" id="typeField" readonly/>
    @endif
</div>

<div class="form-group">
    <label for="nameField">Name</label>
    <input type="text" name="name" id="nameField" class="form-control" value="{{ old('name', empty($category) ? null : $category->name) }}" required>
</div>

<div class="form-group">
    <label for="budgetField">Budget</label>
    <input type="text" name="budget" id="budgetField" class="form-control" value="{{ old('budget', empty($category) ? null : $category->budget) }}">
</div>

<hr/>

<div class="text-right">
    <button type="submit" class="btn btn-primary">Save</button>
</div>