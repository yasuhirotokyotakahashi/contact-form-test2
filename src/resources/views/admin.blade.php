@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="search-form__content">
        <div class="search-form__heading">
            <h2>管理システム</h2>
        </div>
        <div class="search-form-table">
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <table class="search-form__inner">
                    <tr class="search-form__row">
                        <td class="search-form__item">
                            <div class="search-form__group">
                                <div class="search-form__group-title">
                                    <span class="search-form__label--item">お名前</span>
                                </div>
                                <div class="search-form__group-content">
                                    <div class="search-form__input--text">
                                        <input type="string" name="fullname" placeholder="テスト太郎"
                                            value="{{ old('fullname') }}" />
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="search-form__item">
                            <div class="search-form__group">
                                <div class="search-form__group-title">
                                    <span class="search-form__label--item">性別</span>
                                </div>
                                <div class="search-form__group-content">
                                    <div class="">
                                        <label><input type="radio" name="gender" value="" checked>全て</label>
                                        <label><input type="radio" name="gender" value="1">男性</label>
                                        <label><input type="radio" name="gender" value="2">女性</label>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="search-form__row">
                        <td class="search-form__item">
                            <div class="search-form__group">
                                <div class="search-form__group-title">
                                    <span class="search-form__label--item">登録日</span>
                                </div>
                                <div class="search-form__group-content-date">
                                    <div class="search-form__input--text">
                                        <input type="date" name="created_at" placeholder="created_at"
                                            value="startDate" />
                                    </div>
                                    <div class="search-form__input--text">
                                        <input type="date" name="created_at" placeholder="created_at" value="endDate" />
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="search-form__row">
                        <td class="search-form__item">
                            <div class="search-form__group">
                                <div class="search-form__group-title">
                                    <span class="search-form__label--item">メールアドレス</span>
                                </div>
                                <div class="search-form__group-content">
                                    <div class="search-form__input--text">
                                        <input type="string" name="email" placeholder="test@example.com"
                                            value="{{ old('email') }}" />
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="search-form__button">
                    <button class="form__button-submit" type="submit">検索</button>
                </div>
                <div class="form__button">
                    <input class="form__button-reset" type="reset"></>
                </div>
        </div>
        </form>
    </div>
    <div class="">

        {{ $contacts->links() }}

    </div>

    <table class="opinion-index">
        <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>ご意見</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <th>{{ $contact['id'] }}</th>
                <th>{{ $contact['fullname'] }}</th>
                <th>{{ $contact['gender'] }}</th>
                <th>{{ $contact['email'] }}</th>
                <th>{!! nl2br(e(Str::limit($contact['opinion'], 25))) !!}</th>
                <th>
                    <form class="delete-form" action="admin/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </th>

            </tr>
        @endforeach
    </table>




    </div>
@endsection
