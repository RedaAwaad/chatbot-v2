<?php $answer = \App\Models\answer::withTrashed()->find($id) ?>

<div class="x_content" style="text-align: center">
    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button" aria-expanded="true"><i class="fa fa-cogs"></i> Settings <span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
        <li>
            @if(!$answer->trashed())
                <a  href="#" class="" onclick="delete_confirmation({{ $answer->id }})" title="{{$answer->trashed()?'Force Delete':'Soft Delete'}}">
                    <i class="fa fa-{{!$answer->trashed() ? 'trash' : 'close'}}" style="color:#ff0000"></i> Delete
                </a>
                <form action="{{ route('answers.destroy',$answer->id) }}" method="POST" id="delete-form-{{ $answer->id }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @else
                 <a  href="#" class="" onclick="delete_confirmation({{ $answer->id }})" title="{{$answer->trashed()?'Force Delete':'Soft Delete'}}">
                    <i class="fa fa-{{!$answer->trashed() ? 'trash' : 'close'}}" style="color:#ff0000"></i> Delete
                </a>
                <form action="{{ route('answers.destroy',$answer->id) }}" method="POST" id="delete-form-{{ $answer->id }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="{{ route('answers.restore',$answer->id) }}" title="Restore" style="color:#0e90d2"><i class="fa fa-history"></i>  Restore </a>
            @endif
        </li>
        <li>
            @if(!$answer->trashed())
                <a href="{{ route('answers.edit',$answer->id) }}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
            @endif
        </li>
    </ul>
</div>
