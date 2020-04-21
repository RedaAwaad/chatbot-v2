<?php $user = \App\Models\User::withTrashed()->find($id) ?>

<div class="x_content" style="text-align: center">
    <button data-toggle="dropdown" class="btn btn-brand dropdown-toggle btn-xs" type="button" aria-expanded="true"><i class="fa fa-cogs"></i> Settings <span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
        <li>
            @if(!$user->trashed())
                <a  href="#" class="" onclick="delete_confirmation({{ $user->id }})" title="{{$user->trashed()?'Force Delete':'Soft Delete'}}">
                    <i class="fa fa-{{!$user->trashed() ? 'trash' : 'close'}}" style="color:#ff0000"></i> Delete
                </a>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST" id="delete-form-{{ $user->id }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @else
                <a href="{{ route('users.restore',$user->id) }}" title="Restore" style="color:#0e90d2"><i class="fa fa-history"></i>  Restore </a>
            @endif
        </li>
        <li>
            @if(!$user->trashed())
                <a href="{{ route('users.edit',$user->id) }}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
            @endif
        </li>

    </ul>
</div>
