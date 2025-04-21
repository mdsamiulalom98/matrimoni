@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
<div class="proposal-page-wrapper">
    <div class="proposal-card">
        <h2>Proposal from Mahidul Islam</h2>
        <p>Are you interested in connecting with this member?</p>
        <form action="{{ route('member.proposal.respond') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="btn-group">
                <input class="btn btn-accept" name="status" type="submit" value="Accept" />
                <input class="btn btn-deny" name="status" type="submit" value="Deny" />
            </div>
        </form>
    </div>

</div>
@endsection
