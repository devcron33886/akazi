@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.subscriber.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.subscribers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.subscriber.fields.id') }}
                            </th>
                            <td>
                                {{ $subscriber->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscriber.fields.name') }}
                            </th>
                            <td>
                                {{ $subscriber->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscriber.fields.email') }}
                            </th>
                            <td>
                                {{ $subscriber->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscriber.fields.status') }}
                            </th>
                            <td>
                                {{ App\Models\Subscriber::STATUS_SELECT[$subscriber->status] ?? '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.subscribers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
