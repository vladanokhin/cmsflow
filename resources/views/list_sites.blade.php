@extends('layouts._page_card')

@section('card_content')
    <div class="table-responsive p-0">
        <table class="table align-items-center justify-content-center mb-0">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">URL</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last modified</th>
{{--                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Site Type</th>--}}
{{--                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>--}}
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($sites as $site)
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">{{ $site->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="text-xs font-weight-bold mb-0" target="_blank" href="http://{{ $site->name }}/">
                                https://{{ $site->name }}/
                            </a>
                        </td>
                        <td>
                            <span class="text-sm font-weight-bold">{{ $site->last_modified }}</span>
                        </td>
{{--                        <td>--}}
{{--                            <p class="text-sm font-weight-bold">--}}
{{--                                <span class="badge bg-gradient-warning">--}}
{{--                                    {{ $site->type->name }}--}}
{{--                                </span>--}}
{{--                            </p>--}}
{{--                        </td>--}}
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


