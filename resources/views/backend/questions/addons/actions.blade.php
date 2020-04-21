<?php $question = \App\Models\Question::withTrashed()->find($id) ?>

<div class="x_content" style="text-align: center">
    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button" aria-expanded="true"><i class="fa fa-cogs"></i> Settings <span class="caret"></span>
    </button>
    <ul role="menu" class="dropdown-menu">
        <li>
            @if(!$question->trashed())
                <a  href="#" class="" onclick="delete_confirmation({{ $question->id }})" title="{{$question->trashed()?'Force Delete':'Soft Delete'}}">
                    <i class="fa fa-{{!$question->trashed() ? 'trash' : 'close'}}" style="color:#ff0000"></i> Delete
                </a>
                <form action="{{ route('questions.destroy',$question->id) }}" method="POST" id="delete-form-{{ $question->id }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @else
                <a  href="#" class="" onclick="delete_confirmation({{ $question->id }})" title="{{$question->trashed()?'Force Delete':'Soft Delete'}}">
                    <i class="fa fa-{{!$question->trashed() ? 'trash' : 'close'}}" style="color:#ff0000"></i> Delete
                </a>
                <form action="{{ route('questions.destroy',$question->id) }}" method="POST" id="delete-form-{{ $question->id }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                
                <a href="{{ route('questions.restore',$question->id) }}" title="Restore" style="color:#0e90d2"><i class="fa fa-history"></i>  Restore </a>
            @endif
        </li>
        <li>
            @if(!$question->trashed())
                <a href="{{ route('questions.edit',$question->id) }}" title="Edit"><i class="fa fa-edit"></i> Edit</a>
            @endif
        </li>
        <li>
            <a href="{{ route('questions.show',$question->id) }}" title="Show"><i class="fa fa-eye"></i> Show </a>
        </li>
    </ul>
</div>
