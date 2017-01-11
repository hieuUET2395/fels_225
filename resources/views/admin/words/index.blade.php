@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <div class="panel-title pull-left">
                            {{ trans_choice('messages.words', $words->total()) }} : {{ $words->total() }}
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary"
                                href="{{ action('Admin\WordsController@create') }}">@lang('messages.add')</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if ($words->count() != 0)
                            <table class="table table-hover table-bordered text-center">
                                @foreach ($words as $word)
                                    <tr>
                                        <td>
                                            {{ $word->id }}
                                        </td>
                                        <td>
                                            <a href="{{ action('Admin\WordsController@show', [
                                                'user' => $word->id]) }}">{{ $word->word }}</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ action('Admin\WordsController@edit', ['user' => $word->id]) }}">
                                                @lang('messages.edit')
                                            </a>
                                        </td>
                                        <td>
                                            @include('layouts.admin.includes._delete', [
                                                'action' => ['Admin\WordsController@destroy', 'user' => $word->id],
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            {{ trans('messages.empty', ['item' => trans_choice('messages.words', 1)]) }}
                        @endif
                    </div>
                    <div class="panel-footer">
                        {{ $words->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! Html::script(elixir('js/form-delete.js')) !!}
@endsection