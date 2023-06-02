@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>お問い合わせ</h2>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required" style="color: red">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="string" name="fullname" placeholder="例）山田太郎" value="{{ old('fullname') }}" />
                    </div>
                    <div class="form__error">
                        @error('fullname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required" style="color: red">※</span>
                </div>
                <div class="form__group-content">
                    <div class="">
                        <label><input type="radio" name="gender" value="1" checked>男性</label>
                        <label class="form__group-content-radio"><input type="radio" name="gender"
                                value="2">女性</label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required" style="color: red">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="string" name="email" placeholder="例） test@example.com"
                            value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">郵便番号</span>
                    <span class="form__label--required" style="color: red">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        〒<input type="string" name="postcode" placeholder="例）123-4567" value="{{ old('postcode') }}" />
                    </div>
                    <div class="form__error">
                        @error('postcode')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required" style="color: red">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="string" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                    </div>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="string" name="building_name" placeholder="例）千駄ヶ谷マンション101"
                            value="{{ old('building_name') }}" />
                    </div>
                    <div class="form__error">

                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">ご意見</span>
                    <span class="form__label--required" style="color: red">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="opinion">{{ old('opinion') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('opinion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認</button>
            </div>
        </form>





    </div>
@endsection
