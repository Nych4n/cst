
<td class="text-center">
    @if ($model->addons->count()||$model->termin->count())
    <a type="button" href="{{route('invoice.add',$model->product_id)}}" class="btn p-2 btn-sm btn-success btn-active-light-success">
        <i class="mx-0 mr-0 bi bi-plus-square fs-2 m-0"></i>Add
    </a>
    @endif
    @if ($model->invoice->count()<12)
    <a type="button" href="{{route('invoice.maintenance',$model->product_id)}}" class="btn p-2 btn-sm btn-primary btn-active-light-primary">
        <i class="mx-0 mr-0 bi bi-plus-square fs-2 m-0"></i>Maintenance
    </a>
    @endif
</td>
