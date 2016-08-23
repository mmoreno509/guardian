<tr>
    <td>{{ $category->name }}</td>
    <td>{{ $category->type_name }}</td>
    <td class="text-right">{{ $category->budget_formatted }}</td>
    <td class="text-right">
        <a href="/expenses/category/{{ $category->id }}/edit" class="btn btn-xs btn-warning">edit</a>
        <button type="button" class="btn btn-xs btn-danger category_delete" data-id="{{ $category->id }}">delete</button>
    </td>
</tr>