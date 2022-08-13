<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>Sr No</th>
            <th>Type</th>
            <th>Value</th>
            <th>Value1</th>
            <th>Status</th>
        </thead>

        @forelse ($items as $item)
            @include('admin.footer.utils.footer_item_add', ['item' => $item])
        @empty
            @include('admin.footer.utils.footer_item_add')
        @endforelse
        <tbody id="footer_add_more">
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <button id="footer_add" class="btn btn-primary btn-sm">Add</button>
                    <button id="footer_remove" class="btn btn-warning btn-sm">Remove</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@section('footer_item')
<script>
    $("#footer_add").click(function(e){
        e.preventDefault()
        const add_html = `@include('admin.footer.utils.footer_item_add')`
        $("#footer_add_more").append(add_html)
    })

    $("#footer_remove").click(function(e){
        e.preventDefault()
        $("#footer_add_more").children().last().remove();
    })
</script>
@endsection
