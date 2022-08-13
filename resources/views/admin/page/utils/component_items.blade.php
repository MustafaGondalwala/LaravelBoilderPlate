<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>Sr No</th>
            <th>Component</th>
            <th>Status</th>
        </thead>


        @forelse ($items as $item)
            @include('admin.page.utils.component_item_add', ['item' => $item])
        @empty
            @include('admin.page.utils.component_item_add')
        @endforelse
        <tbody id="page_component_add_more">
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <button id="page_component_add" class="btn btn-primary btn-sm">Add</button>
                    <button id="page_component_remove" class="btn btn-warning btn-sm">Remove</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@section('footer')
<script>
    $("#page_component_add").click(function(e){
        e.preventDefault()
        const add_html = `@include('admin.page.utils.component_item_add')`
        $("#page_component_add_more").append(add_html)
    })

    $("#page_component_remove").click(function(e){
        e.preventDefault()
        $("#page_component_add_more").children().last().remove();
    })
</script>
@endsection

