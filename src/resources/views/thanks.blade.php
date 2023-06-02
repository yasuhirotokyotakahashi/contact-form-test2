@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
        <form class="form" action="/">
            <div class="thanks__heading">
                <h2>ご意見いただきありがとうございました。</h2>
            </div>
            <div class="return__button">
                <button class="return__button-submit" type="submit">トップページへ</button>
            </div>
        </form>
    </div>
@endsection
