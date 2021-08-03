<div class="table-responsive">
    <table class="table" id="countries-table">
        <thead>
            <tr>
        <th>Name</th>
        <th>Language</th>
        <th>Flag</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
            <td>{{ $country->name }}</td>
            <td>{{ $country->language }}</td>
            <td><img src='{{ asset("img/flags/$country->flag") }}' style='width: 50px;'></td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('countries.show', [$country->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('countries.edit', [$country->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
