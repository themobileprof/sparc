<div class="table-responsive">
    <table class="table" id="purchasingFunctions-table">
        <thead>
            <tr>
                <th>Country Id</th>
        <th>Column</th>
        <th>Financial Mgmt</th>
        <th>Benefits Spec</th>
        <th>Contracting</th>
        <th>Provider Payment</th>
        <th>Monitoring</th>
        <th>Notes</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchasingFunctions as $purchasingFunction)
            <tr>
                       <td>{{ $purchasingFunction->country_id }}</td>
            <td>{{ $purchasingFunction->column }}</td>
            <td>{{ $purchasingFunction->financial_mgmt }}</td>
            <td>{{ $purchasingFunction->benefits_spec }}</td>
            <td>{{ $purchasingFunction->contracting }}</td>
            <td>{{ $purchasingFunction->provider_payment }}</td>
            <td>{{ $purchasingFunction->monitoring }}</td>
            <td>{{ $purchasingFunction->notes }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['purchasingFunctions.destroy', $purchasingFunction->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('purchasingFunctions.show', [$purchasingFunction->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('purchasingFunctions.edit', [$purchasingFunction->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
