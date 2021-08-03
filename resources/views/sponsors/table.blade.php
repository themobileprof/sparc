<div class="table-responsive">
    <table class="table" id="sponsors-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Logo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sponsors as $sponsor)
            <tr>
                       <td>{{ $sponsor->name }}</td>
            <td>{{ $sponsor->logo }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['sponsors.destroy', $sponsor->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('sponsors.show', [$sponsor->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('sponsors.edit', [$sponsor->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
