@extends('user-guardian.layouts.master')
@section('css')
<style>
    .pay-fee-card { max-width: 560px; margin: 40px auto; padding: 40px 36px; text-align: center; background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,.08); border: 1px solid #e2e8f0; }
    .pay-fee-icon { font-size: 64px; color: #f59e0b; margin-bottom: 20px; }
    .pay-fee-card h2 { font-size: 2rem; color: #1e293b; margin-bottom: 20px; font-weight: 700; }
    .pay-fee-card .pay-fee-message { color: #475569; font-size: 1.25rem; line-height: 1.7; margin-bottom: 28px; }
    .pay-fee-account { text-align: left; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px; margin-top: 24px; font-size: 1.15rem; line-height: 1.8; color: #334155; white-space: pre-line; }
</style>
@endsection
@section('content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="pay-fee-card">
                <div class="pay-fee-icon"><i class="fa fa-lock"></i></div>
                <h2>School Fees Payment Required</h2>
                <p class="pay-fee-message">To view this exam result, please ensure all school fees for the student have been paid. Kindly make payment using the account details below before you can access the result.</p>
                @if(!empty($generalSetting->bank_account_details))
                    <div class="pay-fee-account">{{ $generalSetting->bank_account_details }}</div>
                @else
                    <div class="pay-fee-account">Please contact the school office for payment details.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
