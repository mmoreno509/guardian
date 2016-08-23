{{ csrf_field() }}

<input type="hidden" name="at" value="{{ \Carbon\Carbon::now() }}">

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="categoryField">Category</label>
            <select name="category_id" id="categoryField" class="form-control">
                @foreach($categoryList as $id => $name)
                    <option value="{{ $id }}" @if($id == old('type', $category->type)) selected @endif>{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="accountField">Account</label>
            <select name="account_id" id="accountField" class="form-control">
                @foreach($accountList as $id => $name)
                    <option value="{{ $id }}" @if($id == old('type', $category->type)) selected @endif>{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="descriptionField">Description</label>
    <input type="text" name="description" id="descriptionField" class="form-control" value="{{ old('description', $category->description) }}" required>
</div>

<div class="form-group">
    <label for="amountField">Amount</label>
    <input type="text" name="amount" id="amountField" class="form-control" value="{{ old('amount', $category->amount) }}" required>
</div>

<hr/>

<div class="text-right">
    <button type="submit" class="btn btn-primary">Save</button>
</div>