<div class="table-responsive">
    <table class="table" id="components-table">
        <thead>
            <tr>
                <th>Component</th>
        <th>Headerenglish</th>
        <th>Headerfrench</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($components as $component)
            <tr>
                       <td>{{ $component->component }}</td>
            <td>{{ $component->headerEnglish }}</td>
            <td>{{ $component->headerFrench }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['components.destroy', $component->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('components.show', [$component->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('components.edit', [$component->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
