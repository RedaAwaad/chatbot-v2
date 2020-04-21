<?php $user = \App\Models\User::withTrashed()->find($id) ?>
{{
$user->first_name .' '. $user->first_name
}}
